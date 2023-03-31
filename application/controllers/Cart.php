<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('NewModel');
        $this->load->model('product_model');
        $this->load->library('cart');
        if (!$this->session->has_userdata('cart')) {
            $this->session->set_userdata('cart', '');
        }
    }

    public function index()
    {

        if (unserialize($this->session->userdata('cart')) == false) {
            $data['items'] = array();
            $data['cart_empty'] = true;
        } else {
            $data['items'] = array_values(unserialize($this->session->userdata('cart')));
            $data['cart_empty'] = false;
        }

        $data['total'] = $this->total();
        $data["title"] = "Košík";
        $data['main'] = 'cartPage';
        $this->layout->generate($data);
    }

    public function buy($id)
    {
        $product = $this->product_model->find($id);
        $item = array(
            'idPolozka' => $product['idPolozka'],
            'nazev' => $product['nazev'],
            'fotka' => $product['fotka'],
            'cena' => $product['cena'],
            'quantity' => 1
        );
        if (!$this->session->has_userdata('cart')) {
            $cart = array($item);
            $this->session->set_userdata('cart', serialize($cart));
        } else {
            $index = $this->exists($id);
            $cart = array_values(unserialize($this->session->userdata('cart')) == false ? array() : unserialize($this->session->userdata('cart')));
            if ($index == -1) {

                array_push($cart, $item);
                $this->session->set_userdata('cart', serialize($cart));
                //var_dump(unserialize($this->session->userdata('cart')));
            } else {

                $cart[$index++]['quantity']++;
                $this->session->set_userdata('cart', serialize($cart));
                //var_dump(unserialize($this->session->userdata('cart')));
            }
        }

        redirect('cart');
    }


    public function increment_quantity($id)
    {
        $cart = unserialize($this->session->userdata('cart'));
        foreach ($cart as &$item) {
            if ($item['idPolozka'] == $id) {
                $item['quantity']++;
                break;
            }
        }
        $this->session->set_userdata('cart', serialize($cart));
    }

    public function decrement_quantity($id)
    {
        $cart = unserialize($this->session->userdata('cart'));
        foreach ($cart as &$item) {
            if ($item['idPolozka'] == $id) {
                $item['quantity']--;
                if ($item['quantity'] == 0) {
                    $this->remove($id);
                }
                break;
            }
        }
        $this->session->set_userdata('cart', serialize($cart));
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
        if (unserialize($this->session->userdata('cart')) == false) {
            return -1;
        } else {
            $cart = array_values(unserialize($this->session->userdata('cart')));
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['idPolozka'] == $id) {
                    return $i;
                }
            }
            return -1;
        }
    }

    private function total()
    {
        if (unserialize($this->session->userdata('cart')) == false) {
            $items = array();
        } else {
            $items = array_values(unserialize($this->session->userdata('cart')));
        }
        var_dump($items);
        $s = 0;
        foreach ($items as $item) {

            $s += $item['cena'] * $item['quantity'];
        }
        return $s;
    }

    public function createOrder()
    {
        if (unserialize($this->session->userdata('cart')) == false) {
            redirect('hlavni');
        } else {
            $this->product_model->createOrder();
        }
        redirect('objednavkaSuccess');
    }
}
