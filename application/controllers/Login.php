<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * 
 */
class Login extends CI_Controller
{


    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->model('NewModel');
        $this->config->load('pagination', TRUE);
    }

    function registerUser()
    {
        $data["title"] = "Registrace";
        $data["main"] = "register";

        //$this->NewModel->selectData();

        $this->layout->generate($data);
    }

    function loginUser()
    {
        $data["title"] = "Přihlášení";
        $data["main"] = "login";
        $this->layout->generate($data);
    }

    function doLogin()
    {


        $identity = $this->input->post('identity');
        $password = $this->input->post('password');

        if ($this->ion_auth->login($identity, $password)) {
            // Login successful
            redirect('admin'); // Replace with your desired redirect URL
        } else {
            // Login failed
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            redirect('Login/loginUser'); // Redirect back to the login page
        }
    }

    function logout()
    {
        $this->ion_auth->logout();
        redirect('prihlaseni');
    }

    // public function sort_cards($sortBy) {
    //     //$sort_by = $this->input->post('sort_by');
    //     //$data['polozky'] = $this->NewModel->get_sorted_polozka($sort_by);
    //     $data['mainCategory'] = $this->NewModel->getMainCategory();
    //     //$this->load->view('mainPage', $data);

    //     // $sort_by = $this->input->post('sort_by');
    //     // $sort_order = $this->input->post('sort_order');


    //     $data ["main"] = "mainPage";
    //     $this->layout->generate($data);

    //     //
    // }

    public function mainPage()
    {

        $pagination = $this->input->get('pagination') ?? 1;
        $order = $this->input->get('order') ?? '';
        $kategorie = $this->input->get('kategorie') ?? '';

        $data['params'] = [
            'order' => $order,
            'kategorie' => $kategorie
        ];

        $data['polozky'] = $this->NewModel->getPolozka();
        $data['category'] = $this->NewModel->getCategory();
        $data['mainCategory'] = $this->NewModel->getMainCategory();
        if ($data['params']['kategorie'] != '') {

            $data['podkategorie'] = $this->NewModel->getSubcategory($data['polozky'][0]['Kategorie_idKategorie']);
            $result = $this->NewModel->getAllSubcategoriesNames($data['params']['kategorie']);
            $data['data'] = $result;
        }

        $config = $this->config->item('pagination');

        $config['total_rows'] = $this->NewModel->get_total_rows();
        $config['per_page'] = 8;
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $limit = $config['per_page'];

        $offset = ($pagination - 1) * $limit;
        $category_id = !empty($kategorie) ? $kategorie : NULL;
        $conditions = array();

        if (!empty($order)) {
            $data['sortBy'] = $order;
            // Použije podmínku řazení podle "order" parameteru
            switch ($order) {
                case 'name_asc':
                    $conditions['order_by'] = 'polozka.nazev ASC';
                    break;
                case 'name_desc':
                    $conditions['order_by'] = 'polozka.nazev DESC';
                    break;
                case 'price_asc':
                    $conditions['order_by'] = 'polozka.cena ASC';
                    break;
                case 'price_desc':
                    $conditions['order_by'] = 'polozka.cena DESC';
                    break;
            }
        }

        $data['polozky'] = $this->NewModel->get_products($limit, $offset, $category_id, $conditions);

        $data["title"] = "Hlavní stránka";
        $data["main"] = "mainPage";

        $params = $data['params'];
        $config['base_url'] = base_url("hlavni") . '?' . http_build_query($params); // Zahrne všechny zbývající query parametery v base URL
        $config['page_query_string'] = TRUE; // Použije query string pro pagination links
        $config['query_string_segment'] = 'pagination'; // Name of the pagination query parameter

        $this->pagination->initialize($config);

        $pagination_links = $this->pagination->create_links();

        $data['pagination_links'] = $this->pagination->create_links();
        $data['pagination_links'] = preg_replace('/\?pagination=\d+&?/', '?', $data['pagination_links']); // Oddělá parametr pagination z URL
        $data['pagination_links'] = preg_replace_callback('/href="([^"]*)"/', function ($match) use ($pagination) {
            $url = $match[1];
            $separator = (strpos($url, '?') !== false) ? '&' : '?';
            return 'href="' . $url . $separator . 'pagination=' . $pagination . '"';
        }, $data['pagination_links']);

        $data['pagination_links'] = $pagination_links;

        $this->layout->generate($data);
    }






    function mainPage2($pageNumber, $sortBy = '')
    {
        $pageNumber = $pageNumber - 1;
        //Bere data o polozce z modelu pro kartu
        $data['polozky'] = $this->NewModel->getPolozka();
        $data['category'] = $this->NewModel->getCategory();
        $data['mainCategory'] = $this->NewModel->getMainCategory();

        $config = $this->config->item('pagination');
        $config['base_url'] = base_url("") . 'hlavni';
        $config['total_rows'] =  $this->NewModel->get_total_rows();
        $config['per_page'] = 8;


        $this->pagination->initialize($config);

        if ($sortBy != '') {
            $data['polozky'] = $this->NewModel->get_sorted_polozka($sortBy);
            $data['sortBy'] = $sortBy;
        } else {

            $data['polozky'] = $this->NewModel->get_results($config['per_page'], $pageNumber * $config['per_page']);
        }


        $data['pagination_links'] = $this->pagination->create_links();


        //$data['Elektro'] = $this->NewModel->Elektro();


        $data["title"] = "Hlavni";
        $data["main"] = "mainPage";
        $this->layout->generate($data);
    }

    function Kategorie($nazevKategorie)
    {
        $data['category'] = $this->NewModel->getCategory();
        $data['polozky'] = $this->NewModel->Kategorie($nazevKategorie);
        var_dump($data['polozky']);
        echo ('abcde');
        $data['podkategorie'] = $this->NewModel->getSubcategory($data['polozky'][0]['Kategorie_idKategorie']);
        if ($data['polozky'] == NULL) {;
            redirect('hlavni');
            return;
        }


        $data['productSearch'] = $this->NewModel->getSearch();
        $data["main"] = "mainPage";
        $data["kategorie"] = $nazevKategorie;


        $this->layout->generate($data);
    }

    function Search()
    {
        $data['polozky'] = $this->NewModel->getPolozka();
        $data['category'] = $this->NewModel->getCategory();
        $data['productSearch'] = $this->NewModel->getSearch();




        $data['main'] = 'mainPage';

        $this->layout->generate($data);
    }

    function getPodkategorie($idKategorie)
    {

        $polozkyKategorii = $this->NewModel->getPolozkyOfPodkategorie($idKategorie);
        $data['polozky'] = $polozkyKategorii;



        $result = $this->NewModel->getAllSubcategoriesID($idKategorie);
        $data['data'] = $result;
        $data["kategorie"] = $idKategorie;




        $data['main'] = 'mainPage';
        $data['mainCategory'] = $this->NewModel->getMainCategory();


        $data['category'] = $this->NewModel->getCategory();

        //$data ['kategorieById'] = $this->NewModel->getKategorieById($nazevKat);


        $data['productSearch'] = $this->NewModel->getSearch();



        //var_dump($result);
        // $result2 = $this->NewModel->getPolozky($result);
        //  var_dump($result2);


        $this->layout->generate($data);
    }

    function Detail($nazev)
    {
        $decodedNazev = urldecode($nazev);
        $polozkaByName = $this->NewModel->getPolozkaByName($decodedNazev);

        if ($polozkaByName === null) {

            $data["title"] = "Položka nebyla nalezena";
            $data['main'] = 'productNotFound';
            $this->layout->generate($data);
            return;
        }

        $data['polozkaByName'] = $polozkaByName;

        $data["title"] = "Detail";
        $data['main'] = 'detail';
        $this->layout->generate($data);
    }

    // public function Pagination(){
    //     $config = $this->config->item('pagination');
    //     $config['base_url'] = base_url().'Login/mainPage';
    //     $config['total_rows'] =  $this->NewModel->get_total_rows();// Count total rows in your array
    //     $config['per_page'] = 5; // The number of items you want to display per page

    //     $this->pagination->initialize($config);

    //     $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //     $data['results'] = $this->NewModel->get_results($config['per_page'], $offset);

    //     $data['pagination_links'] = $this->pagination->create_links();
    //     $data ["title"] = "Hlavni";
    //     $data ["main"] = "mainPage";
    //     $this->layout->generate($data);

    // }     


    public function searchPost()
    {
        $request_body = $this->input->input_stream();
        $json_string = key($request_body);
        $json_object = json_decode($json_string);
        $search_text = $json_object->searchText;


        // Vyhledávací funkce, získá pole výsledků hledání.
        $searchResults = $this->NewModel->getDataForSearch($search_text);

        if (empty($search_text)) {
            $searchResults = null;
        }



        // Vrátí výsledky vyhledávání jako JSON
        $this->output->set_content_type('application/json');

        // Encode dat jako JSON a odeslání odpovědi
        $this->output->set_output(json_encode($searchResults));
    }

    public function putOrder()
    {

        $data['title'] = 'Děkujeme za objednávku!!';
        $data['main'] = 'putOrder';

        $this->layout->generate($data);
    }
}
