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

    public function getCategory(){
        $this->db->select('*');
        $this->db->from('kategorie');
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
    
     public function insertProduct($data) {
        // $data = array( 
        //                 'nazev' => $this->input->post('nazev'),
        //                 'popis' => $this->input->post('popis'),
        //                 'cena' => $this->input->post('cena'), 
        //                 'Kategorie_idKategorie' => $this->input->post('nazevKategorie'));
        //$this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->insert('polozka', $data);


     }

     public function deleteData($id){
            $this->db->where('idPolozka', $id);
            $this->db->delete('polozka');
            


     }


}    
    
    

?>