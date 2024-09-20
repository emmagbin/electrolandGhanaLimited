<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Electroland | RBES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="<?php echo base_url()?>public/auth/assets/img/icon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>public/auth/assets/img/icon.ico">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>public/auth/assets/img/icon.ico">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>public/auth/assets/img/icon.ico">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>public/auth/assets/img/icon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?php echo base_url()?>public/auth/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>public/auth/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>public/auth/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>public/auth/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url()?>public/auth/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url()?>public/auth/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?php echo base_url()?>public/auth/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?php echo base_url()?>public/auth/pages/css/pages.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
        <link href="<?php echo base_url()?>public/auth/pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/auth/pages/css/windows.chrome.fix.css" />'
    }
    </script>



  </head>
  <body class="fixed-header" >

    <!-- START PAGE-CONTAINER -->
    <div class="login-wrapper " >
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic"  >
        <!-- START Background Pic-->
        <img id="img" src="<?php echo base_url()?>public/auth/assets/img/main.jpg" data-src="<?php echo base_url()?>public/auth/assets/img/main.jpg" data-src-retina="<?php echo base_url()?>public/auth/assets/img/main.jpg" >
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20" style = "color: black">
          <h3 class="semi-bold" style="color: white;">
              </h3>
          <p class="small" style="color: white;">
             © 2024 | Electroland Ghana Limited.
          </p>
        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->

  <div class="login-container bg-white"  style="border-left:10px solid #000">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <img src="<?php echo base_url()?>public/auth/assets/img/logoElect.jpeg" alt="logo" data-src="<?php echo base_url()?>public/auth/assets/img/logoElect.jpeg" data-src-retina="<?php echo base_url()?>public/auth/assets/img/logoElect.jpeg" width="80" height=60">
            <br> <br>
            <h4><b>Welcome To EGL Raffle Back-End System<b></h4>
          <p class="small" style="color: black;">

               Login With Your Account Credentials.
         <hr>
      </p>
      
  <form id="form-login" class="p-t-15" role="form" action="VerifyLogin"  method="post">
            <!-- START Form Control-->
          
             
          
             <div class="form-group form-group-default" >
              <label>Your Email</label> <br>
              <div class="controls">
                <input type="text" name="username" placeholder="ama@egl.com.gh" class="form-control" required>
              </div>
            </div>
            
       
                          
           
           <div class="form-group form-group-default" >
              <label>Your Password</label>
              <br>
              <div class="controls">
                <input type="password" name="token"  class="form-control" required>
              </div>
            </div>
            <!-- END Form Control-->
            <br>
         
 
   
         <button class="btn btn-primary btn-block btn-icon-left btn-cons m-t-10" type="submit" style="background-color: #000; border-color: #000"><img src ="<?php echo base_url()?>public/auth/assets/img/login.png" height = 20 width = 20> LOGIN</button>
      


  
          </form>

          <!-- <a href="Dashboard">Dashboard</a> -->
  
          <!--END Login Form-->
          <div class="pull-bottom sm-pull-bottom">
            <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">

              <div class="col-sm-12 no-padding m-t-10">

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- BEGIN VENDOR JS -->
    <script src="<?php echo base_url()?>public/auth/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/auth/assets/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/auth/assets/plugins/classie/classie.js"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>public/auth/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?php echo base_url()?>public/auth/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?php echo base_url()?>public/auth/assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script>
    $(function()
    {
      $('#form-login').validate()
    })
    </script>
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- jQuery (necessary for Toastr) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    var notification="<?php echo session()->getFlashdata('message'); ?>";
    if (notification.length >0) {
         switch("<?php echo session()->getFlashdata('alert-type'); ?>") {
        case 'success':
            toastr.success('<?php echo session()->getFlashdata('message'); ?>');
            break;
        case 'error':
            toastr.error('<?php echo session()->getFlashdata('message'); ?>');
            break;
        case 'warning':
            toastr.warning('<?php echo session()->getFlashdata('message'); ?>');
            break;
        case 'info':
            toastr.info('<?php echo session()->getFlashdata('message'); ?>');
            break;
        default:
            toastr.error('<?php echo session()->getFlashdata('message'); ?>');
            break;
          }
    }
   toastr.options = {
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "timeOut": "5000", // 5 seconds
        "extendedTimeOut": "1000", // 1 second
        "showDuration": "300", // 0.3 seconds
        "hideDuration": "1000" // 1 second
    };
</script>
  </body>
</html>