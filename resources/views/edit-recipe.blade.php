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
            <h1 class="text-center">Edit Recipe</h1>
            <form action="{{ route('update-recipe', ['id'=>$recipe->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Title:</label>
                    @error('title')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <input placeholder="Recipe name" type="text" class="form-control" id="title" name="title"  value="{{ old('title') ? old('title') : $recipe->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    @error('description')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <textarea placeholder="Recipe description" class="form-control" id="description" name="description" rows="3" >{{ old('description') ? old('description') : $recipe->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    @error('ingredients')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <textarea placeholder="Add comma for next ingredient" class="form-control" id="ingredients" name="ingredients" rows="2" >{{ old('ingredients') ? old('ingredients') : $recipe->ingredients }}</textarea>
                </div>
                <div class="form-group">
                    <label for="instructions">Instruction:</label>
                    @error('instructions')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <textarea placeholder="Add new line for next step" class="form-control" id="instructions" name="instructions" rows="2" >
                        <?php
                        foreach ($recipe->instructions as $instruction){
                            print($instruction);
                        }
                        ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    @error('image')
                        <h6 class="form-helper red-important">{{ $message }}</h6>
                    @enderror
                    <input type="file" class="form-control-file" id="image" name="image">
                    <img style="width:300px; height:200px;" src="{{ $recipe->image ? asset('images/'.$recipe->image) : '' }}" alt="" class="view-gambar"><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit Change</button>
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