<?php
class NewModel extends CI_Model
{
    public function __construct()
    {
    }

    public function get_products($limit = NULL, $offset = NULL, $category_id = NULL, $conditions = array())
    {
        $this->db->select();
        $this->db->from('ci_polozka');
        $this->db->join('ci_kategorie', 'ci_polozka.Kategorie_idKategorie = ci_kategorie.idKategorie');
        $this->db->where('ci_polozka.aktivni', 1);

        if (!is_null($category_id)) {
            // Získá ID všech podkategorií dané kategorie
            $subcategory_ids = $this->getAllSubcategoriesID($category_id);

            // Přidání zadaného ID kategorie do pole ID podkategorií
            var_dump($this->getCategoryByName($category_id));
            var_dump($category_id);
            array_push($subcategory_ids, $this->getCategoryByName($category_id)[0]->idKategorie);
            $this->db->select();
            $this->db->from('ci_polozka');
            $this->db->join('ci_kategorie AS k', 'ci_polozka.Kategorie_idKategorie = k.idKategorie');


            foreach ($subcategory_ids as $row) {
                //$this->db->where('Kategorie_idKategorie', $row);
            }
            $this->db->where_in('ci_polozka.Kategorie_idKategorie', $subcategory_ids);
        }
        // Pokud není zadáno žádné ID kategorie, výsledky se stránkují

        $this->db->limit($limit, $offset);


        if (!empty($conditions)) {
            // Použití všech podmínek v poli $conditions do query
            if (!empty($conditions['where'])) {
                $this->db->where($conditions['where']);
            }

            if (!empty($conditions['order_by'])) {
                $this->db->order_by($conditions['order_by']);
            }
        }

        $query = $this->db->get();
        return $query->result_array();
    }





    public function Kategorie($nazevKategorie)
    {

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

    public function Podkategorie($idKategorie)
    {
        $this->db->select('*');
        $this->db->from('podkategorie');
        $this->db->join('kategorie', 'podkategorie.Kategorie_idKategorie_Podkategorie = kategorie.idKategorie');
        $this->db->where(['idKategorie' => $idKategorie]);


        return $this->db->get()->result_array();
    }

    public function getCategoryByName($name)
    {

        $this->db->select();
        $this->db->from('kategorie');
        $this->db->where('nazevKategorie', $name);


        return $this->db->get()->result();
    }

    public function getCategory()
    {
        $this->db->select('*');
        $this->db->from('kategorie');
        return $this->db->get()->result_array();
    }

    public function getMainCategory()
    {
        $this->db->select('*');
        $this->db->from('kategorie');
        $this->db->where('nadKategorie', null);
        return $this->db->get()->result_array();
    }


    public function getPolozka()
    {


        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->where('ci_polozka.aktivni', 1);

        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $this->db->like(array('nazev' => $keyword));
            $this->db->or_like(array('popis' => $keyword));
            $this->db->or_like(array('nazevKategorie' => $keyword));
        }
        return $this->db->get()->result_array();
    }

    public function getDisabledPolozka()
    {
        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->where('ci_polozka.aktivni', 0);

        return $this->db->get()->result_array();
    }

    public function disablePolozka($id)
    {
        $data = array(
            'aktivni' => 0,
        );

        $this->db->where('idPolozka', $id);
        $this->db->update('ci_polozka', $data);
    }

    public function activatePolozka($id)
    {
        $data = array(
            'aktivni' => 1,
        );

        $this->db->where('idPolozka', $id);
        $this->db->update('ci_polozka', $data);
    }

    public function disableObjednavka($id)
    {
        $data = array(
            'objednavkaAktivni' => 0,
        );

        $this->db->where('idObjednavka', $id);
        $this->db->update('objednavka', $data);
    }



    public function activateObjednavka($id)
    {

        $data = array(
            'objednavkaAktivni' => 1,
        );

        $this->db->where('idObjednavka', $id);
        $this->db->update('objednavka', $data);
    }

    public function getPolozkaByName($nazev)
    {
        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->where('nazev', $nazev);

        $result = $this->db->get()->result_array();

        if (empty($result)) {
            return null;
        }

        return $result[0];
    }

    public function getObjednavka()
    {
        $this->db->select('objednavka.idObjednavka, objednavka.DatumObjednavky, objednavka.objednavkaAktivni, 
                       polozka.idPolozka, polozka.nazev, polozka.popis, polozka.fotka, polozka.cena, polozka.Kategorie_idKategorie, polozka.aktivni, 
                       kategorie.idKategorie, kategorie.nazevKategorie AS kategorie_nazev,
                       objednavka_has_polozka.pocet, objednavka_has_polozka.cenaPolozkyObjednavky');
        $this->db->from('objednavka');
        $this->db->join('objednavka_has_polozka', 'objednavka.idObjednavka = objednavka_has_polozka.Objednavka_idObjednavka');
        $this->db->join('polozka', 'polozka.idPolozka = objednavka_has_polozka.Polozka_idPolozka', 'inner');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->group_by('objednavka.idObjednavka'); // Change this line
        return $this->db->get()->result_array();
    }

    public function getObjednavkaById($id)
    {

        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->join('objednavka_has_polozka', 'polozka.idPolozka = objednavka_has_polozka.Polozka_idPolozka', 'inner');
        $this->db->join('objednavka', 'objednavka.idObjednavka = objednavka_has_polozka.Objednavka_idObjednavka');
        $this->db->where('Objednavka_idObjednavka =' . $id);

        return $this->db->get()->result_array();
    }

    //  public function getSearch($searchProduct) {
    //     if(empty($searchProduct))
    //      return array();
    //      $result = $this->db->like('nazev', $searchProduct)
    //                         ->get('polozka');
    //             return $result->result();
    //  }
    public function getSearch()
    {
        $keyword = $this->input->get('keyword');
        $this->db->like(array('nazev' => $keyword));
        return $this->db->get('polozka')->result();
    }



    public function getSubcategory($id)
    {
        $this->db->select('*');
        $this->db->from('kategorie');
        $this->db->where('nadKategorie =' . $id);
        return $this->db->get()->result_array();
    }

    public function getNadkategorie($id)
    {
        $this->db->select('nadkategorie');
        $this->db->from('kategorie');
        $this->db->where('idKategorie =' . $id);
        return $this->db->get()->result_array()[0]['nadkategorie'];
    }

    public function getKategorieById($nazevKat)
    {
        $this->db->select('nazevKategorie');
        $this->db->from('kategorie');
        $this->db->where('idKategorie =' . $nazevKat);
        return $this->db->get()->result_array();
    }

    public function insertProduct($data)
    {
        // $data = array( 
        //                 'nazev' => $this->input->post('nazev'),
        //                 'popis' => $this->input->post('popis'),
        //                 'cena' => $this->input->post('cena'), 
        //                 'Kategorie_idKategorie' => $this->input->post('nazevKategorie'));
        //$this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $this->db->insert('polozka', $data);
    }

    public function insertCategory($data)
    {
        $this->db->insert('kategorie', $data);
    }

    public function deleteData($id)
    {
        $this->db->where('idPolozka', $id);
        $this->db->delete('polozka');
    }

    public function deleteCategoryData($id)
    {
        $this->db->where('idKategorie', $id);
        $this->db->delete('kategorie');
    }


    public function getAllSubcategoriesID($nazevKategorie)
    {
        $nazevKategorie = urldecode($nazevKategorie);

        $table_alias = 'kkkkkkkkk';
        $this->db->select($table_alias . '.idKategorie, ' . $table_alias . '.nazevKategorie');
        $this->db->from('kategorie AS ' . $table_alias);
        $this->db->where($table_alias . ".nazevKategorie", $nazevKategorie);
        $query_result = $this->db->get()->result_array();

        if (empty($query_result)) {
            return array();
        }

        $idKategorie = $query_result[0]['idKategorie'];
        $table_alias = 'k';

        $this->db->reset_query();
        $this->db->select();
        $this->db->from('kategorie AS ' . $table_alias);
        $this->db->where($table_alias . '.nadKategorie', $idKategorie);

        $result = $this->db->get()->result_array();

        $array = array();
        for ($i = 0; $i < count($result); $i++) {
            array_push($array, $result[$i]['idKategorie']);
            $recursion_result = $this->getAllSubcategoriesID($result[$i]['nazevKategorie']);

            if (!empty($recursion_result)) {
                $array = array_merge($array, $recursion_result);
            }
        }

        return $array;
    }

    public function getAllSubcategoriesNames($nazevKategorie)
    {
        $nazevKategorie = urldecode($nazevKategorie);

        $table_alias = 'kkkkkkkkk';
        $this->db->select($table_alias . '.idKategorie, ' . $table_alias . '.nazevKategorie');
        $this->db->from('kategorie AS ' . $table_alias);
        $this->db->where($table_alias . ".nazevKategorie", $nazevKategorie);
        $query_result = $this->db->get()->result_array();

        if (empty($query_result)) {
            return array();
        }

        $idKategorie = $query_result[0]['idKategorie'];
        $table_alias = 'k';

        $this->db->reset_query();
        $this->db->select();
        $this->db->from('kategorie AS ' . $table_alias);
        $this->db->where($table_alias . '.nadKategorie', $idKategorie);

        $result = $this->db->get()->result_array();

        $array = array();
        for ($i = 0; $i < count($result); $i++) {
            array_push($array, $result[$i]['nazevKategorie']);
            $recursion_result = $this->getAllSubcategoriesNames($result[$i]['nazevKategorie']);

            if (!empty($recursion_result)) {
                $array = array_merge($array, $recursion_result);
            }
        }

        return $array;
    }

    public function getPolozky($kategorie)
    {
        $this->db->select();
        $this->db->from('polozka');
        for ($i = 0; $i < count($kategorie); $i++) {
            $this->db->or_where('kategorie.idKategorie =' . $kategorie[$i]);
        }
        $this->db->join('kategorie', 'kategorie.idKategorie = polozka.Kategorie_idKategorie');

        return $this->db->get()->result_array();
    }


    public function getPolozkyOfPodkategorie($idKategorie)
    {
        $podkategorie = $this->getAllSubcategoriesID($idKategorie);
        array_push($podkategorie, $idKategorie);
        $result = array();
        foreach ($podkategorie as $row) {
            $this->db->select();
            $this->db->from('polozka');
            $this->db->where('nazevKategorie', $row);
            $this->db->join('kategorie', 'kategorie.idKategorie = polozka.Kategorie_idKategorie');
            $result = array_merge($result, $this->db->get()->result_array());
        }

        return $result;
    }

    public function orderPolozky($order)
    {
    }


    public function edit($nazev)
    {


        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->where('nazev', $nazev);
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');




        return $this->db->get()->result_array()[0];
    }

    public function updateData($data)
    {

        $this->db->where('nazev', $data['nazev']);
        $this->db->update('polozka', $data);
    }

    public function editCategory($id)
    {

        $this->db->select('*');
        $this->db->from('kategorie');
        $this->db->where('idKategorie', $id);



        return $this->db->get()->result_array()[0];
    }

    public function updateCategoryData($id, $data)
    {
        $this->db->where('idKategorie', $id);
        $this->db->update('kategorie', $data);
    }

    public function get_total_rows()
    {
        $query = $this->db->get('polozka');
        return $query->num_rows();
    }

    public function get_results($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataForSearch($search_string)
    {
        $this->db->select('idPolozka, nazev');
        $this->db->from('polozka');
        $this->db->like("nazev",  $search_string, 'both');
        $query = $this->db->get();


        $result = $query->result_array();
        // handle no results
        return $result;
    }

    //nové, přidat do dokumentace

    public function get_sorted_polozka($sort_by)
    {
        $this->db->select('*');
        $this->db->from('polozka');
        $this->db->join('kategorie', 'polozka.Kategorie_idKategorie = kategorie.idKategorie');

        switch ($sort_by) {
            case 'price_asc':
                $this->db->order_by('cena', 'ASC');
                break;
            case 'price_desc':
                $this->db->order_by('cena', 'DESC');
                break;
            case 'name_asc':
                $this->db->order_by('nazev', 'ASC');
                break;
            case 'name_desc':
                $this->db->order_by('nazev', 'DESC');
                break;
            default:
                $this->db->order_by('idPolozka', 'DESC');
        }

        return $this->db->get()->result_array();
    }

    public function getObjednavkyByDate($date)
    {
        $this->db->where('DATE(DatumObjednavky)', $date);
        $query = $this->db->get('objednavka');
        return $query->result_array();
    }
}
