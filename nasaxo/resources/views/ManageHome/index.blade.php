<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{!! url('/images/ico-title.png') !!}">
    <title>@section('title') Nasaxo Shop @show</title>
    @section('link')
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{!! url('/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! url('/css/font-awesome.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! url('/css/ManageHome/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! url('/css/ManageHome/_all-skins.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('/css/ManageHome/index.css') !!}">
    <!-- css jqueri ui -->
    <link rel="stylesheet" type="text/css" href="{!! url('/css/jquery-ui.min.css') !!}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @show
    <script type="text/javascript">
    var url = "{!! url('') !!}";
    </script>
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <?php 
  $user = isset($UserView) ? $UserView : json_decode(Cookie::get('accountHome'),true);
  $countMess= 0;
  $listMess =[];
  if(isset($userLogin)){
    $countMess= ($userLogin->Messages()->where([['IsDelete','=',false],['IsNotify','=',true]])->count());
    $listMess= ($userLogin->Messages()->where([['IsDelete','=',false],['IsNotify','=',true]])->get());
  }
  ?>
    <div class="wrapper">
        <header class="main-header" style="">
            <!-- Logo -->
            <a class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>NSX</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Nasaxo Shop</span>
            </a>
            <!-- Right header user -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning"><span class="countNotify"><?php echo $countMess; ?>
                                    </span></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <span class="countNotify"><?php echo $countMess; ?></span>
                                    notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php foreach ($listMess as $value) { ?>
                                        <li title="<?php echo $value->Description; ?>">
                                            <a>
                                                <i class="fa fa-user text-red"></i>
                                                <?php echo substr($value->Description,0,40); ?>...
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="footer getView" id="messViewAll" data-view="profile"><a>View all</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{!! url('/images') !!}/<?php echo  isset($user['image'])? $user['image'] : ""; ?>"
                                    class="user-image" alt="User Image">
                                <span visible
                                    class="hidden-xs"><?php echo  isset($user['username'])? $user['username'] : "Nasaxo"; ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{!! url('/images') !!}/<?php echo  isset($user['image'])? $user['image'] : ""; ?>"
                                        class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo  isset($user['description'])? $user['description'] : ""; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat getView" data-view="profile"
                                            id='btnProfile'>Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" id='btnLogout'>Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">DANH M???C QU???N L??</li>
                    <!-- ?????a ch??? -->
                    <li class="treeview">
                        <a>
                            <i class="fa fa-files-o"></i>
                            <span>?????a ch???</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="getView" data-view="address/city"><a><i class="fa fa-circle-o"></i>Th??nh ph???</a>
                            </li>
                            <li class="getView" data-view="address/district"><a><i class="fa fa-circle-o"></i>Qu???n
                                    huy???n</a></li>
                            <li class="getView" data-view="address/ward"><a><i class="fa fa-circle-o"></i>Ph?????ng x??</a>
                            </li>
                        </ul>
                    </li>
                    <!-- ./ ?????a ch??? -->
                    <!-- khuy???n m??i -->
                    <li class="treeview getView" data-view="promotion">
                        <a>
                            <i class="fa fa-bomb"></i>
                            <span>Khuy???n m??i</span>
                        </a>
                    </li>
                    <!-- end khuy???n m??i -->
                    <!-- M??u s???c -->
                    <li class="treeview getView" data-view="color">
                        <a>
                            <i class="fa fa-dashboard"></i> <span>M??u s???c</span>
                        </a>
                    </li>
                    <!-- end m??u s???c -->
                    <!-- size -->
                    <li class="getView" data-view="size">
                        <a>
                            <i class="fa fa-th"></i> <span>K??ch c???</span>
                        </a>
                    </li>
                    <!-- end size -->
                    <!-- th???ng k?? -->
                    <li class="treeview">
                        <a>
                            <i class="fa fa-pie-chart"></i>
                            <span>Th???ng k??</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="getView" data-view="statictis/revenue"><a><i class="fa fa-circle-o"></i>Doanh
                                    thu</a></li>
                            <li class="getView" data-view="statictis/nonrevenue"><a><i class="fa fa-circle-o"></i>Kh??ng
                                    ph???i doanh thu</a></li>
                            <li class="getView" data-view="statictis/bestsell"><a><i class="fa fa-circle-o"></i>S???n
                                    ph???m</a></li>
                            <li class="getView" data-view="statictis/customer"><a><i class="fa fa-circle-o"></i>Kh??ch
                                    h??ng mua nhi???u</a></li>
                        </ul>
                    </li>
                    <!-- end th???ng k?? -->
                    <!-- Kh??ch h??ng -->
                    <li class="treeview getView" data-view="customer">
                        <a>
                            <i class="fa fa-users"></i>
                            <span>Kh??ch h??ng</span>
                        </a>
                    </li>
                    <!-- end kh??ch h??ng -->
                    <!-- H??a ????n -->
                    <li class="treeview">
                        <a>
                            <i class="fa fa-calendar"></i>
                            <span>????n ?????t h??ng</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="getView" data-view="order/new"><a><i class="fa fa-circle-o"></i>????n ?????t h??ng ch??a
                                    x??c nh???n</a></li>
                            <li class="getView" data-view="order/confirm"><a><i class="fa fa-circle-o"></i>????n ?????t h??ng
                                    ???? x??c nh???n</a></li>
                        </ul>
                    </li>
                    <!-- end h??a ????n -->
                    <!-- nh??m s???n ph???m -->
                    <li class="treeview getView" data-view="productcategory">
                        <a>
                            <i class="fa fa-bookmark"></i>
                            <span>Nh??m s???n ph???m</span>
                        </a>
                    </li>
                    <!-- end nh??m s???n ph???m -->
                    <!-- s???n ph???m -->
                    <li class="treeview getView" data-view="product">
                        <a>
                            <i class="fa fa-rocket"></i>
                            <span>S???n ph???m</span>
                        </a>
                    </li>
                    <!-- end s???n ph???m -->
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div id="contentBody" class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    @section('script')
    <!-- jQuery 3 -->
    <script src="{!! url('/js/jquery.min.js') !!}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- jqueri ui -->
    <script type="text/javascript" src="{!! url('/js/jquery-ui.min.js') !!}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{!! url('/js/bootstrap.min.js') !!}"></script>
    <!-- AdminLTE App -->
    <script src="{!! url('/js/ManageHome/adminlte.min.js') !!}"></script>
    <!-- get url -->
    <script type="text/javascript">
    var url = '{!! url('
    ') !!}';
    </script>
    <!-- index js -->
    <script type="text/javascript" src="{!! url('/js/ManageHome/index.js') !!}"></script>

    @show
</body>

</html>