@extends('layouts.test')

@section('content')

<div class="w-100 bg-primary text-white d-flex flex-row justify-content-between" style="padding-block:18px; padding-left:15px;">
    <h1 style="margin: 0">Blogs</h1>

    <button style="margin-right: 15px; background-color: rgb(38, 50, 56); border-radius: 10px; padding: 5px 10px;">
        <a href="/blogs/create" style="text-decoration: none; color: white;">Create New Blog</a>
    </button>
</div>


@foreach($blog as $b)
    <div style="margin: 20px; border: 1px solid #3B71CA; border-radius: 10px; padding: 10px; height: 100%" class="border border-primary rounded-10">
        <p style="font-size: 1.4rem; margin: 0;">
            <a href="/blogs/{{$b->id}}"><strong>{{$b->title}}</strong> by {{App\Models\User::find($b->user_id)->name}}</a>
        </p>
    </div>
@endforeach


@endsection