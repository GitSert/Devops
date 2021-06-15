<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beer;

class BeerController extends Controller
{
    public function create() {
        return view('/beers/create');
    }

    public function store(Request $request) {
        $b = Beer::create($request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'nameOfFile',
            'typeOfBeer' => ['required', 'min:2', 'max:30'],
            'brewery' => ['required', 'min:3', 'max:30'],
            'ABV' => ['required', 'integer', 'between:1,100']
        ]));

        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $b->nameOfFile = $name;
            $b->save();
            $request->file('image')->storeAs('public/images', $b->id . ' ' . $name);
        }
        return redirect(route('beers.index', ['beer' => $b]));
    }

    public function show(Beer $beer)
    {
        return view('/show', ['beer' => $beer]);
    }

    public function index()
    {
        $beers = Beer::latest()->get();

        return view('/beers/index', ['beers' => $beers]);
    }

    public function edit(Beer $beer) {
        return view('/beers/edit', ['beer' => $beer]);
    }

    public function update(Beer $beer, Request $request) {
        $beer->update($request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'nameOfFile',
            'typeOfBeer' => ['required', 'min:2', 'max:30'],
            'brewery' => ['required', 'min:4', 'max:25'],
            'ABV' => ['required', 'between: 0, 100']
        ]));

        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $beer->nameOfFile = $name;
            $beer->save();
            $request->file('image')->storeAs('public/images', $beer->id . ' ' . $name);
        }

        return redirect(route('beers.index', $beer));
    }

    public function destroy(Beer $beer) {
        $beer->delete();

        return redirect(route('beers.index', $beer));
    }
}
