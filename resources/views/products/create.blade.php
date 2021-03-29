@extends('layouts.master')

@section('content')

<h1>you can add product here</h1>
<div class="container">

    <a class="btn btn-info float-right mb-4" href="{{url('/')}}">Go back</a>
<form action="{{url('/add-product')}}" method="post" enctype="multipart/form-data">
{{-- {{csrf_field()}} --}}
@csrf

    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Title">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <input type="number" name="price" value="{{old('price')}}" class="form-control" placeholder="price">
      </div>

      <select name="category_id" class="form-control" id="exampleFormControlSelect1">
          @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
      
        <div class="form-group mt-4">
            <label for="exampleFormControlFile1">Select Product Image</label>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
          </div>

      <button class="btn btn-danger mt-3">Submit</button>
</form>
</div>
@endsection