@extends('layout')
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .card {
        max-width: 300px;
        max-height: 200px;
        object-fit: cover;
    }
    .card-img-top {
        max-width: 300px;
        max-height: 200px;
        object-fit: cover;
    }
</style>
</head>
<body>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Recipes</h1>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('add-recipe') }}" class="btn btn-primary">Add Recipe</a>
            </div>
            <div class="card-deck">
                @foreach($recipes as $recipe)
                    <div class="card mb-4">
                        @if($recipe->image)
                            <img src="{{ asset('images/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->title }}</h5>
                            <p class="card-text">{{ $recipe->description }}</p>
                            <a href="{{ route('show-recipe', $recipe->id) }}" class="btn btn-primary">View Recipe</a>
                            <a href="{{ route('edit-recipe', $recipe->id) }}" class="btn btn-success mr-2">Edit Recipe</a>
                            <form action="{{ route('delete-recipe', $recipe->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Recipe</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



