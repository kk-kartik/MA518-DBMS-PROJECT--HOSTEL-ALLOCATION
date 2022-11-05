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
if (array_key_exists('postdata', $_SESSION)) : ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="refresh" content="300">
        <title>Student Hostel Portal</title>
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
            $.extend({
                redirectPost: function(location, args) {
                    var form = '';
                    $.each(args, function(key, value) {
                        value = value.split('"').join('\"')
                        form += '<input type="hidden" name="' + key + '" value="' + value + '">';
                    });
                    $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
                }
            });
        </script>
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
                                    <h5 class="mb-0 text-white nav-user-name ml-2"><?php echo $_SESSION['postdata']['username']; ?>
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
                        <a class="d-xl-none d-lg-none" href="#">Student Hostel Portal</a>
                        <button class="navbar-toggler" type="button" onclick="showmenu();" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <?php
            require_once 'connect.php';
            //print_r($_SESSION);
            $query = "SELECT * FROM hab.students WHERE email = '{$_SESSION['postdata']['username']}'; ";
            $sql2 = $conn->query($query);
            $details = $sql2->fetch(PDO::FETCH_ASSOC);
            $query = "SELECT * FROM hab.roomrecords WHERE rollno = {$details['rollno']}; ";
            $sql2 = $conn->query($query);
            $rdetails = $sql2->fetch(PDO::FETCH_ASSOC);
            $query = "SELECT * FROM hab.hostel WHERE hid IN (SELECT s.hid FROM hab.rooms s WHERE s.roomid={$rdetails['roomid']}) ; ";
            $sql2 = $conn->query($query);
            $hdetails = $sql2->fetch(PDO::FETCH_ASSOC);
            if(isset($_SESSION['postdata']['doesAgree']) && $_SESSION['postdata']['doesAgree']=="on"){
                $query="INSERT INTO hab.`cycles`( `ownerid`, `regno`, `billno`, `color`, `brand`) VALUES ('{$_SESSION['postdata']['rollno']}','{$_SESSION['postdata']['breg']}','{$_SESSION['postdata']['bbill']}','{$_SESSION['postdata']['bcolor']}','{$_SESSION['postdata']['bbrand']}');";
                unset($_SESSION['postdata']['doesAgree']);
                $stmt=$conn->prepare($query);
                $stmt->execute();
            }
            $query = "SELECT * FROM hab.cycles WHERE ownerid ={$details['rollno']} ; ";
            //$cdetails['cycleid']=" ";
            $sql2 = $conn->query($query);
            $cdetails = $sql2->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="dashboard-wrapper">

                <div class="container-fluid dashboard-content">

                    <!-- pageheader -->
                    <!-- In case no cycle was registered by user yet -->
                    <?php if (empty($cdetails)) : ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Cycle Registration</h2>
                                </div>
                            </div>
                        </div>

                        <!-- code here -->
                        <div class="modal-body card">
                            <form method="POST"  action="cyreg.php">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="bname">Name</label>
                                        <input id="bname" type="text" name="name" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $details['name']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="bcategory">Date of Birth</label>
                                        <input id="bcategory" type="text" name="bcategory" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $details['dob']; ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="bdept">Department</label>
                                        <input id="bdept" type="text" name="dept" readonly="" placeholder="" autocomplete="off" class="form-control input-height" value="<?php echo $details['dept']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bprogram">Program</label>
                                        <input id="bprogram" type="text" name="prog" readonly="" placeholder="" autocomplete="off" class="form-control input-height" value="<?php echo $details['prog']; ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="brollno">Roll Number</label>
                                        <input id="brollno" type="text" name="rollno" readonly="" placeholder="" autocomplete="off" class="form-control input-height" value="<?php echo $details['rollno']; ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="bemail">Email</label>
                                        <input id="bemail" type="text" name="username" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $details['email']; ?>">
                                        <input name="password" value="<?php echo $_SESSION['postdata']['password']; ?>" type="password" hidden>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="bhostel">Hostel Details</label>
                                        <input id="bhostel" type="text" name="hostel" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $hdetails['hname']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bmobile">Registration No.<span class="text-danger">*</span></label>
                                        <input id="bmobile" type="text" name="breg"  required="" placeholder="" autocomplete="off" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="bbill">Bill No.</label>
                                        <input id="bbill" type="text" name="bbill" required="" placeholder="" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="bcolor">Color</label>
                                        <input id="bcolor" type="text" name="bcolor" required="" placeholder="" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bbrand">Brand<span class="text-danger">*</span></label>
                                        <input id="bbrand" type="text" name="bbrand" required="" placeholder="" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" id="doesAgree" name="doesAgree" class="custom-control-input"><span class="custom-control-label text-danger">* All of the above information furnished is best to my knowledge and belief. If any kind of information is found false, I shall be liable for appropriate action.</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit" name="regcyc">Register</button>
                                </div>
                            </form>
                        </div>
                        <!-- In case cycle details are already registered -->
                    <?php else : ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Cycle Registration</h2>
                                </div>
                            </div>
                        </div>

                        <!-- code here -->
                        <div class="row">
                            <div class="card-body border-top">
                                <h3>Current Profile</h3>



                                <div id="curprofiledata" class="alert alert-primary bg-info" role="alert">
                                    <div class="row">
                                        <h4 class="col-md-4">Name: <span class="text-muted"><?php echo $details['name']; ?> </span> </h4>
                                        <h4 class="col-md-4">Department: <span class="text-muted"><?php echo $details['dept']; ?></span> </h4>
                                        <h4 class="col-md-4">Hostel: <span class="text-muted"><?php echo $hdetails['hname']; ?></span> </h4>
                                    </div>
                                    <div class="row">
                                        <h4 class="col-md-4">Email: <span class="text-muted"><?php echo $details['email']; ?></span> </h4>
                                        <h4 class="col-md-4">Cycle No.: <span class="text-muted"><?php echo $cdetails['cycleid']; ?></span> </h4>
                                        <h4 class="col-md-4">Color: <span class="text-muted"><?php echo $cdetails['color']; ?></span> </h4>
                                    </div>
                                    <div class="row">
                                        <h4 class="col-md-4">Reg No: <span class="text-muted"><?php echo $cdetails['regno']; ?></span></h4>
                                        <h4 class="col-md-4">Bill No: <span class="text-muted"><?php echo $cdetails['billno']; ?></span></h4>
                                        <h4 class="col-md-4">Brand: <span class="text-muted"><?php echo $cdetails['brand'] ?? 'No Cycle registered'; ?></span> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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
        <!-- <script src="js/main-js.js"></script> -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
        <script src="js/data-table.js"></script>
        <script>
            $("a").each(function() {
                if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
                    $(this).addClass('activeMenuItem');
                }
            });

            $(document).on("keypress", ".numberonly", function(evt) {
                if (evt.which < 48 || evt.which > 57) {
                    evt.preventDefault();
                }
            })

            function show() {

                document.getElementsByClassName('nav-user-img')[0].ariaExpanded = true;
                $('.nav-user').toggleClass('show');
                $('.nav-user-dropdown').toggleClass('show');
            }

            function showmenu() {

                document.getElementsByClassName('navbar-toggler')[0].ariaExpanded = true;
                $('.navbar-toggler').toggleClass('collapsed');
                $('#navbarNav').toggleClass('show');
            }
        </script>
    <?php endif;
    ?>
    </body>

    </html>