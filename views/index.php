<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>::Order Management::</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="/assets/admin-lte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/assets/admin-lte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="/assets/admin-lte/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables CSS -->
    <link href="/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="/assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/admin" class="logo"><b>Order</b>Management</a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="/assets/admin-lte/dist/img/avatar.png" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">User Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/assets/admin-lte/dist/img/avatar.png" class="img-circle" alt="User Image" />
                                <p>
                                   User Admin
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">Menu</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/dashboard"><span>Home</span></a></li>
                <li><a href="/"><span>Orders</span></a></li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Orders</li>
                </ol>
            </section>

            <!-- Main content -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                    <div class="box">
                        <br>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="col-md-6">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Add New Order</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="user" class="col-sm-2 control-label">User</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="user" id="user" required>
                                                        <option value="">--select user--</option>
                                                        {% for user in users %}
                                                            <option value="{{ user.id }}">{{ user.name }}</option>
                                                        {% endfor %}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="product" class="col-sm-2 control-label">Product</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="product" id="product" required>
                                                        <option value="">--select product--</option>
                                                        {% for product in products %}
                                                            <option value="{{ product.id }}">{{ product.name }}</option>
                                                        {% endfor %}
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer col-md-offset-2">
                                            <button type="submit" class="btn btn-info pull-left">Submit</button>
                                        </div>
                                        <!-- /.box-footer -->
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <form role="form">
                            <!-- select -->
                            <div class="form-group">
                                <label>Get orders from:</label>
                                <select class="form-control">
                                    <option>Today</option>
                                    <option>Last week</option>
                                    <option>All Time</option>
                                </select>
                            </div>
                        </form>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="example">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        {% for order in orders %}
                                        <tr class="odd gradeX">
                                            <td>{{ order.user }}</td>
                                            <td>{{ order.product }}</td>
                                            <td>{{ order.date }}</td>
                                            <td>{{ order.price }}</td>
                                            <td>
                                                <a href="/order/{{ order.id }}/delete/"><i class="fa fa-fw fa-remove" style="color:red"></i></a>
                                                <a href="/orders/{{ order.id }}/edit"><i class="fa fa-fw fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        {% endfor %}
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->
    </section><!-- /.content -->

    <!-- Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright © {{ date_year }}. <a href="#">Order Company</a>.</strong> All rights reserved.
    </footer>

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>-->

<!-- jQuery 2.1.3 -->
<script src="/assets/admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="/assets/admin-lte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="/assets/admin-lte/dist/js/app.min.js" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>