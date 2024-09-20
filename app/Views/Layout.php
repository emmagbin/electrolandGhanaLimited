<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Electroland - BackOffice</title>
    <meta name="viewport" content="">
    <meta name="description" content="">
    <meta property="og:url" content="">
    <meta property="og:type" content="">
    <span class="bar-line bar-line-1 out"></span>
    <span class="bar-line bar-line-2 out"></span>
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <link rel="apple-touch-icon" sizes="180x180" href="">
    <link rel="icon" type="image/png" href="" sizes="32x32">
    <link rel="icon" type="image/png" href="" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#27ae60">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    
    <link rel="stylesheet" href="<?php echo base_url()?>public/assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/assets/css/application.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/assets/css/demo.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>public/assets/css/vendor.min.css">

        <?php 
        $uri = service('uri');
        $segment = $uri->getSegment(1);
         if($segment==="Upload"){?>

        <?php }else{?>
<link rel="stylesheet" href="<?php echo base_url()?>public/assets/css/vendor.min.css">
        <?php } ?>


   
    <!-- 
     <style>
        .form-inline {
            display: flex;
            align-items: center;
            gap: 10px; /* Space between the file input and button */
        }
        .form-inline .form-control {
            flex: 1; /* Allows the file input to take up available space */
        }
    </style>  -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- DataTables CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css"> -->

<style>
        /* Sidebar styles */
        .sidenav {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidenav-heading {
            font-weight: bold;
            padding: 10px;
            color: #000;
        }

        .sidenav-item a {
            display: flex;
            align-items: center;
            padding: 10px;
            text-decoration: none;
            color: #000;
            font-size: 11px;
        }

        .sidenav-item a.active {
            background-color: #7fb4de; /* Background color for active menu item */
            color: #fff; /* Text color for active menu item */
        }

        .sidenav-item a.active .sidenav-icon {
            color: #fff; /* Icon color for active menu item */
        }

        .sidenav-item a:hover {
            background-color: #f0f0f0; /* Optional: hover effect */
        }

        .sidenav-item form {
            display: inline;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

</head>
  <body class="layout layout-header-fixed" style ="background: #fff">
    <div class="layout-header">
      <div class="navbar navbar-default" style = "background-color: #fff; border-bottom: solid 5px #000">
        <div class="navbar-header" style = "background-color: #fff">
          <a class="navbar-brand navbar-brand-center" href="#">
            <img class="navbar-brand-logo" src="<?php echo base_url()?>public/assets/img/logoElect.jpeg" alt=""  style = "margin-top: -8px;">
          </a>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars" >
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
          </button>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow-up"></span>
            <span class="ellipsis ellipsis-vertical">
              <img class="ellipsis-object" width="32" height="32" src="#" alt="Teddy Wilson">
            </span>
          </button>
        </div>
        <div class="navbar-toggleable">
          <nav id="navbar" class="navbar-collapse collapse">
            <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span></span>

            </button>
            <ul class="nav navbar-nav navbar-right">
              <li class="visible-xs-block">

              </li>


             


              <li class="visible-xs-block">
                <a href="login-1.html">
                  <span class="icon icon-power-off icon-lg icon-fw"></span>
                  Sign out
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="layout-main">
      <div class="layout-sidebar" >
        <div class="layout-sidebar-backdrop" style="background-color: #fff;"></div>
        <div class="layout-sidebar-body" style="background-color: #fff;">
          <div class="custom-scrollbar" >
            <nav id="sidenav" class="sidenav-collapse collapse" style="background-color: #fff; color: #000">
              <ul class="sidenav">
                  
                  
        <li class="sidenav-heading"><u><b>Insights & Statistics</b></u></li>
        <li class="sidenav-item">
            <a href="Dashboard" aria-haspopup="true">
                <span class="sidenav-icon icon icon-bar-chart" style="color: #fff"></span>
                <span class="sidenav-label">Usage Analytics</span>
            </a>
        </li>

<?php foreach($pageMenuCheck as $records): ?>



<!--`serialnumber`, `reports`, `draws`, `user_management`, `show_room_management`-->
<?php if($records->serialnumber==="1"){?>
        <li class="sidenav-heading"><u><b>Serial Number Management</b></u></li>
        <li class="sidenav-item">
            <a href="Upload" aria-haspopup="true">
                <span class="sidenav-icon icon icon-edit"></span>
                <span class="sidenav-label">Upload</span>
            </a>
        </li>
<?php } ?>
<?php if($records->reports==="1"){?>
        <li class="sidenav-heading"><u><b>Queries & Reports</b></u></li>
        <li class="sidenav-item">
            <a href="Enteries" aria-haspopup="true">
                <span class="sidenav-icon icon icon-money"></span>
                <span class="sidenav-label">Entries</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="verify" aria-haspopup="true">
                <span class="sidenav-icon icon icon-exchange"></span>
                <span class="sidenav-label">Verify Winner</span>
            </a>
        </li>
<?php } ?>
<?php if($records->draws==="1"){?>
        <li class="sidenav-heading"><u><b>Draws</b></u></li>
        <li class="sidenav-item">
            <a href="Draws" aria-haspopup="true">
                <span class="sidenav-icon icon icon-search"></span>
                <span class="sidenav-label">Details</span>
            </a>
        </li>
<?php } ?>
<?php if($records->user_management==="1"){?>
        <li class="sidenav-heading"><u><b>User Management</b></u></li>
        <li class="sidenav-item">
            <a href="Roles" aria-haspopup="true">
                <span class="sidenav-icon icon icon-group"></span>
                <span class="sidenav-label">Role & Access Management</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="#" aria-haspopup="true" data-toggle="modal" data-target="#createUser">
                <span class="sidenav-icon icon icon-user"></span>
                <span class="sidenav-label">Create New User</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="Users" aria-haspopup="true">
                <span class="sidenav-icon icon icon-edit"></span>
                <span class="sidenav-label">User Utilities</span>
            </a>
        </li>
        <?php } ?>
        
        
<?php if($records->show_room_management==="1"){?>


        <li class="sidenav-heading"><u><b> show Room Record</b></u></li>
        <li class="sidenav-item">
            <a href="showRoomEnterRecord" aria-haspopup="true">
                <span class="sidenav-icon icon icon-group"></span>
                <span class="sidenav-label">Enter Record</span>
            </a>
        </li>
         <?php } ?>
        <?php endforeach ?>
        
    </ul>
            </nav>
          </div>
        </div>
      </div>
<div class="layout-content">
<div class="layout-content-body">
<div class="title-bar">

    <h1 class="title-bar-title">
      <button class="pull-right btn btn-pill btn-success" style = "text-transform: capitalize; background-color: #fff; color: #000" data-toggle="modal" data-target="#logout" type="button"> <i class = "icon icon-lock"></i> &nbsp Sign Out</button>
                  <span class="pull-right">&nbsp;</span>
                  <button class="pull-right btn btn-pill btn-success" style = "text-transform: capitalize; background-color: #000" data-toggle="modal" data-target="#pwdChange" type="button"> <i class = "icon icon-edit"></i> &nbsp Change Password</button>
      
        <span class="d-ib"><?php echo $head?></span>
       
    </h1>
    <p class="title-bar-description">
        <small  style ="color:#7fb4de"><?php echo $subhead?></small>

    </p>
</div>


 <?php echo $content ?>
    
    
    
</div>
</div>

</div>
<div id="createUser" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" style="background-color: #7fb4de">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff" >
                    <span aria-hidden="true" style="color: #fff">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                    <span class="icon icon-user-plus icon-5x m-y-lg"></span>
                    <h4 class="modal-title" style="font-size: 12px">Create A New User</h4>

                </div>
            </div>
            <form action="CreateUser" class="jqueryform">
            <div class="modal-tabs">

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="display2">
                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label  class="form-label" style="font-size: 12px">User's Last Name</label>
                                        <input id="form-control-6" class="form-control" name="lname" type="text" style="font-size: 11px" required></div>
                                        <div class="col-md-4">
                                        <label  class="form-label" style="font-size: 12px">User's first Name</label>
                                        <input id="form-control-6" class="form-control" type="text" name="fname" style="font-size: 11px" required></div>

                                    <div class="col-md-4">
                                        <label  class="form-label" style="font-size: 12px">Sex</label>

                                        <select id="demo-select2-2" name="sex" class="form-control" style="font-size: 11px" required>
                                          <option value="" selected disabled>Sex</option>
                                            <option value="Male" >Male</option>
                                            <option value="Female">Female</option>
                                            

                                        </select>
                                    </div>

                                </div></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label  class="form-label" style="font-size: 12px">User Email</label>
                                        <input id="form-control-7" class="form-control" name="useremail" type="email" style="font-size: 11px" required>
                                    </div>


                                    <div class="col-md-4">
                                        <label  class="form-label" style="font-size: 12px">Phone Number</label>
                                        <input id="form-control-10" class="form-control" type="Number" name="phonenumber" style="font-size: 11px" required>
                                    </div>

                                </div>
                            </div><hr style="border-color: darkgoldenrod">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label  class="form-label" style="font-size: 12px">User Role</label>
                                        
                                         <select class="form-control" name="roleid" required>
                                             <option value="" selected disabled >Select Role</option>
                                    <?php foreach ($roles as $role): ?>
                                                <option value="<?= $role['id'] ?>">
                                                    <?= $role['rolename'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                            
                                    
                                </select>
                                
                                
                                        <!--<select id="demo-select2-3" class="form-control" name="roleid" style="font-size: 11px" required>-->
                                        <!--    <option value="administrator" >Male</option>-->
                                        <!--    <option value="author">Sex</option>-->
                                        <!--    <option value="contributor">Other</option>-->

                                        </select>
                                    </div>



                                </div>
                            </div>


                        

                    </div>

                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary" style="background-color: #7fb4de;border: #7fb4de;"><i class="icon icon-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="logout" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" style="background-color: #7fb4de">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff">
                    <span aria-hidden="true" style="color: #fff">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                    <span class="icon icon-lock icon-5x m-y-lg"></span>
                    <h4 class="modal-title" style="font-size: 14px">System Logout</h4>

                </div>
            </div>
            <div class="modal-tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#display" data-toggle="tab" style="font-size: 12px">Do You Want To Logout From The System?</a></li>

                </ul>

            </div>
            <div class="modal-footer">
                <center><a href="Logout" type="button" class="btn btn-primary" style="background-color: #7fb4de;border: #7fb4de;"><i class="icon icon-check"></i>&nbsp &nbsp Yes &nbsp &nbsp</a> <button type="button" class="btn btn-danger" style="background-color: maroon"><i class="icon icon-close"></i> Cancel</button></center>

            </div>
        </div>
    </div>
</div>

<div id="pwdChange" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary" style="background-color: #7fb4de">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff" >
                    <span aria-hidden="true" style="color: #fff">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                    <span class="icon icon-edit icon-5x m-y-lg"></span>
                    <h4 class="modal-title" style="font-size: 12px">Change Password</h4>

                </div>
            </div>
             <form  class="jqueryform1" id="passwordchangeform" action="ChangePin" >
            <div class="modal-tabs">

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="display">
                       
                            <div class="form-group">

                                <label  class="form-label" style="font-size: 12px">Old Password</label>
                                <input id="oldpassword" class="form-control" type="password" name="oldpassword" style="font-size: 11px">

                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label  class="form-label" style="font-size: 12px">New Password</label>
                                        <input id="newpassword" class="form-control" type="password" name="newpassword" style="font-size: 11px">

                                    </div>
                                    
                                    


                                    <div class="col-md-6">
                                        <label  class="form-label" style="font-size: 12px">Confirm Password</label>
                                        <input id="confirmpassword" class="form-control" type="password" name="confirmpassword" style="font-size: 11px"></div>

                                </div></div>
                        

                    </div>

                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary" style="background-color: #7fb4de;border: #7fb4de;"><i class="icon icon-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script src="<?php echo base_url()?>public/assets/js/vendor.min.js"></script>
<script src="<?php echo base_url()?>public/assets/js/elephant.min.js"></script>
<script src="<?php echo base_url()?>public/assets/js/application.min.js"></script>
<script src="<?php echo base_url()?>public/assets/js/demo.min.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-83990101-1', 'auto');
    ga('send', 'pageview');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
  <script>
    function addRow() {
        if (checkForEmptyFields()) {
             toastr.error('Please fill in all existing fields before adding a new row.');
            // alert("Please fill in all existing fields before adding a new row.");
            return;
        }

        const tableBody = document.querySelector("#dataTable tbody");
        const row = document.createElement("tr");

        row.innerHTML = `
            <td class="row-number"></td>
            <td><input type="text" class="form-control"  placeholder="" required></td>
            <td>
                <button onclick="deleteRow(this)" class="btn  btn-warning" style="text-transform: capitalize;  background-color: maroon; ; border-color: maroon" type="button">Delete</button>
                
            </td>
        `;

        tableBody.appendChild(row);
        updateRowNumbers();
    }

    function checkForEmptyFields() {
        const rows = document.querySelectorAll("#dataTable tbody tr");
        let hasEmptyFields = false;

        rows.forEach(row => {
            const inputs = row.querySelectorAll("input");
            inputs.forEach(input => {
                if (!input.disabled && input.value.trim() === '') {
                    input.classList.add('error');
                    hasEmptyFields = true;
                } else {
                    input.classList.remove('error');
                }
            });
        });

        return hasEmptyFields;
    }

    function deleteRow(button) {
        const row = button.closest("tr");
        row.remove();
        updateRowNumbers();
    }

    function updateRowNumbers() {
        const rows = document.querySelectorAll("#dataTable tbody tr");
        rows.forEach((row, index) => {
            const numberCell = row.querySelector(".row-number");
            numberCell.textContent = index + 1;
        });
    }
    
     function saveData() {
    const tableRows = document.querySelectorAll("#dataTable tbody tr");
    const tableData = [];
    const numberOfRows = tableRows.length;
    let counting=0;
    let completedRequests = 0;
    // alert(`Number of rows: ${numberOfRows}`);
    
    // Iterate through each row
    tableRows.forEach(row => {
        const itemInput = row.querySelector("input");
        tableData.push({
            item: itemInput.value
        });
        
        // Start loading animation
        startLoader();

        $.ajax({
            url: 'ShowRoomSave',
            type: 'POST',
            data: { serialNo: itemInput.value },
            success: function(response) {
                counting++;
                $.preloader.stop();
                
                const output = JSON.parse(response);
                
                if(counting===numberOfRows){
                    toastr[output.alertType](output.message);
                }
                
                
                
                if (output.status === 201) {
                    row.remove();
                } else {
                }
            },
            error: function(xhr, status, error) {
                $.preloader.stop();
                console.error("AJAX request failed: ", status, error);
            }
        });
    });

    // Optionally, you can uncomment this line to send data to the server
    // sendDataToServer(tableData);
}


        // Send data to server
        // sendDataToServer(tableData);
    
    
    
    </script>

<script src="<?php echo base_url()?>public/Loading-Spinner/jquery.preloaders.js"></script>
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
<script type="text/javascript">

  function startLoader() {
    $.preloader.start({
        modal: true,
        src: "<?php echo base_url('public/Loading-Spinner/img/sprites24.png')?>"
    });
}
function stopLoader() {
    $.preloader.close();
}

  $('.jqueryform').submit(function(event){

    // alert($(this).attr('action'));
        event.preventDefault();
        var formAction = $(this).attr('action');
        startLoader();
        $.ajax({
            url: $(this).attr('action'),
            type: 'Post',
            data: $(this).serialize(),
            success: function(response) {
            //   alert(response);
                $.preloader.stop();

                var output = JSON.parse(response);
                toastr[output.alertType](output.message);
                if(output.status===201){
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                }
            }
        });
    });

</script>
 <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
    $('#passwordchangeform').on('submit', function(e) {
        e.preventDefault(); 
        
        var oldpin = $("#oldpassword").val();
        var newpassword = $("#newpassword").val();
        var confirmpassword = $("#confirmpassword").val();
        var email = "<?php echo $email ?>";
        var token = "<?php echo $token ?>";
        var combine = email + oldpin;
        var hash = CryptoJS.SHA512(combine).toString(CryptoJS.enc.Hex);

        if (oldpin === "") {
            toastr.error('Enter Your Current Password');
        } else if (newpassword === "") {
            toastr.error('Enter Your New Password');
        } else if (confirmpassword === "") {
            toastr.error('Confirm Your New Password');
        } else if (newpassword !== confirmpassword) {
            toastr.error('Password Confirmation Does Not Match');
        } else {
            if (hash === token) {
                // alert("Passwords match");
                var finalpass = email + newpassword;
                var hashfinal = CryptoJS.SHA512(finalpass).toString(CryptoJS.enc.Hex);
                startLoader();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'Post',
                    data: { hashfinal: hashfinal },
                    success: function(response) {
                        // alert( response);
                        try {
                            $.preloader.stop();

                            var output = JSON.parse(response);
                            toastr[output.alertType](output.message);

                            if (output.status === 201) {
                                setTimeout(function() {
                                    location.reload();
                                }, 500);
                            }
                        } catch (e) {
                            // console.error("Failed to parse JSON response", e);
                            toastr.error("An error occurred while processing your request.");
                        }
                    },
                    error: function(xhr, status, error) {
                        $.preloader.stop();
                        console.error("AJAX request failed. Status:", status, "Error:", error);
                        console.error("Response Text:", xhr.responseText);
                        toastr.error("An error occurred while communicating with the server.");
                    }
                });
            } else {
                toastr.error('Incorrect Current Password');
            }
        }
    });
</script>


 <!-- jQuery -->
    

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- xlsx Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    
    
    <script>
        document.getElementById('fileInput').addEventListener('change', handleFile, false);

        function handleFile(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: 'array' });

                // Assuming you want to read the first sheet
                const sheetName = workbook.SheetNames[0];
                const sheet = workbook.Sheets[sheetName];
                const rows = XLSX.utils.sheet_to_json(sheet, { header: 1 });

                if (rows.length > 0) {
                    const headers = rows[0].map(header => header ? header.trim() : '').filter(header => header !== '');

                    if (validateHeader(headers)) {
                        displayTable(rows);
                    } else {
                        alert('The uploaded file does not have the correct headers. Please check the file and try again.');
                    }
                } else {
                    alert('No data found in the uploaded file.');
                }
            };
            reader.readAsArrayBuffer(file);
        }

        function validateHeader(headers) {
            // Expected headers in the correct order
            const expectedHeaders = ['Serial Numbers'];
            return expectedHeaders.every((header, index) => header === headers[index]);
        }

        function displayTable(rows) {
            const headerRow = document.getElementById('headerRow');
            const dataBody = document.getElementById('dataBody');

            headerRow.innerHTML = '';
            dataBody.innerHTML = '';

            if (rows.length === 0) return;

            // Create header row
            const headers = rows[0].map(header => header ? header.trim() : '');
            headers.forEach((header) => {
                const th = document.createElement('th');
                th.textContent = header;
                headerRow.appendChild(th);
            });

            // Create data rows
            for (let i = 1; i < rows.length; i++) {
                const tr = document.createElement('tr');
                rows[i].forEach((cell, index) => {
                    const td = document.createElement('td');
                    td.textContent = cell;
                    tr.appendChild(td);
                });
                dataBody.appendChild(tr);
            }
            document.getElementById('uploadid').style.display = 'block';
            // Initialize DataTables
            $('#demo-datatables-responsive-1').DataTable({
                responsive: true
            });
        }
    </script>

    <script>
        $('#sendData').click(function() {
            var tableData = [];
            $('#demo-datatables-responsive-1 tr').each(function(row, tr) {
                var rowData = [];
                $(tr).find('td').each(function(col, td) {
                    rowData.push($(td).text());
                });
                if (rowData.length > 0) {
                    tableData.push(rowData);
                }
            });

            $.ajax({
                url: 'bulk-insert',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(tableData),
                success: function(response) {
                    // alert(response);

                    // alert('Data inserted successfully');
                },
                error: function() {
                    alert('Error inserting data');
                }
            });
        });
    </script>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
$(document).ready(function() {

    $('#uploadForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting the default way

        var formData = new FormData(this); // Create FormData object
        var $submitButton = $(this).find('button[type="submit"]'); // Find the submit button
         var $fileInput = $(this).find('input[type="file"]'); 

        $submitButton.prop('disabled', true).text('Uploading...'); // Disable button and change text

        $.ajax({
            url: 'bulkinsert', // The URL to send the request to
            type: 'POST',
            data: formData,
            contentType: false, // Prevent jQuery from setting contentType
            processData: false, // Prevent jQuery from processing data
            success: function(response) {
            toastr.success(response.message);


                // $('#responseMessage').html('<p>' + response.message + '</p>');
                $submitButton.prop('disabled', false).text('Upload'); // Re-enable button and change text
                        
                        // Destroy the DataTable instance
                        var table = $('#demo-datatables-responsive-1').DataTable();
                        table.clear().draw(); // Clear DataTable data
                        table.destroy(); // Destroy DataTable instance

                        // Remove table HTML structure
                        $('#demo-datatables-responsive-1').remove();


                        // Reset the file input
                        $fileInput.val('');

                         document.getElementById('uploadid').style.display = 'none';
                         //window.location.reload();
                         window.location.href = 'Preview';




            },
            error: function(xhr, status, error) {
                $('#responseMessage').html('<p>Error uploading file.</p>');
                console.error(xhr.responseText); // For debugging
                $submitButton.prop('disabled', false).text('Upload'); // Re-enable button and change text
            }
        });
    });
});
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentUrl = window.location.href;
            var links = document.querySelectorAll('.sidenav a');
            links.forEach(function(link) {
                if (link.href === currentUrl) {
                    link.classList.add('active');
                }
            });
        });
        
        //   $('#passwordchangeform').click(function() {
    
        // oldpassword newpassword confirmpassword
    </script>
    
    
    
</body>
</html>