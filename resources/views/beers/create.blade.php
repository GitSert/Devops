@extends('layout')

@section('title')Beer Creation @endsection

@section('content')
    <?php use App\Http\Controllers\BeerController ?>
    <div>
        <h1 class="margin-h1 center1 texttype1 text-red" id="shadow">Make a beer</h1>
        <div
            class="center2 margin-h1 texttype1 text-red"
            style="text-align: center;"
            id="shadow"
        >

            <form method="POST" enctype="multipart/form-data" action="/beers">
                @csrf
                <label for="name">Beer name:</label><br>
                <input name="name" class="text-field @error('name') is-danger @enderror" id="name" required>{{ old('name') }}<br/>
                @error('name')
                <p class="help is-danger">{{ $errors->first('name') }}</p>
                @enderror

                <label for="brewery">Brewery:</label><br>
                <input name="brewery" class="text-field-brewery  @error('brewery') is-danger @enderror" id="brewery" required>{{ old('brewery') }}<br/>
                @error ('brewery')
                <p class="help is-danger">{{ $errors->first('brewery') }}</p>
                @enderror

                <label for="typeOfBeer">Type of beer:</label><br>
                <input name="typeOfBeer" class="text-field-brewery  @error('typeOfBeer') is-danger @enderror" id="typeOfBeer" required>{{ old('typeOfBeer') }}<br/>
                @error ('typeOfBeer')
                <p class="help is-danger">{{ $errors->first('brewery') }}</p>
                @enderror

                <label for="ABV">ABV:</label><br>
                <input name="ABV" class="text-field  @error('ABV') is-danger @enderror" id="ABV" required>{{ old('ABV') }}<br/>
                @error ('ABV')
                <p class="help is-danger">{{ $errors->first('ABV') }}</p>
                @enderror

                <label for="image">Upload image</label>
                <input type="file"  accept="image/png, image/gif, image/jpeg, image/jpg" name="image" class="text-field @error('image') is-danger @enderror" id="image" required>
                @error ('image')
                <p class="help is-danger">{{ $errors->first('image') }}</p>
                @enderror
                <br>
                <input type="submit" value="Submit" class="submitButton">
            </form>

        </div>
    </div>
@endsection
