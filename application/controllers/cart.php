<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{   function __construct() {
    parent::__construct();
    $this->load->model('NewModel');
    $this->load->model('product_model');
    $this->load->library('cart');

}

    public function index()
    {
        $this->session->cart;
        $data['items'] = array_values(unserialize($this->session->userdata('cart')));
        $data['total'] = $this->total();
        $this->load->view('cart/index', $data);
         $data ["title"] = "Košík";     
        $data ['main'] = 'cartPage';
        $this->layout->generate($data);
    }

    public function buy($id)
    {
        $product = $this->productModel->find($id);
        $item = array(
            'idPolozka' => $product->idPolozka,
            'nazev' => $product->name,
            'fotka' => $product->fotka,
            'cena' => $product->cena,
            'quantity' => 1
        );
        if(!$this->session->has_userdata('cart')) {
            $cart = array($item);
            $this->session->set_userdata('cart', serialize($cart));
        } else {
            $index = $this->exists($id);
            $cart = array_values(unserialize($this->session->userdata('cart')));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata('cart', serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $this->session->set_userdata('cart', serialize($cart));
            }
        }
        redirect('cart');
    }

    public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
        redirect('cart');
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['idPolozka'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    private function total() {
        $items = array_values(unserialize($this->session->userdata('cart')));
        $s = 0;
        foreach ($items as $item) {
            $s += $item['cena'] * $item['quantity'];
        }
        return $s;
    }
}