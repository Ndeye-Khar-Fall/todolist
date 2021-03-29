@extends('layouts.master')

@section('content')

<h1>you can add category here</h1>
<div class="container">
    <form action="{{ url('/add-category')}}" method="post">
{{-- {{csrf_field()}} --}}
@csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter category name">
    </div>

    <button class="btn btn-danger mt-3">Submit</button>

</form>
</div>
@endsection