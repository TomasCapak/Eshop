<?php
class product_model extends CI_Model
{
    public function __construct()
	{


    }
        public function findAll(){
            
        
            $this->db->select('*');
            $this->db->from('polozka');
            $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
            
          return $this->db->get()->result_array();


    }
    
    function find($id)
    {
        return $this->db->where('idPolozka', $id)->get('polozka')->row();
    }

    

}?>