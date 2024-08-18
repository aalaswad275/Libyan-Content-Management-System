@extends('layouts.test')
@section('contnet')

<form class="needs-validation" action="{{route(blog.store)}}" method="post">
@csrf
    <div class="form-row">
      <div class="col-md-8 mb-3">
        <label for="BlogTitle">{{__('Blog Title')}}</label>
        <input type="text" class="form-control" id="BlogTitle"  required>
        <div class="invalid-feedback"> {{__('Please Enter A valid title')}} </div>

      </div>
      <div class="col-md-4 mb-3">
        <label for="Descripation">{{__('Mini Descripation')}}</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend"></span>
          </div>
          <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback"> Please choose a username. </div>
        </div>
      </div>

    </div>



    <button class="btn btn-primary" type="submit">Submit form</button>


</form>
@endsection
