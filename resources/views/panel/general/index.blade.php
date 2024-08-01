@extends('layouts.test')

@section('content')
<div class="col-md-6 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <h5 class="card-title">Simple Table</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($general as $g)
                            <tr>
                            <td>{{$g->id}}</td>
                            <td>{{$g->created_at}}</td>
                            <td>{{$g->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
@foreach($general as $g)
<h1>{{$g->id}}</h1>
@endforeach
@endsection