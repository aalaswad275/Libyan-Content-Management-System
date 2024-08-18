@extends('layouts.test');

@section('content')
    @if ($blog)
        @php
            $user = App\Models\User::find($blog->user_id);
        @endphp

        <p><strong>Author</strong>: {{$user->name}}</p>
        <p><strong>Title</strong>: {{$blog->title}}</p>
        <p><strong>Body</strong>: {{$blog->body}}</p>
    @else
        {{abort(404);}}
    @endif

    <button>
        <a href="/blogs/{{$blog->id}}/edit">Edit Blog</a>
    </button>
@endsection
