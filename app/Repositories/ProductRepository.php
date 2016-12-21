<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function __construct()
    {
        
    }

    public function addProduct($name, $description, $price)
    {
            $product = new Product();
            $product->name = $name;
            $product->description = $description;
            $product->price = $price;
            try{
                $product->save();
            } catch (Exception $ex) {
                return ['message' => 'Something went wrong, please try again later.'];
            }
            return ['message' => 'Product has been added successfully'];
    }

    public function updateProduct($prodcutId, $name, $description, $price)
    {
        $product = $this->getProduct($prodcutId);
        if($product) 
        {
            $product->name = $name;
            $product->description = $description;
            $product->price = $price;
            try{
                $product->save();
            } catch (Exception $ex) {
                return ['message' => 'Something went wrong, please try again later.'];
            }
            return ['message' => 'Product has been updated successfully'];
        }
        return ['message' => 'This email id already exists'];
    }

    public function getProducts()
    {
        return Product::all();
    }
    
    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        $product->delete();
    }
    
    public function getProduct($userId)
    {
        $product = Product::find($userId);
        return $product;
    }
}
