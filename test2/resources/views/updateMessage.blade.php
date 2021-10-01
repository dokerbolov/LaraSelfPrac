@extends('layouts.app')

@section('title-block')Contact @endsection

@section('content')
  <h1>Update Message</h1>

  <form action="{{ route('contact-update-submit', $data->id) }}" method="post">
    @csrf

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" value="{{$data->name}}" id="name" class="form-control">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" name="email" value="{{$data->email}}" id="email" class="form-control">
    </div>

    <div class="form-group">
      <label for="message">Message:</label>
      <textarea name="message"id="message" class="form-control">{{$data->message}}</textarea>
    </div>

    <button type="updateMessageSubmit" class="btn btn-success">Update</button>
  </form>
@endsection
