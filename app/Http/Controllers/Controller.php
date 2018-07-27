<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function handlePost(Request $request, $id)
    {

        if (false === $request->exists('price')) {
            return response(['message' => 'No price given'], 400)->header('Content-Type', 'application/json');
        }

        $price = $request->json()->get('price');

        $transaction = new \stdClass();
        $transaction->price = $price;

        $this->save($transaction);
        $content = ['message' => ['User' => $id]];

        return response($content, 200)->header('Content-Type', 'application/json');
    }

    public function handleGet($id)
    {
        $query = app('db')->select("SELECT * FROM transactions WHERE id = $id");

        $response = [];
        foreach($query as $item) {
            $response['transaction'] = ['id' => $item->id,'price' => $item->price];
        }

        return response($response, 200)->header('Content-Type', 'application/json');
    }

    private function save($transaction)
    {
        app('db')->insert("INSERT INTO transactions (price, created_at, updated_at) VALUES ($transaction->price, NOW(), NOW())");
    }

}
