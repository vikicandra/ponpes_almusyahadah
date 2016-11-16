<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Table CSS -->
     <link href="{{asset('css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css">

     <!-- Jquery UI CSS -->
     <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

     <!-- jQuery UI -->
    <script src="{{asset('js/jquery-ui.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('js/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/sb-admin-2.js')}}"></script>

    <!-- Table -->
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dataTables.responsive.js')}}"></script>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Al-Musyahadah</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">              
                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        @if(Auth::user())
                            <b>{{Auth::user()->name}}</b>
                        @endif
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>                        
                        <a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{url('/admin')}}"><i class="fa fa-edit fa-fw"></i>Santri</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/suratizin')}}"><i class="fa fa-edit fa-fw"></i>Surat Izin</a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')
        

    </div>
    <!-- /#wrapper -->

    
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

     <!-- Ckeditor -->
    <script src="{{asset('js/ckeditor.js')}}"></script> 
    <script src="{{asset('js/plugins/uploadimage/plugin.js')}}"></script> 
    <script src="{{asset('js/plugins/widget/plugin.js')}}"></script> 

        <script>
            CKEDITOR.config.extraPlugins = 'uploadimage';
            CKEDITOR.config.imageUploadUrl = '/uploader/upload.php?type=Images';
            CKEDITOR.config.extraPlugins = 'uploadwidget';
            CKEDITOR.config.extraPlugins = 'notification';
            CKEDITOR.config.extraPlugins = 'notificationaggregator';
            CKEDITOR.config.extraPlugins = 'lineutils';
            CKEDITOR.config.extraPlugins = 'widget';
            CKEDITOR.replace('editor1');
        </script>
    
        <script>
            $(document).ready(function(){
                $("#reply").click(function(){
                    $("#replyForm").css("display","block");
                });
            });
        </script>

</body>

</html>
