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
                        <img src="img/users/<?php echo $_SESSION['pic'];?>" class="img-avatar" alt="admin@bootstrapmaster.com">
                        <span class="hidden-md-down"><?php echo $_SESSION['role']; ?></span>
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