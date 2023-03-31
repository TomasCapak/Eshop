<?php
class Product_model extends CI_Model
{
    public function __construct()
    {
    }
    public function findAll()
    {


        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');

        return $this->db->get()->result_array();
    }

    function find($id)
    {
        //return $this->db->where('idPolozka', $id)->get('polozka')->row();
        $this->db->select();
        $this->db->from('polozka');
        $this->db->where('idPolozka', $id);

        return $this->db->get()->result_array()[0];
    }

    function createOrder()
    {

        $items = unserialize($this->session->userdata('cart'));

        $highestID = $this->db->select('idObjednavka')->from('objednavka')->order_by('idObjednavka', 'DESC')->get()->result_array()[0]['idObjednavka'] + 1;

        $this->db->insert('objednavka', array('idObjednavka' => $highestID));

        // získá ID vložené objednávky
        $order_id = $this->db->insert_id();

        // Vloží objednané položky do tabulky v databázi
        foreach ($items as $item) {
            $order_item_data[] = array(
                'Objednavka_idObjednavka' => $order_id,
                'Polozka_idPolozka' => $item['idPolozka'],
                'pocet' => $item['quantity'],
                'cenaPolozkyObjednavky' => $item['cena'] * $item['quantity']
            );
        }
        $this->db->insert_batch('objednavka_has_polozka', $order_item_data);
        $this->session->set_userdata('cart', '');
    }
}
