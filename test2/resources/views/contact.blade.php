@extends('layouts.app')

@section('title-block')Contact @endsection

@section('content')
  <h1>Contact</h1>

  <form action="{{ route('contact-form') }}" method="post">
    @csrf

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" placeholder="John" id="name" class="form-control">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" name="email" placeholder="John@mail.ru" id="email" class="form-control">
    </div>

    <div class="form-group">
      <label for="message">Message:</label>
      <textarea name="message"id="message" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Send</button>
  </form>
@endsection
