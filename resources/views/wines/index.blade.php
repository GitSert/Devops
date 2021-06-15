@extends('layout')

@section('title')Wine @endsection

@section ('content')
    <div class="block">

        <h1>Wine</h1>

        <a href="/wines/create">
            Create a wine
        </a>

        <div>

            @foreach($wines as $w)
                <ul>
                    <img src="{{ asset('/storage/images/' . $w->id . ' ' . $w->nameOfFile) }}" alt="image" title="image">
                    <p>
                        Name: {{ $w->name }}
                    </p>
                    <p>
                        Winery: {{ $w->winery }}
                    </p>
                    <p>
                        ABV: {{ $w->ABV }}%
                    </p>
                    <a href="{{ route('wines.edit', $w) }}">
                        Edit
                    </a>
                    <br>
                </ul>
                <br>
                <hr>
            @endforeach
        </div>

    </div>

@endsection()
