@extends('layouts.master')

@section('content')

<h1>You can edit product here</h1>
<a class="btn btn-info float-right mb-4" href="{{url('/')}}">Go back</a>

<form action='{{ url("/edit-product/$product->id")}}' method="post">
    @csrf
    <input type="text" name="title" value="{{old('tile') ?? $product->title}}">
    <input type="text" name="price" value="{{old('price') ?? $product->price}}">
    <select name="category_id" >
        @foreach ($categories as $category)
        <option value="{{$category->id}}"> {{$category->name}} </option>
        @endforeach
        
    </select>
    <button type="submit" class="btn btn-primary">Engistrer</button>
</form>
@endsection