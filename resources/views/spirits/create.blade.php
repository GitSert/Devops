@extends('layout')

@section('title')Spirit Creation @endsection

@section('content')
    <?php use App\Http\Controllers\BeerController ?>
    <div>
        <h1 class="margin-h1 center1 texttype1 text-red" id="shadow">Make a spirit</h1>
        <div
            class="center2 margin-h1 texttype1 text-red"
            style="text-align: center;"
            id="shadow"
        >

            <form method="POST" enctype="multipart/form-data" action="/spirits">
                @csrf
                <label for="name">Spirit name:</label><br>
                <textarea name="name" class="text-field @error('name') is-danger @enderror" id="name" required>{{ old('name') }}</textarea><br/>
                @error('name')
                <p class="help is-danger">{{ $errors->first('name') }}</p>
                @enderror

                <label for="company">Company:</label><br>
                <textarea name="company" class="text-field-company  @error('company') is-danger @enderror" id="company" required>{{ old('company') }}</textarea><br/>
                @error ('company')
                <p class="help is-danger">{{ $errors->first('company') }}</p>
                @enderror

                <label for="ABV">ABV:</label><br>
                <textarea name="ABV" class="text-field  @error('ABV') is-danger @enderror" id="ABV" required>{{ old('ABV') }}</textarea><br/>
                @error ('ABV')
                <p class="help is-danger">{{ $errors->first('ABV') }}</p>
                @enderror

                <label for="image">Upload image</label>
                <input type="file" name="image" accept="image/png, image/gif, image/jpeg, image/jpg" class="text-field @error('image') is-danger @enderror" id="image" required>
                @error ('image')--}}
                <p class="help is-danger">{{ $errors->first('image') }}</p>
                @enderror
                <br>
                <input type="submit" value="Submit" class="submitButton">
            </form>

        </div>
    </div>
@endsection
