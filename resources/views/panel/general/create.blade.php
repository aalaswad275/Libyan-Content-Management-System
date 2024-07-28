@include('welcome')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 m-x-auto pull-xs-none vamiddle">
            <div class="card-group ">
                <div class="card">
                    <div class="card-header">
                    <h3>اللجنة العلمية</h3>
                        <p class="text-muted">بيانات عضوء اللجنة العلمية</p>
                    </div>
                    <div class="card-block">
                        <form action="php/process-commitee.php" method="post" enctype="multipart/form-data" class="form-horizontal ">
                            
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="text-input">الاسم</label>
                                <div class="col-md-10">
                                    <input type="text" id="name" name="name" class="form-control" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="text-input">الدجة العلمية</label>
                                <div class="col-md-10">
                                    <input type="text" id="degree" name="degree" class="form-control" value=""  required>
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="select">التخصص العام</label>
                                <div class="col-md-8">
                                    <select id="specialty" name="specialty" class="form-control" size="1">
                                        <option value="0"></option>
                                       
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <a href='javascript:addSpecialty("")' class="btn btn-success">...</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="text-input">التخصص الدقيق</label>
                                <div class="col-md-10">
                                    <input type="text" id="field" name="field" class="form-control" value="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="select">الصفة</label>
                                <div class="col-md-10">
                                    <select id="supervisor" name="role" class="form-control" size="1">
                                       <option value=""></option>
                                 </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="text-input">البريد الالكتروني</label>
                                <div class="col-md-10">
                                    <input type="text" id="email" name="email" class="form-control" value="" required>
                                </div>
                            </div>

                            <!-- Upload image input-->                               
                            <div class="form-group row">
                                <label class="col-md-2 form-control-label" for="file-input">الصورة</label>
                                <div class="col-md-10">
                                <input type="file"  name="image"  onchange="readURL(this);" class="form-control border-0">
                                </div>
                            </div>
                                                              
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="edit" class="btn btn-sm btn-primary p-x-2">تعديل</button>
                            <!-- <button type="reset" class="btn btn-sm btn-danger p-x-2"><i class="fa fa-ban"></i> تراجع</button> -->
                        </div>
                        <input type="hidden" name="id" value="">
                        </form>
                </div>
                
                <div class="card card-inverse card-secondary p-y-3" style="width:25%">
                    <div class="card-block text-xs-center">
                        <div>
                              <!-- Uploaded image area-->
                            <div class="image-area mt-4"><img id="imageResult" src="img/commitee/" alt="" class="img-fluid img-circle" width="304" height="236"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>        
</div>
   
@endsection