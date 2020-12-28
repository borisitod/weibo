@extends('layouts.default')

@section('content')
  <div class="jumbotron">
    <h1>Hello Laravel</h1>
    <p class="lead">
      You are viewing the homepage of <a href="https://learnku.com/courses/laravel-essential-training">Laravel Basic</a>.
    </p>
    <p>
      Everything starts from here.
    </p>
    <p>
      <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Register now</a>
    </p>
  </div>
@stop
