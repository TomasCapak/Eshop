<?php


class Admin extends CI_Controller {

    //public $layout = 'menuAdmin';
    
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('NewModel');
    }

    public function adminPage(){
        $data ['polozky'] = $this->NewModel->getPolozka();
        $data ['category'] = $this->NewModel->getCategory();

        $data["title"] = "Admin";
        $data["main"] = "adminPage";
        $this->layout->generate($data);
    }

    public function delete($id){
		$this->NewModel->deleteData($id);
		
                      redirect(base_url("admin"));

	}

    public function adminAddForm(){

        $data['Kategorie'] = $this->NewModel->getCategory();
        

        $data["title"] = "AdminForm";
        $data["main"] = "adminAddForm";
        $data["page"] = "adminAddForm";
        $this->layout->generate($data);
        
    }

    function formPost(){

        $this->form_validation->set_rules('nazev', 'nazev', 'required');
        $this->form_validation->set_rules('popis', 'popis', 'required');
        $this->form_validation->set_rules('cena', 'cena', 'required');


        if ($this->form_validation->run()){
        $ori_fileanme = $_FILES["fotka"]["name"];
        $new_name = time()."".str_replace("","-","$ori_fileanme");
        $config = [ 
            "upload_path" => "assets/images/",
            "allowed_types" => "gif|jpg|png",
            "file_name" => $new_name,
        ];
        $this->load->library("upload", $config); 
        if ( ! $this->upload->do_upload('fotka'))
                {
                        //$imageError = array('error' => $this->upload->display_errors());
                        //$this->load->view("form", $imageError);

                        $data["error"] = $this->upload->display_errors();
                        $data['Kategorie'] = $this->NewModel->getCategory();
                        $data["title"] = "adminAddForm";
                        $data["main"] = "adminAddForm";
                        $data["page"] = "adminAddForm";
                        $this->layout->generate($data);
                }
                else
                {
                      $prod_filename = $this->upload->data("file_name");
                      $data = [
                            "fotka" => $prod_filename,
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

}