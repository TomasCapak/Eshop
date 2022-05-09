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
          return $this->db->get()->result_array();


    }


}    
    
    

?>