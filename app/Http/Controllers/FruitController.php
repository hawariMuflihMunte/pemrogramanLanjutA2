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
        /*$validationMessage = [
            'name.unique' => 'Duplicate'
        ];

        $validationRules = [ 'name' => 'unique:fruit' ];
        $request->validate($validationRules, $validationMessage);

        $existing_fruit = Fruit::where('name', $request->fruit);

        if (isset($existing_fruit)) {
            return view('duplicate');
        }

        $fruit = $request->fruit;
        Fruit::create(['name' => $fruit]);

        return redirect()->action(FruitController::class); */

        $f = $request->fruit;
        Fruit::create([
            'name' => $f
        ]);

        return redirect()->route('fruits');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Fruit::destroy($id);

        return redirect('/fruits');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        //Fruit::where($id)
        return view('fruits.edit');
    }
}
