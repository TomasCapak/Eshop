<?php


class Admin extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('NewModel');
    }

    public function adminPage(){
        $data["title"] = "Admin";
        $data["main"] = "adminPage";
        $this->layout->generate($data);
    }

    public function adminAddForm(){

        $data['Kategorie'] = $this->NewModel->getCategory();


        $data["title"] = "AdminForm";
        $data["main"] = "adminAddForm";
        $this->layout->generate($data);
    }

}