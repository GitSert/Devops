@extends('layout')

@section('company')Spirits @endsection

@section ('content')

    <div style="text-align: center">

        <div>
            <h1 style="margin-top: 5%">Edit a spirit</h1>

            <div style="margin: 5%">
                <form method="POST" enctype="multipart/form-data" action="{{ route('spirits.update', $spirit) }}">
                    @csrf
                    @method('PUT')

                    <label for="name">Name:</label><br>
                    <textarea name="name" class="text-field @error('name') is-danger @enderror" id="name" required> {{ $spirit->name }} </textarea><br/>
                    @error('name')
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @enderror

                    <label for="company">Company::</label><br>
                    <textarea name="company" class="text-field @error('company') is-danger @enderror" id="company" required> {{ $spirit->company }} </textarea><br/>
                    @error('company')
                    <p class="help is-danger">{{ $errors->first('company') }}</p>
                    @enderror

                    <label for="ABV">ABV:</label><br>
                    <textarea name="ABV" class="text-field @error('ABV') is-danger @enderror" id="ABV" required> {{ $spirit->ABV }} </textarea><br/>
                    @error('ABV')
                    <p class="help is-danger">{{ $errors->first('ABV') }}</p>
                    @enderror

                    <label for="image">Upload image</label>
                    <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" name="image" class="text-field @error('image') is-danger @enderror" id="image" required>
                    @error ('image')
                    <p class="help is-danger">{{ $errors->first('image') }}</p>
                    @enderror

                    <input type="submit" value="Save">
                </form>

                <form method="POST" action="/spirits/{{ $spirit->id }}">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Delete" class="form-delete-button">
                </form>

            </div>

        </div>

    </div>

@endsection()
