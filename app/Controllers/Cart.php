<?php

namespace App\Controllers;

class Cart extends BaseController
{
    public function index()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/user/login')->with('error', 'Please login to view your cart.');
        }

        $cart = $session->get('cart') ?? [];
        return view('cart/index', ['cart' => $cart]);
    }

    public function add()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/user/login')->with('error', 'Please login to add to cart.');
        }

        $productId = $this->request->getPost('product_id');
        $productName = $this->request->getPost('product_name');
        $productPrice = $this->request->getPost('product_price');
        $productImage = $this->request->getPost('product_image');

        $cart = $session->get('cart') ?? [];
        $found = false;

        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'image' => $productImage,
                'quantity' => 1
            ];
        }

        $session->set('cart', $cart);
        $session->set('cart_count', array_sum(array_column($cart, 'quantity')));

        return redirect()->to('/cart');
    }

    public function ajaxAdd()
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please login to add to cart.'
            ]);
        }

        $productId = $this->request->getPost('product_id');
        $productName = $this->request->getPost('product_name');
        $productPrice = $this->request->getPost('product_price');
        $productImage = $this->request->getPost('product_image');

        $cart = $session->get('cart') ?? [];
        $found = false;

        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'image' => $productImage,
                'quantity' => 1
            ];
        }

        $session->set('cart', $cart);
        $cartCount = array_sum(array_column($cart, 'quantity'));
        $session->set('cart_count', $cartCount);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Product added to cart!',
            'cart_count' => $cartCount
        ]);
    }

    public function remove()
    {
        $session = session();
        $productId = $this->request->getPost('product_id');

        $cart = $session->get('cart') ?? [];

        $cart = array_filter($cart, function ($item) use ($productId) {
            return $item['id'] != $productId;
        });

        $session->set('cart', $cart);
        $session->set('cart_count', array_sum(array_column($cart, 'quantity')));

        return redirect()->to('/cart');
    }
}
