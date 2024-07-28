<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
            <meta name="author" content="Lukasz Holeczek">
            <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
            <link rel="shortcut icon" href="img/logo2.png">
            <title>لوحة التحكم</title>

            <link href="{{asset('backend/css/font-awesome.min.css')}}" rel="stylesheet">
            <link href="{{asset('backend/css/simple-line-icons.css')}}" rel="stylesheet">


            <!-- Main styles for this application -->
            <link href="{{asset('backend/dest/style.css')}}" rel="stylesheet">


    </head>
    <body class="navbar-fixed sidebar-nav fixed-nav">
        <header class="navbar">
            <div class="container-fluid">

                <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>

                <a class="navbar-brand" href="index.php"></a>

                <ul class="nav navbar-nav hidden-md-down">

                    <li class="nav-item">
                        <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>

                    </li>

                    <li class="nav-item p-x-1">
                         <p class="font-weight-bold">المركز الليبي للمنظومات الالكترونية و البرمجيات و بحوث الطيران</p>
                    </li>
                    <!--
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item p-x-1">
                        <a class="nav-link" href="#">Settings</a>
                    </li>-->
                </ul>

                <ul class="nav navbar-nav pull-left hidden-md-down">

                    <li class="nav-item">
                        <a class="nav-link aside-toggle" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-list"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="img/users/" class="img-avatar" alt="admin@bootstrapmaster.com">
                            <span class="hidden-md-down"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header text-xs-center">
                                <strong>إعدادات</strong>
                            </div>
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i>الملف الشخصي</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> الاعدادات</a>
                            <!--<a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>-->
                            <div class="divider"></div>
                            <a class="dropdown-item" href="php/logout.php"><i class="fa fa-lock"></i> خروج</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
                    </li>

                </ul>

            </div>
        </header>
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="icon-equalizer"></i> {{__('dashboard')}}</span></a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> {{__('Staff Members')}}</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="/commitee"><i class="fa fa-university"></i>{{__('Staff Members')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/staff"><i class="icon-graduation"></i>أعضاء هيئة التدريس</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/departments"><i class="icon-layers"></i> التخصصات العلمية</a></li>
                    <li class="nav-item"><a class="nav-link" href="/projects"><i class="icon-grid"></i> المشاريع</a></li>
                    <li class="nav-item"><a class="nav-link" href="/training"><i class="fa fa-laptop"></i> التدريب</a></li>
                    <li class="nav-item"><a class="nav-link" href="/users"><i class="fa fa-gears"></i>المستخدمين</a></li>

                    <!-- <li class="nav-title">
                       گزارش گیری
                    </li>
                     <li class="nav-item"><a class="nav-link" href="#"><i class="icon-people"></i> کاربران</a>
                        <a class="nav-link" href="#"><i class="icon-docs"></i>  فایل ها</a>
                    </li> -->


                </ul>
            </nav>
        </div>


       @yield('content')
    <!-- Main content -->
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-x-auto pull-xs-none vamiddle">
                    <div class="card-group ">
                        <div class="card">
                            <div class="card-header">
                            <h3>اللجنة العلمية</h3>
                                <p class="text-muted">إضافة عضوء جديد</p>
                            </div>
                            <div class="card-block">
                                <form action="php/process-commitee.php" method="post" enctype="multipart/form-data" class="form-horizontal ">

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label" for="text-input">الاسم</label>
                                        <div class="col-md-10">
                                            <input type="text" id="name" name="name" class="form-control"  required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label" for="text-input">الدجة العلمية</label>
                                        <div class="col-md-10">
                                            <input type="text" id="degree" name="degree" class="form-control"   required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label" for="select">التخصص العام</label>
                                        <div class="col-md-8">
                                            <select id="specialty" name="specialty" class="form-control" size="1">
                                                <option value="0"></option>
                                                {{-- <?php
                                                while($row = mysqli_fetch_array($result, MYSQLI_BOTH) )
                                                {
                                                ?>
                                                <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                                                <?php }?> --}}
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <a href='javascript:addSpecialty()' class="btn btn-success">...</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label" for="text-input">التخصص الدقيق</label>
                                        <div class="col-md-10">
                                            <input type="text" id="field" name="field" class="form-control"  required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label" for="select">الصفة</label>
                                        <div class="col-md-10">
                                            <select id="supervisor" name="role" class="form-control" size="1">
                                               <option value=""></option>
                                                <option value="رئيس اللجنة">رئيس اللجنة</option>
                                                <option value="عضو">عضو</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 form-control-label" for="text-input">البريد الالكتروني</label>
                                        <div class="col-md-10">
                                            <input type="text" id="email" name="email" class="form-control"  required>
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
                                    <button type="submit" name="save" class="btn btn-sm btn-primary p-x-2"><i class="fa fa-dot-circle-o"></i> حفظ</button>
                                    <!-- <button type="reset" class="btn btn-sm btn-danger p-x-2"><i class="fa fa-ban"></i> تراجع</button> -->
                                </div>
                                </form>
                        </div>

                        <div class="card card-inverse card-secondary p-y-3" style="width:25%">
                            <div class="card-block text-xs-center">
                                <div>
                                      <!-- Uploaded image area-->
                                    <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid img-circle" width="304" height="236"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
 <!-- Bootstrap and necessary plugins -->
 <script src="{{asset('backend/js/libs/jquery.min.js')}}"></script>
 <script src="{{asset('backend/js/libs/tether.min.js')}}"></script>
 <script src="{{asset('backend/js/libs/bootstrap.min.js')}}"></script>
 <script src="{{asset('backend/js/libs/pace.min.js')}}"></script>

 <!-- Plugins and scripts required by all views -->
 <script src="{{asset('backend/js/libs/Chart.min.js')}}"></script>

 <!-- CoreUI main scripts -->

 <script src="{{asset('backend/js/app.js')}}"></script>

 <!-- Plugins and scripts required by this views -->
 <!-- Custom scripts required by this view -->
 <script src="{{asset('backend/js/views/main.js')}}"></script>

  <!-- bootbox code -->
  <script src="{{asset('backend/js/libs/bootbox.min.js')}}"></script>
 <script src="{{asset('backend/js/libs/bootbox.locales.min.js')}}"></script>


 <script>

     /*  ==========================================
         SHOW UPLOADED IMAGE
     * ========================================== */
     function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#imageResult')
                     .attr('src', e.target.result);
             };
             reader.readAsDataURL(input.files[0]);
         }
     }

     $(function () {
         $('#image').on('change', function () {
             readURL(input);
         });
     });

     /*  ==========================================
         SHOW UPLOADED IMAGE NAME
     * ========================================== */
     var input = document.getElementById( 'image' );
     var infoArea = document.getElementById( 'upload-label' );

     input.addEventListener( 'change', showFileName );
     function showFileName( event ) {
     var input = event.srcElement;
     var fileName = input.files[0].name;
     infoArea.textContent = 'File name: ' + fileName;
     }
 </script>

 <script language="JavaScript" type="text/javascript">
     function addSpecialty()
     {
         bootbox.prompt({
             title: "إضافة تخصص",
             buttons: {
                     confirm: {
                         label: 'إضافة',
                         className: 'btn-primary'
                     },
                     cancel: {
                         label: 'إلغاء',

                     }
             },

             callback: function(result){
                 /* result = String containing user input if OK clicked or null if Cancel clicked */
                 if(result)
                 {
                     window.location.href = 'php/add-specialties.php?title='+result+'&action=add-commitee';
                 }
             }
         });
     }
 </script>

    </body>
</html>
