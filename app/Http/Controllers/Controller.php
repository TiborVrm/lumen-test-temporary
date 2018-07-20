<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function handleTransactions(Request $request, $id)
    {
        $type = $request->json()->get('type');

        $query = app('db')->select("SELECT * FROM transactions");

        var_dump($query);
        $content = 'User: ' . $id . ' type: ' . $type;
        return response($content, 200)->header('Content-Type', 'application/json');

    }
}
