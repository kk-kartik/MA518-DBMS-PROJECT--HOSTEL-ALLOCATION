<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
if (array_key_exists('postdata', $_SESSION)): ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="300">
    <title>Student Affairs Portal</title>
    <link rel="icon" href="assets/images/iitg.ico" type="image/icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/099dc0ed07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css"> -->
    <style>
        .input-height {
            height: 2.4rem;
        }

        .modal-body p {
            word-wrap: break-word;
        }

        .text-dark-green {
            color: rgb(4, 87, 11);
        }
    </style>
</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        // jquery extend function
$.extend(
{
    redirectPost: function(location, args)
    {
        var form = '';
        $.each( args, function( key, value ) {
            value = value.split('"').join('\"')
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
    }
});
    </script>
<?php if (
    isset($_SESSION['postdata']['submit']) &&
    $_SESSION['postdata']['username'] == $_SESSION['postdata']['password']
): ?>
    <!-- main wrapper -->

    <div class="dashboard-main-wrapper">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-white fixed-top">

            <div class="dashboard-nav-brand">
                <a class="dashboard-logo" href="https://www.iitg.ac.in/"><img src="assets/images/iitg.ico" alt="IITG Logo" style="max-width:50%;"></a>
            </div>

            <!-- <button style="border: none; border-radius: 4px; margin-left: 10rem;" class="btn-warning opennoticemodal btn-xs" data-toggle="modal" data-target="#requestCountModal">
                <span class="fa-stack">
                    <i class="fa fa-bell fa-stack-1x fa-inverse request-notification" data-count="0"></i>
                </span>
            </button> -->

            <button class="btn-warning user-avatar-md btn-xs navbar-toggler">
                <a href="index.php"><i class="fas fa-power-off"></i></a>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">
                        <h4 class="mt-0 pt-0 mb-0 mb-0 pr-1">Indian Institute of Technology</h4>
                        <h5 class="mt-0 mb-0 pt-0 pb-0 text-primary">Guwahati</h5>
                    </li>



                    <li class="nav-item dropdown nav-user">
                        <div class="nav-link nav-user-img" onClick="show();" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/logout.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <span class="status"></span><span class="ml-2">Logged in as</span>
                                <h5 class="mb-0 text-white nav-user-name ml-2"><?php echo $_SESSION[
                                    'postdata'
                                ]['username']; ?>
                                </h5>
                            </div>
                            <a class="dropdown-item" href="index.php"><i class="fas fa-power-off"></i>Logout</a>
                        </div>
                    </li>

                </ul>
            </div>

        </nav>
        <div class="nav-left-sidebar sidebar-dark">

            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Student Affairs Portal</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
           
    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <!-- --------------          PROJECT STAFF MENU START   --------------           -->
        
                        
                        <li class="nav-divider">
                                        Student Menu
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="main.php"><i class="fas fa-home"></i>Home</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="complaints.php"><i class="fas fa-hand-paper"></i>Complaints</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cyreg.php"><i class="fa-solid fa-person-biking"></i>Cycle Registration</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="hleave.php"><i class="fas fa-cog"></i>Hostel leave</a>
                                    </li>
                        <!-- --------------          PROJECT STAFF MENU ENDS   --------------           -->
                        <li class="nav-divider"></li><li class="nav-item"></li><li class="nav-item">&nbsp;</li><li class="nav-item">&nbsp;</li><li class="nav-item">&nbsp;</li>
        
        </ul>
    </div>
</nav>
</div>


</div>
<div class="dashboard-wrapper">
                
                <div class="container-fluid dashboard-content">
                    
                    <!-- pageheader -->
                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Student Dashboard</h2>
                            </div>
                        </div>
                    </div>
                    
                   
                    <!-- end pageheader -->
                    
                    <!-----------------------------  Current Profile -------------------------------------->
                 
                    <div class="row">
                        <div class="card-body border-top">
                            <h3>Current Profile</h3>

                            

                            <div id="curprofiledata" class="alert alert-primary" 
                                    data-studname="KARTIK KURUPASWAMY" data-studemail="kartik.kurupaswamy" data-studmobile="9427686046" data-studemp="212123027" 
                                    data-studdept="MATHS" data-studprog="MSc" data-studhostel="Umiam" data-studblock="C" 
                                    data-studfloor="Third Floor" data-studroom="C-302" data-deptid='8' data-progid='5' role="alert">

                                <div class="row">
                                    <h4 class="col-md-4">Name: <span class="text-muted">KARTIK KURUPASWAMY </span>  </h4>
                                    <h4 class="col-md-4">Department: <span class="text-muted">MATHS</span> </h4>
                                    <h4 class="col-md-4">Hostel: <span class="text-muted">Umiam</span> </h4>
                                </div>
                                <div class="row">
                                    <h4 class="col-md-4">Email: <span class="text-muted">kartik.kurupaswamy</span> </h4>
                                    <h4 class="col-md-4">Programme: <span class="text-muted">MSc</span> </h4>
                                    <h4 class="col-md-4">Room No: <span class="text-muted">C-302</span> </h4>
                                </div>
                                <div class="row">
                                    <h4 class="col-md-4">Roll No: <span class="text-muted">212123027</span></h4>
                                    <h4 class="col-md-4">Cycle No: <span class="text-muted">2102001</span></h4>
                                    <h4 class="col-md-4">Floor: <span class="text-muted">Third Floor</span> </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------------------------------- Change Room Request Table --------------------------->
                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="text-right"><!-- Button trigger modal -->
                            <a href="#" class="btn btn-info" target="_blank">
                                    Change Room
                                </a> 
                            </h3>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card text-dark">
                                <div class="card-header">
                                    Change Room Request History
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>Request Date</th>
                                                    <th>Previous Room</th>
                                                    <th>Reason for Change</th>
                                                    <th>Current Desk</th>
                                                    <th>Status</th>
                                                    <th>New Room</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Request Date</th>
                                                    <th>Previous Room</th>
                                                    <th>Reason for Change</th>
                                                    <th>Current Desk</th>
                                                    <th>Status</th>
                                                    <th>New Room</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                         
                    <!------------------------------- Hostel Shift Request Table --------------------------->

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="text-right"><!-- Button trigger modal -->
                            <a href="vacatingform.pdf" class="btn btn-info" target="_blank">
                                    Hostel Shift
                                </a>
                            </h3>
                        </div>
                    </div>
                    
                                                                                              
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card text-dark">
                                <div class="card-header">
                                    Hostel Shift Request History
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>Request Date</th>
                                                    <th>Previous Hostel</th>
                                                    <th>New Hostel</th>
                                                    <th>Current Desk</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                                <tr>
                                                                    <td>2022-08-26</td>
                                                                    <td>Umiam</td>
                                                                    <td>Siang</td>
                                                                    <td class="text-dark-green">
                                                                        Hostel Office

                                                                    </td>
                                                                    <td>
                                                                        <span class='text-primary'>Approved</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0)" class="viewhostelshift" data-name='Kartik Kurupaswamy' data-email='NA'    
                                                                            data-roll_reg_no='212123027' data-contact='9427686046' 
                                                                            data-cur_room='Umiam~C~Third Floor~C-302' data-hosfrom='Umiam' 
                                                                            data-hosto='Siang' data-shiftdate='2022-08-13' 
                                                                            data-reason='My classes start at 8 in the morning and go upto 6pm in the evening. Commuting to hostels become hectic and I dont know to ride bicycle, I am unable to maintain my health.' data-hosfee='0' 
                                                                            data-messfee='0' data-canteenfee='0' 
                                                                            data-stanfee='0' data-juicefee='0' 
                                                                            data-dsdcfee='0' ><i class="fas fa-eye"></i>
                                                                        </a>&nbsp&nbsp&nbsp
                                                                    </td>           
                                                                </tr>
                                                            
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Request Date</th>
                                                    <th>Previous Hostel</th>
                                                    <th>New Hostel</th>
                                                    <th>Current Desk</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 <!------------------------------- Accommodation History Table ------------------------------------------------>
                                     
 <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card text-dark">
                                <div class="card-header">
                                    Accomodation History
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>Hostel</th>
                                                    <th>Block</th>
                                                    <th>Room Number</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                                <tr>
                                                                    <td>Barak</td>
                                                                    <td>A</td>
                                                                    <td>A-024</td>
                                                                    <td>2022-03-08</td>
                                                                    <td>2022-03-08</td>
                                                                    <td><span class='text-dark-green'>Completed</span></td>
                                                                </tr>
                                                            
                                                                <tr>
                                                                    <td>Barak</td>
                                                                    <td>A</td>
                                                                    <td>A-029</td>
                                                                    <td>2022-03-08</td>
                                                                    <td>2022-07-19</td>
                                                                    <td><span class='text-dark-green'>Completed</span></td>
                                                                </tr>
                                                            
                                                                <tr>
                                                                    <td>Umiam</td>
                                                                    <td>C</td>
                                                                    <td>C-302</td>
                                                                    <td>2022-07-28</td>
                                                                    <td>-</td>
                                                                    <td><span class='text-primary'>On Going</span></td>
                                                                </tr>
                                                            
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Hostel</th>
                                                    <th>Block</th>
                                                    <th>Room Number</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
                    <div class="footer" style="position:fixed; bottom:0; width:100%; z-index:-1;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-dark text-right">
             MA518- DBMS Project 2022 
			</div>
		</div>
	</div>
</div>

                
                <!-- end footer -->
                
            </div>            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js"></script>
        <script src="js/main-js.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
                    <script src="js/data-table.js"></script>
                    <script>
                    $("a").each(function() 
                {
                    if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) 
                    {
                        $(this).addClass('activeMenuItem');
                    } 
                });

                $(document).on("keypress",".numberonly",function(evt)
                {
                    if (evt.which < 48 || evt.which > 57)
                    {
                        evt.preventDefault();
                    }
                })
                        function show() {
                            
                            document.getElementsByClassName('nav-user-img')[0].ariaExpanded=true;
                            $('.nav-user').toggleClass('show');
                            $('.nav-user-dropdown').toggleClass('show');
                        }
                    </script>
                    <?php elseif (
    $_SESSION['postdata']['username'] == 'admin'
): ?>
    <script>
        $.redirectPost("/",{error:"Invalid Username"})
    </script>
    <?php elseif ($_SESSION['postdata']['password']): ?>
        <script>
        $.redirectPost("/",{error:"Invalid Password"})
    </script>
        <?php else: ?>
<script>
    $.redirectPost("/");
</script>
<?php endif; ?>
</body>
</html>
<?php endif;
?>
