<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FruitController extends Controller
{
    public function __invoke()
    {
        $fruits = Fruit::all();
        $totalCount = count($fruits);

        return view('fruits', [
            'fruits' => $fruits,
            'totalCount' => $totalCount
        ]);
    }

    public function add()
    {
        return view('fruits_add');
    }

    public function save(Request $request)
    {
        $fruit = $request->fruit;
        Fruit::create(['name' => $fruit]);

        return redirect()->action(FruitController::class);
    }
}
