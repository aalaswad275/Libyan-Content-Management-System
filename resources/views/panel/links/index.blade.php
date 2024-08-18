@extends('layouts.test')

@section('content')
@foreach($link as $l)
<h1>{{$l->id}}</h1>
@endforeach
@endsection