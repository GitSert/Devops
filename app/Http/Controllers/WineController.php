<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wine;

class WineController extends Controller
{
    public function create() {
        return view('/wines/create');
    }

    public function store(Request $request) {
        $w = Wine::create($request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'nameOfFile',
            'winery' => ['required', 'min:5', 'max:25'],
            'ABV' => ['required', 'digits_between: 0, 100']
        ]));

        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $w->nameOfFile = $name;
            $w->save();
            $request->file('image')->storeAs('public/images', $w->id . ' ' . $name);
        }
        return redirect(route('wines.index', ['wine' => $w]));
    }

    public function show(Wine $wine)
    {
        return view('/show', ['wine' => $wine]);
    }

    public function index()
    {
        $wines = Wine::latest()->get();

        return view('/wines/index', ['wines' => $wines]);
    }

    public function edit(Wine $wine) {
        return view('/wines/edit', ['wine' => $wine]);
    }

    public function update(Wine $wine, Request $request) {
        $wine->update($request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'nameOfFile',
            'winery' => ['required', 'min:5', 'max:25'],
            'ABV' => ['required', 'digits_between: 0, 100']
        ]));

        return redirect(route('wines.index', $wine));
    }

    public function destroy(Wine $wine) {
        $wine->delete();

        return redirect(route('wines.index', $wine));
    }
}
