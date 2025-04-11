<?php

namespace App\Http\Controllers;

use App\Events\ProductUpdated;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET','https://fakestoreapi.com/products');

        $data['products'] = json_decode($response->getBody(), true);

        return view('product', $data);

    }

    public function dbProducts()
    {
        $data['products'] = Product::get();

        return view('db_product', $data);
    }

    public function productStore(Request $request)
    {
        $product = Product::store($request->all());

        if($product) {
            $this->synchronize();
        }
    }

    public function synchronize()
    {
        $data = Product::get();
        event(new ProductUpdated($data, 'my-channel', 'my-event'));
        return true;
    }
}
