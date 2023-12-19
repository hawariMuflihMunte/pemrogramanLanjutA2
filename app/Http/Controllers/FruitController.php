<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function __invoke(): View
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

    public function save(Request $request): RedirectResponse
    {
        $rules = [
            'fruitName' => 'required'
        ];

        $request->hasFile('fruitImage') && $rules['fruitImage'] = 'mimes:jpg,jpeg,png';
        $data = $request->validate($rules);

        $name = $request->input('fruitName');
        $data['fruitName'] = $name;

        if ($request->hasFile('fruitImage')) {
            $imageFile = $request->file('fruitImage');
            $imageExtension = $imageFile->extension();
            $imageName = uniqid() . "." . $imageExtension;
            $imageFile->move(public_path('images'), $imageName);
            $data['fruitImage'] = $imageName;
        }

        Fruit::create($data);

        return redirect()->route('fruits');
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $rules = [
            'fruitName' => 'required'
        ];

        $request->hasFile('fruitImage') && $rules['fruitImage'] = 'mimes:jpg,jpeg,png';
        $data = $request->validate($rules);

        $name = $request->input('fruitName');
        $data['fruitName'] = $name;

        if ($request->hasFile('fruitImage')) {
            $imageFile = $request->file('fruitImage');
            $imageExtension = $imageFile->extension();
            $imageName = uniqid() . "." . $imageExtension;
            $imageFile->move(public_path('images'), $imageName);
            $data['fruitImage'] = $imageName;
        } else {
            // If no new image is provided, keep the existing image in the database
            unset($data['fruitImage']);
        }

        Fruit::where('id', (int)$id)->update($data);

        return redirect()->route('fruits');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        Fruit::destroy($id);

        return redirect('/fruits');
    }

    public function edit(Request $request, string $id)
    {
        $fruit = Fruit::find((int)$id);

        return view('fruits_edit', [
            'fruit' => $fruit
        ]);
    }
}
