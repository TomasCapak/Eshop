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
class Login extends CI_Controller {
     

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('NewModel');
        $this->config->load('pagination', TRUE);
    }

    function registerUser() {
        $data["title"] = "Registrace";
        $data["main"] = "register";

        //$this->NewModel->selectData();
        
        
        
        $this->layout->generate($data);
    }

    function loginUser() {
        



        $data["title"] = "Přihlášení";
        $data["main"] = "login";
        $this->layout->generate($data);
    }

    function doLogin() {


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

    function logout(){
        $this->ion_auth->logout();
        redirect('prihlaseni');
    }

    function mainPage() {
        //Bere data o polozce z modelu pro kartu
        $data ['polozky'] = $this->NewModel->getPolozka();
        $data ['category'] = $this->NewModel->getCategory();
        $data ['mainCategory'] = $this->NewModel->getMainCategory();

        
        

        $config = $this->config->item('pagination');
        $config['base_url'] = base_url("").'Login/mainPage';
        $config['total_rows'] =  $this->NewModel->get_total_rows();// Count total rows in your array
        $config['per_page'] = 8; // The number of items you want to display per page
       

        $this->pagination->initialize($config);

        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->NewModel->get_results($config['per_page'], $offset);

        $data['pagination_links'] = $this->pagination->create_links();
        
        
        //$data['Elektro'] = $this->NewModel->Elektro();


        $data ["title"] = "Hlavni";
        $data ["main"] = "mainPage";
        $this->layout->generate($data);

    }

    

     function Kategorie($nazevKategorie) {
        $data ['category'] = $this->NewModel->getCategory();
        $data['polozky'] = $this->NewModel->Kategorie($nazevKategorie);
        $data ['podkategorie'] = $this->NewModel->getSubcategory($data['polozky'][0]['Kategorie_idKategorie']);
        if ($data['polozky'] == NULL){; redirect('hlavni');
        return;
        }

        
        $data['productSearch'] = $this->NewModel->getSearch();
        $data ["main"] = "mainPage";
        $data ["kategorie"] = $nazevKategorie;

       
        $this->layout->generate($data);

    }


    function Search(){
        $data ['polozky'] = $this->NewModel->getPolozka();
        $data ['category'] = $this->NewModel->getCategory();
        $data['productSearch'] = $this->NewModel->getSearch();

      
        
        
        $data['main'] = 'mainPage';
        
        $this->layout->generate($data);


     }

    function getPodkategorie($idKategorie){
        
      
        $polozkyKategorii = $this->NewModel->getPolozkyOfPodkategorie($idKategorie);
        $data['polozkyKategorii'] = $polozkyKategorii;


        $result = $this->NewModel->getAllSubcategoriesID($idKategorie);
        $data['data'] = $result;

    
        $data['main'] = 'mainPage';
        $data ['mainCategory'] = $this->NewModel->getMainCategory();


        $data ['category'] = $this->NewModel->getCategory();
        
        //$data ['kategorieById'] = $this->NewModel->getKategorieById($nazevKat);
        
        $data ["kategorie"] = $idKategorie;
        
        $data['productSearch'] = $this->NewModel->getSearch();



        //var_dump($result);
        // $result2 = $this->NewModel->getPolozky($result);
        //  var_dump($result2);

        $this->layout->generate($data);

    
    }

    function Detail($nazev){

       
        $polozkaByName = $this->NewModel->getPolozkaByName($nazev);
        $data['polozkaByName'] = $polozkaByName;


        $data ["title"] = "Detail";     
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
        public function sort(){
            $data ['polozky'] = $this->NewModel->getPolozka();
            $data ['category'] = $this->NewModel->getCategory();
            $data ['mainCategory'] = $this->NewModel->getMainCategory();
    
            
            
    
            $config = $this->config->item('pagination');
            $config['base_url'] = base_url("").'Login/mainPage';
            $config['total_rows'] =  $this->NewModel->get_total_rows();// Count total rows in your array
            $config['per_page'] = 8; // The number of items you want to display per page
           
    
            $this->pagination->initialize($config);
    
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['results'] = $this->NewModel->get_results($config['per_page'], $offset);
    
            $data['pagination_links'] = $this->pagination->create_links();



              
    $cards = $this->db->get('polozka')->result_array();

 
    $card_names = array_column($cards, 'nazev');
    $card_prices = array_column($cards, 'cena');

    // Sort the card array by name and price
    array_multisort($card_names, SORT_ASC, SORT_STRING, $card_prices, SORT_ASC, SORT_NUMERIC, $cards);

    // Load the view file and pass the sorted card data to it
    $data['cards'] = $cards;
        $data ["title"] = "mainPage";     
        $data['main'] = 'mainPage';
        $this->layout->generate($data);




        }
    
}




