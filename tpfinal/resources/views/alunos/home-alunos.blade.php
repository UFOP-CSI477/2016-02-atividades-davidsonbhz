
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
<!-- Morris chart -->
<link rel="stylesheet" href="plugins/morris/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Date Picker -->
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


@extends('layouts.dashboard')
@section('content')

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">

          <li class="pull-left header"><i class="fa fa-inbox"></i>Grade de Horários</li>
        </ul>
        <div class="tab-content no-padding">
          <!-- Morris chart - Sales -->
          <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
          <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
          
        </div>

      </div>
      <!-- /.nav-tabs-custom -->

      <!-- Chat box -->
      <div class="box box-success">
        <div class="box-header">
          <i class="fa fa-comments-o"></i>

          <h3 class="box-title">Quadro de avisos</h3>

          <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
            <div class="btn-group" data-toggle="btn-toggle">
              <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
              </button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
            </div>
          </div>
        </div>
        <div class="box-body chat" id="chat-box">
          <!-- chat item -->
          <div class="item">
            <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                Mike Doe
              </a>
              I would like to meet you to discuss the latest news about
              the arrival of the new theme. They say it is going to be one the
              best themes on the market
            </p>
            <div class="attachment">
              <h4>Attachments:</h4>

              <p class="filename">
                Theme-thumbnail-image.jpg
              </p>

              <div class="pull-right">
                <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
              </div>
            </div>
            <!-- /.attachment -->
          </div>
          <!-- /.item -->
          <!-- chat item -->
          <div class="item">
            <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                Alexander Pierce
              </a>
              I would like to meet you to discuss the latest news about
              the arrival of the new theme. They say it is going to be one the
              best themes on the market
            </p>
          </div>
          <!-- /.item -->
          <!-- chat item -->
          <div class="item">
            <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

            <p class="message">
              <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                Susan Doe
              </a>
              I would like to meet you to discuss the latest news about
              the arrival of the new theme. They say it is going to be one the
              best themes on the market
            </p>
          </div>
          <!-- /.item -->
        </div>
        <!-- /.chat -->
        <div class="box-footer">
          <div class="input-group">
            <input class="form-control" placeholder="Type message...">

            <div class="input-group-btn">
              <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box (chat box) -->



    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

      <!-- Calendar -->
      <div class="box box-solid bg-green-gradient">
        <div class="box-header">
          <i class="fa fa-calendar"></i>

          <h3 class="box-title">Calendar</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <!-- button with a dropdown -->
            <div class="btn-group">
              <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bars"></i></button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li><a href="#">Add new event</a></li>
                <li><a href="#">Clear events</a></li>
                <li class="divider"></li>
                <li><a href="#">View calendar</a></li>
              </ul>
            </div>
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <!--The calendar -->
          <div id="calendar" style="width: 100%"></div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-black">
          <div class="row">
            <div class="col-sm-6">
              <!-- Progress bars -->
              <div class="clearfix">
                <span class="pull-left">Task #1</span>
                <small class="pull-right">90%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
              </div>

              <div class="clearfix">
                <span class="pull-left">Task #2</span>
                <small class="pull-right">70%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <div class="clearfix">
                <span class="pull-left">Task #3</span>
                <small class="pull-right">60%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
              </div>

              <div class="clearfix">
                <span class="pull-left">Task #4</span>
                <small class="pull-right">40%</small>
              </div>
              <div class="progress xs">
                <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>


      <!-- quick email widget -->
      <div class="box box-info">
        <div class="box-header">
          <i class="fa fa-envelope"></i>

          <h3 class="box-title">Enviar email</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <div class="box-body">
          <form action="#" method="post">
            <div class="form-group">
              <input type="email" class="form-control" name="emailto" placeholder="Email to:">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" placeholder="Subject">
            </div>
            <div>
              <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
          </form>
        </div>
        <div class="box-footer clearfix">
          <button type="button" class="pull-right btn btn-default" id="sendEmail">Enviar
            <i class="fa fa-arrow-circle-right"></i></button>
        </div>
      </div>

      <!-- Comprovante de Matrícula -->
      <div class="box box-solid bg-red-gradient">
        <div class="box-header">
          <i class="fa fa-list"></i>

          <h3 class="box-title">Comprovante de Matrícula</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          <!-- /. tools -->
        </div>
        <div class="small-box bg-red">
            <a href="#" class="small-box-footer">Download <i class="fa fa-document"></i></a>
          </div>
        <div class="box-footer clearfix">
        </div>
      </div>


    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->

</section>
<!-- /.content -->



<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


@endsection
