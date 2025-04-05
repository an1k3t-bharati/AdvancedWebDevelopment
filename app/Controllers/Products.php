<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function men()
    {
        $model = new ProductModel();
        $products = $model->where('category_id', 1)->findAll();

        // Group products by type
        $productsByType = [];
        foreach ($products as $product) {
            $productsByType[$product['type']][] = $product;
        }

        return view('products/category', [
            'category' => 'Men',
            'productsByType' => $productsByType
        ]);
    }

    public function women()
    {
        $model = new ProductModel();
        $products = $model->where('category_id', 2)->findAll();

       
        $productsByType = [];
        foreach ($products as $product) {
            $productsByType[$product['type']][] = $product;
        }

        return view('products/category', [
            'category' => 'Women',
            'productsByType' => $productsByType
        ]);
    }
    public function search()
{
    $query = $this->request->getGet('q');
    $category = $this->request->getGet('category');

    $model = new \App\Models\ProductModel();

    $builder = $model->like('name', $query);

    if ($category) {
        $builder = $builder->where('category_id', $category);
    }

    $results = $builder->findAll();

    return view('products/search_results', [
        'products' => $results,
        'searchQuery' => $query,
        'category' => $category
    ]);
}

}
