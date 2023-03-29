<?php


class Admin extends CI_Controller
{

    //public $layout = 'menuAdmin';

    //put your code here
    function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('error', 'Nejste přihlášeni');
            redirect('Login/loginUser');
        }

        $this->load->model('NewModel');
    }

    public function adminPage()
    {
        $data['polozky'] = $this->NewModel->getPolozka();
        $data['category'] = $this->NewModel->getCategory();

        $data['mainCategory'] = $this->NewModel->getMainCategory();

        $data["title"] = "Admin";
        $data["main"] = "adminPage";
        $this->layout->generate($data);
    }

    public function delete($id)
    {
        $this->NewModel->disablePolozka($id);
        //$this->session->set_flashdata("status", "Položka byla úspěšně odstraněna.");
        redirect(base_url("hlavni"));
    }

    public function activate($id)
    {
        $this->NewModel->activatePolozka($id);
        redirect(base_url("hlavni"));
    }

    public function disableObjednavka($id)
    {
        $this->NewModel->disableObjednavka($id);
        redirect(base_url("orderList"));
    }

    public function activateObjednavka($id)
    {
        $this->NewModel->activateObjednavka($id);
        redirect(base_url("orderList"));
    }

    public function deleteCategory($id)
    {
        $this->NewModel->deleteCategoryData($id);
        redirect(base_url("categoryList"));
    }


    function categoryList()
    {

        $data['category'] = $this->NewModel->getMainCategory();

        $data["title"] = "Seznam kategorií";
        $data["main"] = "adminCategoryList";
        $data["page"] = "amdinCategoryList";
        $this->layout->generate($data);
    }

    public function adminAddForm()
    {

        $data['Kategorie'] = $this->NewModel->getCategory();


        $data["title"] = "Přidat položku";
        $data["main"] = "adminAddForm";
        $data["page"] = "adminAddForm";
        $this->layout->generate($data);
    }

    public function adminAddCategoryForm()
    {

        $data['Kategorie'] = $this->NewModel->getCategory();



        $data["title"] = "Přidání kategorie";
        $data["main"] = "adminAddCategoryForm";
        $data["page"] = "adminAddCategoryForm";
        $this->layout->generate($data);
    }

    public function categoryEditForm($id)
    {
        $data['KategorieById'] = $this->NewModel->editCategory($id);
        $data['Kategorie'] = $this->NewModel->getCategory();



        $data["title"] = "Úprava kategorie";
        $data["main"] = "adminCategoryEditForm";
        $data["page"] = "adminCategoryEditForm";
        $this->layout->generate($data);
    }

    public function categoryEditPost($id)
    {

        $this->form_validation->set_rules('nazevKategorie', 'Název Kategorie', 'required');

        if ($this->form_validation->run()) {
            $data = [
                "nazevKategorie" => $this->input->post('nazevKategorie'),
                "nadKategorie" => $this->input->post('nadKategorie') == "" ? NULL : $this->input->post('nadKategorie')
            ];
            $this->load->model('NewModel', 'NewModel');
            $this->NewModel->updateCategoryData($id, $data);
            $this->session->set_flashdata("status", "Kategorie byla úspěšně upravena.");
            redirect('categoryEditForm/' . $id);
        } else {
            $this->categoryEditForm($id);
        }
    }

    function categoryPost($data)
    {



        $this->form_validation->set_rules('nazevKategorie', 'Název Kategorie', 'required');

        if ($this->form_validation->run()) {
            $data = [
                "nazevKategorie" => $this->input->post('nazevKategorie'),
                "nadKategorie" => $this->input->post('nadKategorie') == "" ? NULL : $this->input->post('nadKategorie')
            ];
            $this->load->model('NewModel', 'NewModel');
            $this->NewModel->insertCategory($data);
            $this->session->set_flashdata("status", "Kategorie byla úspěšně přidána.");
            redirect(base_url("categoryForm"));
        } else {
            $this->adminAddCategoryForm();
        }
    }

    function Podkategorie($idKategorie = null)
    {
        if ($idKategorie == null) {
            $data['category'] = $this->NewModel->getMainCategory();
            $data["main"] = "adminCategoryList";
        } else {
            $data['nadkategorie'] = $this->NewModel->getNadkategorie($idKategorie);
            $data['subcategory'] = $this->NewModel->getSubcategory($idKategorie);
            if ($data['subcategory'] == null) {
                redirect('podkategorie/' . $data['nadkategorie']);
            }
            $data["title"] = "Seznam podkategorií";
            $data["main"] = "subcategoryList";
        }
        $this->layout->generate($data);
        // if ($data['subcategory'] == NULL){; redirect('categoryList');
        //     return;
        //     }
        //     $data ["main"] = "subcategoryList";
        //     $data ["podkategorie"] = $idKategorie;

        //     //var_dump($data["subcategory"]);
        // $this->layout->generate($data);

    }

    function orderList()
    {

        $data['orders'] = $this->NewModel->getObjednavka();

        $data["title"] = "Seznam objednávek";
        $data["main"] = "adminOrderList";
        $data["page"] = "amdinOrderList";
        $this->layout->generate($data);
    }


    function orderDetail($id)
    {

        $data['orderData'] = $this->NewModel->getObjednavkaById($id);

        $data["title"] = "Detail objednávky";
        $data["main"] = "adminOrderDetail";
        $data["page"] = "adminOrderDetail";
        $this->layout->generate($data);
    }

    function adminEditForm($nazev)
    {
        $data['editData'] = $this->NewModel->edit($nazev);
        $data['Kategorie'] = $this->NewModel->getCategory();



        $data["title"] = "Upravit Položku";
        $data["main"] = "adminEditForm";
        $data["page"] = "adminEditForm";
        $this->layout->generate($data);
    }

    function editPost($nazev)
    {
        $data['editData'] = $this->NewModel->edit($nazev);
        $data['Kategorie'] = $this->NewModel->getCategory();


        $this->form_validation->set_rules('nazev', 'nazev', 'required');
        $this->form_validation->set_rules('popis', 'popis', 'required');
        $this->form_validation->set_rules('cena', 'cena', 'required');

        if ($this->form_validation->run()) {

            if (!empty($_FILES["fotka"]["name"])) {
                $ori_fileanme = $_FILES["fotka"]["name"];
                $new_name = time() . "" . str_replace("", "-", "$ori_fileanme");
                $config = [
                    "upload_path" => "assets/images/",
                    "allowed_types" => "gif|jpg|png",
                    "file_name" => $new_name,
                ];
                $this->load->library("upload", $config);
                if ($this->upload->do_upload("fotka")) {
                    $prod_filename = $this->upload->data("file_name");
                } else {
                    $error = $this->upload->display_errors();
                    // Handle error
                }
            } else {
                $prod_filename = null; // No photo update
            }

            $data = [
                'nazev' => $this->input->post('nazev'),
                'popis' => $this->input->post('popis'),
                'cena' => $this->input->post('cena'),
                'Kategorie_idKategorie' => $this->input->post('nazevKategorie')
            ];

            if ($prod_filename != null) {
                $data["fotka"] = $prod_filename;
            }

            $product = new NewModel;
            $res = $product->updateData($data);
            $this->session->set_flashdata("status", "Položka byla úspěšně upravena.");
            redirect(base_url("editForm/" . $nazev));
        } else {
            $data["title"] = "adminEditForm";
            $data["main"] = "adminEditForm";
            $data["page"] = "adminEditForm";
            $this->layout->generate($data);
        }
    }

    function formPost()
    {

        $this->form_validation->set_rules('nazev', 'nazev', 'required|is_unique[polozka.nazev]');
        $this->form_validation->set_rules('popis', 'popis', 'required');
        $this->form_validation->set_rules('cena', 'cena', 'required');


        if ($this->form_validation->run()) {
            $ori_fileanme = $_FILES["fotka"]["name"];
            $new_name = time() . "" . str_replace("", "-", "$ori_fileanme");
            $config = [
                "upload_path" => "assets/images/",
                "allowed_types" => "gif|jpg|png",
                "file_name" => $new_name,
            ];
            $this->load->library("upload", $config);
            if (!$this->upload->do_upload('fotka')) {
                //$imageError = array('error' => $this->upload->display_errors());
                //$this->load->view("form", $imageError);

                $data["error"] = $this->upload->display_errors();
                $data['Kategorie'] = $this->NewModel->getCategory();
                $data["title"] = "adminAddForm";
                $data["main"] = "adminAddForm";
                $data["page"] = "adminAddForm";
                $this->layout->generate($data);
            } else {
                $prod_filename = $this->upload->data("file_name");

                $data = [

                    'nazev' => $this->input->post('nazev'),
                    'popis' => $this->input->post('popis'),
                    'cena' => $this->input->post('cena'),
                    'Kategorie_idKategorie' => $this->input->post('nazevKategorie')
                ];

                $product = new NewModel;
                $res = $product->insertProduct($data);
                $this->session->set_flashdata("status", "Položka byla úspěšně vložena.");
                redirect(base_url("adminForm"));
            }
        } else {
            $this->adminAddForm();
        }
    }

    //přidat do dokumentace
    public function disabledProducts()
    {
        $data['polozky'] = $this->NewModel->getDisabledPolozka();
        $data["title"] = "Neaktivní Položky";
        $data["main"] = "disabledProducts";
        $data["page"] = "disabledProducts";
        $this->layout->generate($data);
    }

    public function ordersByDate()
    {
        $date = $this->input->post('date');

        if (!empty($date)) {
            $date = new DateTime($date);
            $formatted_date = $date->format('Y-m-d');
            $data['orders'] = $this->NewModel->getObjednavkyByDate($formatted_date);
            $data["title"] = "Objednávky podle data";
            $data["main"] = "adminOrdersByDate";
            $data["page"] = "amdinOrdersByDate";
            $this->layout->generate($data);
        } else {
            redirect('admin/orderList');
        }
    }
    public function generatePdf($order_id)
    {
        $data['orderData'] = $this->NewModel->getObjednavkaById($order_id);

        $html = $this->load->view('order_pdf_view', $data, true);


        $this->load->library('Pdf');
        $this->pdf->loadHtml($html);
        $this->pdf->render();

        $this->pdf->stream('order_' . $order_id . '.pdf', array('Attachment' => 0));
    }

    function adminDetail($nazev)
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

        $data["title"] = "Admin Detail";
        $data['main'] = 'adminDetail';
        $this->layout->generate($data);
    }

    public function excelButton()
    {

        $data["title"] = "Přidání pomocí excelu";
        $data['main'] = 'excel';
        $this->layout->generate($data);
    }



    public function import_products()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('products_excel')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('excel', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $file_path = $data['upload_data']['full_path'];
            // Načtení souboru pomocí PhpSpreadsheet IOFactory
            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
            switch ($file_extension) {
                case 'xls':
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xls');
                    break;
                case 'xlsx':
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
                    break;
                case 'csv':
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
                    break;
                default:
                    exit('Invalid file type');
            }
            $spreadsheet = $reader->load($file_path);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            // Zpracování řádků a vložení do databáze
            for ($i = 1; $i < count($rows); $i++) {
                $product_data = array(
                    'nazev' => $rows[$i][0],
                    'popis' => $rows[$i][1],
                    'cena' => $rows[$i][2],
                    'Kategorie_idKategorie' => $rows[$i][3],
                );


                $this->NewModel->insertProduct($product_data);
            }
            // Odstranění nahraného souboru
            unlink($file_path);
            // Přesměrování na hlavní stránku se zprávou o úspěchu
            $this->session->set_flashdata('success_message', 'Položky byly úspešně přidány!');
            redirect('hlavni');
        }
    }
}
