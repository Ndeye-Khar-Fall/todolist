@extends('layouts.master')

@section('content')
    
    <div class="container">
    <h3>Categories</h3>
<a class="btn btn-primary float-right mb-4" href="{{url('/add-category')}}">Add category</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Date created</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <th scope="row">{{$category->id}}</th>
          <td>{{$category->name}}</td>
          <td>{{$category->created_at->diffForHumans()}}</td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    </div> 
 @endsection    