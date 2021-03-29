@extends('layouts.master')

@section('content')
 
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->title}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->category->name}}</td>
        <td style="display:flex">
          <div>
          <a href="{{url('/edit-product/'.$product->id)}}" class="btn btn-primary mr-2">Edit</a>
        </div>
          <form action="{{url('/delete-product/' .$product->id)}}" method="post">
            {{method_field('DELETE')}}
           {{ csrf_field() }}
             <button class="btn btn-danger " type="submit">Delete</button>
            </form>
        </td>
        </tr>
      @endforeach
      
    </tbody>
  </table>
@endsection