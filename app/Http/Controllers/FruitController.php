<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function index()
    {
        $fruits = [
            'Pineapple',
            'Orange',
            'Salak'
        ];
        $totalCount = count($fruits);

        return view('fruits', [
            'fruits' => $fruits,
            'totalCount' => $totalCount
        ]);
    }
}
