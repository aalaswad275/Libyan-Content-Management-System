@extends('layouts.test')


@section('content')
    <form method="post" action="/blogs/{{$blog->id}}">
        @csrf
        @method('patch')

        <div class="form-group row">
        <label for="title" class="col-sm-3 col-form-label">{{__("Title")}}</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="title" id="title" value="{{$blog->title}}">
        </div>
        </div>
        
        <div class="form-group row">
        <label class="col-sm-3" for="body">Body</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="2">{{$blog->body}}</textarea>
        </div>
        </div>
        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color: red; font-style: italic;">{{$error}}</p>
        @endforeach
    @endif
    <button form="delete-form" type="submit">
        <a style="color: red;">Delete Blog</a>
    </button>
    <form action="/blogs/{{$blog->id}}" method="post" id="delete-form" class="hidden">
        @csrf
        @method('delete')
    </form>

@endsection
