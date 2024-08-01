@extends('layouts.test')

@section('content')
@foreach($blog as $b)
<h1>{{$b->id}}</h1>
@endforeach
@endsection