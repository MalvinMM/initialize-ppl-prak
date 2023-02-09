@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ $recipe->title }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if($recipe->image)
                <img src="{{ asset('images/' . $recipe->image) }}" class="img-fluid" alt="{{ $recipe->title }}">
            @endif
        </div>
        <div class="col-md-6">
            <h5>Ingredients:</h5>
            <ul>
                @foreach(explode(',', $recipe->ingredients) as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
            <h5>Instructions:</h5>
            <ol>
                @foreach($recipe->instructions as $instruction)
                    <li>{{ $instruction }}</li>
                @endforeach
            </ol>
            {{-- <p>{{ $recipe->instructions }}</p> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('landing') }}" class="btn btn-primary">Back to Recipes</a>
        </div>
    </div>
</div>
@endsection
