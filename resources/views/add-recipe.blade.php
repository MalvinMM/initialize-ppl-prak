@extends('layout')

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Add Recipe</h1>
            <form action="{{ route('store-recipe') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    @error('title')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <input placeholder="Recipe name" type="text" class="form-control" id="title" name="title" value="{{ old('title') ? old('title') : '' }}">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    @error('description')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <textarea placeholder="Recipe description" class="form-control" id="description" name="description" rows="3" value="{{ old('description') ? old('description') : '' }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    @error('ingredients')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <textarea placeholder="Add comma for next ingredient" class="form-control" id="ingredients" name="ingredients" rows="2" value="{{ old('ingredients') ? old('ingredients') : '' }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="instructions">Instruction:</label>
                    @error('instructions')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <textarea placeholder="Add new line for next step" class="form-control" id="instructions" name="instructions" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    @error('image')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Add Recipe</button>
            </form>
        </div>
    </div>
</div>
@endsection

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>