@extends('layouts.app')

@section('title-block'){{ $data->name }}@endsection

@section('content')
  <h1>{{  $data->name }}</h1>
  <div class="alert alert-info">
    <h3>{{ $data -> name}}</h3>
    <p>{{ $data -> email}}</p>
    <p>{{ $data -> message}}</p>
    <p><small>{{ $data -> created_at }}</small></p>
    <a href="{{ route('contact-update', $data) }}"><button class="btn btn-primary">Update</button></a>
    <a href="{{ route('contact-delete', $data) }}"><button class="btn btn-danger">Delete</button></a>
  </div>
@endsection
