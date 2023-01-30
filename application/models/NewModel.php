<?php
class NewModel extends CI_Model
{
    public function __construct()
	{


    }

    public function Kategorie($nazevKategorie){

        // $data = array(
        //         'nazev' => 'Elektro'
        // );
        // $this->db->insert('kategorie', $data)
        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie'); 
        $this->db->where(['nazevKategorie' => $nazevKategorie]);


        return $this->db->get()->result_array();
   
    }

    public function Podkategorie($idKategorie) {
        $this->db->select('*');
        $this->db->from('podkategorie');
        $this->db->join('kategorie', 'podkategorie.Kategorie_idKategorie_Podkategorie = kategorie.idKategorie');
        $this->db->where(['idKategorie' => $idKategorie]);

        
        return $this->db->get()->result_array();

     }
     
     public function getCategoryByName($name){

        $this->db->select();
        $this->db->from('kategorie');
        $this->db->where('nazevKategorie', $name);
        
        var_dump($this->db->get()->result());
     }

    public function getCategory(){
        $this->db->select('*');
        $this->db->from('kategorie');
        return $this->db->get()->result_array();

    }

    public function getMainCategory(){
        $this->db->select('*');
        $this->db->from('kategorie');
        $this->db->where('nadKategorie', null);
        return $this->db->get()->result_array();
    }


    public function getPolozka(){
            
        
            $this->db->select('*');
            $this->db->from('polozka');
            $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
            
            $keyword = $this->input->get('keyword');
            if($keyword){
                $this->db->like(array('nazev'=>$keyword));
                $this->db->or_like(array('popis'=>$keyword));
                $this->db->or_like(array('nazevKategorie'=>$keyword));
            }
          return $this->db->get()->result_array();


    }


    public function getPolozkaByName($nazev){

        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->where('nazev', $nazev);
       
        
        return $this->db->get()->result_array();


    }

    public function getObjednavka(){
        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->join('objednavka_has_polozka', 'polozka.idPolozka = objednavka_has_polozka.Polozka_idPolozka', 'inner');
        $this->db->join('objednavka', 'objednavka.idObjednavka = objednavka_has_polozka.Objednavka_idObjednavka');
        return $this->db->get()->result_array();

    }

    //  public function getSearch($searchProduct) {
    //     if(empty($searchProduct))
    //      return array();
    //      $result = $this->db->like('nazev', $searchProduct)
    //                         ->get('polozka');
    //             return $result->result();
    //  }
     public function getSearch() {
        $keyword = $this->input->get('keyword');
        $this->db->like(array('nazev'=>$keyword));
        return $this->db->get('polozka')->result();
     }

     public function getSubcategory($id) {
        $this->db->select('*');
        $this->db->from('kategorie');
        $this->db->where('nadKategorie ='.$id);
        return $this->db->get()->result_array();

     }

     public function getNadkategorie($id){
        $this->db->select('nadkategorie');
        $this->db->from('kategorie');
        $this->db->where('idKategorie ='.$id);
        return $this->db->get()->result_array()[0]['nadkategorie'];
     }

     public function getKategorieById($nazevKat){
        $this->db->select('nazevKategorie');
        $this->db->from('kategorie');
        $this->db->where('idKategorie ='.$nazevKat);
        return $this->db->get()->result_array();
     }
    
     public function insertProduct($data) {
        // $data = array( 
        //                 'nazev' => $this->input->post('nazev'),
        //                 'popis' => $this->input->post('popis'),
        //                 'cena' => $this->input->post('cena'), 
        //                 'Kategorie_idKategorie' => $this->input->post('nazevKategorie'));
        //$this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->insert('polozka', $data);


     }

     public function insertCategory($data){
        $this->db->insert('kategorie', $data);

     }

     public function deleteData($id){
            $this->db->where('idPolozka', $id);
            $this->db->delete('polozka');
            
     }

     public function deleteCategoryData($id){
        $this->db->where('idKategorie', $id);
        $this->db->delete('kategorie');
        
    }


    public function getAllSubcategoriesID($nazevKategorie){

        $nazevKategorie = urldecode($nazevKategorie);
        //$nazevKategorie = normalizer_normalize($nazevKategorie, Normalizer::FORM_D);
        //$nazevKategorie = urlencode($nazevKategorie);

        $this->db->select('idKategorie, nazevKategorie');
        $this->db->from('kategorie');
        $this->db->where("nazevKategorie", $nazevKategorie);
        $query_result = $this->db->get()->result_array();
        if (empty($query_result)) {
            return array();
        }
        $idKategorie = $query_result[0]['idKategorie'];
       
        $this->db->reset_query();
    
        $this->db->select();
        $this->db->from('kategorie');
        $this->db->where('nadKategorie', $idKategorie);
    
        $result = $this->db->get()->result_array();
 
        
        $array = array();
            for($i = 0; $i < count($result); $i++){
                array_push($array, $result[$i]['nazevKategorie']);
                $recursion_result = $this->getAllSubcategoriesID($result[$i]['nazevKategorie']);
                if(!empty($recursion_result)){
                    $array = array_merge($array, $recursion_result);
                }
            }
        
        return $array;
        
    }


    public function getPolozky($kategorie){
        $this->db->select();
        $this->db->from('polozka');
        for($i = 0; $i < count($kategorie); $i++){
            $this->db->or_where('kategorie.idKategorie ='.$kategorie[$i]);
        }
        $this->db->join('kategorie', 'kategorie.idKategorie = polozka.Kategorie_idKategorie');

        return $this->db->get()->result_array();
    }


    public function getPolozkyOfPodkategorie($idKategorie){
        $podkategorie = $this->getAllSubcategoriesID($idKategorie);
        array_push($podkategorie, $idKategorie);
        $result = array();
        foreach($podkategorie as $row){
            $this->db->select();
            $this->db->from('polozka');
            $this->db->where('nazevKategorie', $row);
            $this->db->join('kategorie', 'kategorie.idKategorie = polozka.Kategorie_idKategorie');
            $result = array_merge($result, $this->db->get()->result());
        }

        return $result;
    }

    public function orderPolozky($order){


    }


}    
    
?>