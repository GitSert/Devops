@extends('layout')

@section('brewery')Beer @endsection

@section ('content')

    <div style="text-align: center">

        <div>
            <h1 style="margin-top: 5%">Edit a beer</h1>

            <div style="margin: 5%">
                <form method="POST" enctype="multipart/form-data" action="{{ route('beers.update', $beer) }}">
                    @csrf
                    @method('PUT')

                    <label for="name">Name:</label><br>
                    <input name="name" class="text-field @error('name') is-danger @enderror" id="name" required value="{{ $beer->name }}"><br/>
                    @error('name')
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @enderror

                    <label for="brewery">Brewery:</label><br>
                    <input name="brewery" class="text-field @error('brewery') is-danger @enderror" id="brewery" required value="{{ $beer->brewery }}"><br/>
                    @error('brewery')
                    <p class="help is-danger">{{ $errors->first('brewery') }}</p>
                    @enderror

                    <label for="typeOfBeer">Type of beer:</label><br>
                    <input name="typeOfBeer" class="text-field-brewery  @error('typeOfBeer') is-danger @enderror" id="typeOfBeer" required value="{{ $beer->typeOfBeer }}"><br/>
                    @error ('typeOfBeer')
                    <p class="help is-danger">{{ $errors->first('brewery') }}</p>
                    @enderror

                    <label for="ABV">ABV:</label><br>
                    <input name="ABV" class="text-field @error('ABV') is-danger @enderror" id="ABV" required value="{{ $beer->ABV }}"><br/>
                    @error('ABV')
                    <p class="help is-danger">{{ $errors->first('ABV') }}</p>
                    @enderror

                    <label for="image">Upload image</label>
                    <input type="file" name="image" accept="image/png, image/gif, image/jpeg, image/jpg" class="text-field @error('image') is-danger @enderror" id="image" required>
                    @error ('image')--}}
                    <p class="help is-danger">{{ $errors->first('image') }}</p>
                    @enderror
                    <br>

                    <input type="submit" value="Save" class="saveButton">
                </form>
                <br>
                <form method="POST" action="/beers/{{ $beer->id }}">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Delete" class="delButton">
                </form>

            </div>

        </div>

    </div>

@endsection()
