<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\spirit;

class SpiritController extends Controller
{
    public function create() {
        return view('/spirits/create');
    }

    public function store(Request $request) {
        $s = Spirit::create($request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'nameOfFile',
            'company' => ['required', 'min:5', 'max:25'],
            'ABV' => ['required', 'digits_between: 0, 100']
        ]));

        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $s->nameOfFile = $name;
            $s->save();
            $request->file('image')->storeAs('public/images', $s->id . ' ' . $name);
        }

        return redirect(route('spirits.store', ['spirit' => $s]));
    }

    public function show(Spirit $spirit)
    {
        return view('/show', ['spirit' => $spirit]);
    }

    public function index()
    {
        $spirits = Spirit::latest()->get();

        return view('/spirits/index', ['spirits' => $spirits]);
    }

    public function edit(Spirit $spirit) {
        return view('/spirits/edit', ['spirit' => $spirit]);
    }

    public function update(Spirit $spirit, Request $request) {
        $spirit->update($request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'nameOfFile',
            'company' => ['required', 'min:5', 'max:25'],
            'ABV' => ['required', 'digits_between: 0, 100']
        ]));

        return redirect(route('spirits.index', $spirit));
    }

    public function destroy(Spirit $spirit) {
        $spirit->delete();

        return redirect(route('spirits.index', $spirit));
    }
}
