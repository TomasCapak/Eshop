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
        $data ['objednavky'] = $this->NewModel->getObjednavka();
        $data["title"] = "Přihlášení";
        $data["main"] = "login";
        $this->layout->generate($data);
    }

    function mainPage() {
        //Bere data o polozce z modelu pro kartu
        $data ['polozky'] = $this->NewModel->getPolozka();
        $data ['category'] = $this->NewModel->getCategory();
        
        
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
        $result = $this->NewModel->getAllSubcategoriesID($idKategorie);
        $result2 = $this->NewModel->getPolozky($result);
        var_dump($result2);
    }


    

    
}




