@extends('layout')

@section('title')Beer @endsection

@section ('content')
    <div class="block">

        <h1>Beer</h1>

        <a href="/beers/create">
            Create a beer
        </a>

        <div>

            @foreach($beers as $b)
                <ul>
                    <img src="{{ asset('/storage/images/' . $b->id . ' ' . $b->nameOfFile) }}" alt="image" title="image">
                    <p>
                        Name: {{ $b->name }}
                    </p>
                    <p>
                        Brewery: {{ $b->brewery }}
                    </p>
                    <p>
                        Type of beer: {{ $b->typeOfBeer }}
                    </p>
                    <p>
                        ABV: {{ $b->ABV }}%
                    </p>
                    <a href="{{ route('beers.edit', $b) }}">
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
