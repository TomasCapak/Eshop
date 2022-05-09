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

    function mainPage() {
        //Bere data o polozce z modelu pro kartu
        $data ['polozky'] = $this->NewModel->getPolozka();

        //$data['Elektro'] = $this->NewModel->Elektro();

        $data ["title"] = "Hlavni";
        $data ["main"] = "mainPage";
        $this->layout->generate($data);

    }

    //  function zkouska($Elektro) {
        
    //     $Elektro = $data['Elektro'] = $this->NewModel->Elektro();
      

    //     $this->load->view('mainPage', $Elektro);
    //     $data ["main"] = "mainPage";
    //     $data['Elektro'] = $this->NewModel->Elektro();
    //     $this->layout->generate($data);

    // }




    function cartPage() {
        $data ["title"] = "Košík";
        $data ["main"] = "cartPage";
        $this->layout->generate($data);

    }



}
