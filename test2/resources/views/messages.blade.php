@extends('layouts.app')

@section('title-block')All data @endsection

@section('content')
  <h1>All data</h1>
  @foreach($data as $el)
  <div class="alert alert-info">
    <h3>{{ $el -> name}}</h3>
    <p>{{ $el -> email}}</p>
    <p><small>{{ $el -> created_at }}</small></p>
    <a href="{{ route('contact-data-one', $el->id) }}"><button class="btn btn-warning">Detail</button></a>
  </div>
  @endforeach
@endsection
