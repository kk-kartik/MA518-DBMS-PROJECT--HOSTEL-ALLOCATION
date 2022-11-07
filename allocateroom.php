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
if (array_key_exists('postdata', $_SESSION)) : 


?>
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
                                    HAB Menu
                                </li>



                                <li class="nav-item">
                                    <a class="nav-link" href="main.php"><i class="fas fa-home"></i>Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="allocateroom.php"><i class="fa-solid fa-hotel"></i>Allocate Rooms</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>


            <div class="dashboard-wrapper">

                <div class="container-fluid dashboard-content">
            <?php
            require_once 'connect.php';
            //print_r($_SESSION);
            if(isset($_SESSION['postdata']['alloc'])){
                $query = "INSERT INTO hab.`users` VALUES ('{$_SESSION['postdata']['email']}','{$_SESSION['postdata']['pwd']}','STUD');";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $query = "INSERT INTO hab.`students` VALUES ('{$_SESSION['postdata']['rollno']}','{$_SESSION['postdata']['name']}','{$_SESSION['postdata']['gender']}','{$_SESSION['postdata']['prog']}','{$_SESSION['postdata']['dept']}','{$_SESSION['postdata']['dob']}','{$_SESSION['postdata']['email']}');";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $query = "SELECT hid as opt, nstud FROM hab.`hostel` WHERE `gender`='{$_SESSION['postdata']['gender']}' order by rand() LIMIT 1;  ";
                $sql2 = $conn->query($query);
                $hdd = $sql2->fetch(PDO::FETCH_ASSOC);
                $query="SELECT H.roomid as opt FROM hab.rooms H Where H.`type`-(SELECT COUNT(*) FROM hab.roomrecords R WHERE R.roomid=H.roomid and R.tdate IS NULL) > 0  AND H.`type`={$_SESSION['postdata']['yos']} AND H.`hid`={$hdd['opt']} ORDER BY RAND() LIMIT 1;";
                $sql2 = $conn->query($query);
                $rdd = $sql2->fetch(PDO::FETCH_ASSOC);
                $query = "INSERT INTO hab.`roomrecords`(`roomid`, `rollno`, `sdate`) VALUES ('{$rdd['opt']}','{$_SESSION['postdata']['rollno']}',CURRENT_DATE);";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $query = "UPDATE hab.`hostel` SET `nstud`={$hdd['nstud']}+1 WHERE `hid`={$hdd['opt']};";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                unset($_SESSION['postdata']['alloc']);
            }
            
            ?>
                    <!-- pageheader -->
                    <!-- In case no cycle was registered by user yet -->

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Allocate Rooms</h2>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body card" id="addemp">
                        <form action="allocateroom.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bname">Name <span class="text-danger">*</span></label>
                                    <input id="bname" type="text" name="name" placeholder="" autocomplete="off" class="form-control" required="">
                                    
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bcategory">Date of Birth <span class="text-danger">*</span></label>
                                    <input id="bcategory" type="date" name="dob" placeholder="" autocomplete="off" class="form-control" required="" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bcategory">Gender <span class="text-danger">*</span></label>
                                    <select id="bcategory" type="text" name="gender" placeholder="" autocomplete="off" class="form-control" required="">
                                    <option value="" disabled selected>Select gender</option>    
                                    <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                    <input hidden name="username" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $_SESSION['postdata']['username']; ?>">
                                    <input name="password" value="<?php echo $_SESSION['postdata']['password']; ?>"  hidden>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="bdept">Department <span class="text-danger">*</span></label>
                                    <select id="bdept" type="text" name="dept" placeholder="" autocomplete="off" class="form-control input-height" required="">
                                        <option value="" disabled selected>Select Department</option>    
                                        <option value="Mathematics">MnC</option>
                                        <option value="Mechanical">ME</option>
                                        <option value="Chemical">CE</option>
                                        <option value="Bioscience">BSBE</option>
                                        <option value="ComputerSci">CSE</option>
                                        <option value="Civil">CL</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bprogram">Program <span class="text-danger">*</span></label>
                                    <select id="bprogram" type="text" name="prog" placeholder="" autocomplete="off" class="form-control input-height" required="">
                                        <option value="" disabled selected>Select Programme</option>    
                                        <option value="BTech">B.Tech</option>
                                        <option value="MTech">M.Tech</option>
                                        <option value="MSc">M.Sc</option>
                                        <option value="Phd">Phd</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="brollno">Roll Number <span class="text-danger">*</span></label>
                                    <input id="brollno" type="number" name="rollno" placeholder="" autocomplete="off" class="form-control input-height" required="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="bemail">Email <span class="text-danger">*</span></label>
                                    <input id="bemail" type="text" name="email" placeholder="" autocomplete="off" class="form-control" required="">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="bhostel">Password <span class="text-danger">*</span></label>
                                    <input id="bhostel" type="text" name="pwd" placeholder="" autocomplete="off" class="form-control" required="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="bmobile">Year of Study <span class="text-danger">*</span></label>
                                    <select id="bmobile" type="text" name="yos"  required="" placeholder="" autocomplete="off" class="form-control numberonly">
                                        <option value="" disabled selected>Select Year of Study</option>    
                                        <option value="2">1st</option>
                                        <option value="1">2nd</option>
                                        <option value="1">3rd</option>
                                        <option value="1">4th</option>
                                        <option value="1">More than 4th</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary closebtn" data-dismiss="modal" type="reset">Reset</button>
                                <button type="submit" name="alloc" class="btn btn-primary">Allocate </button>
                            </div>
                        </form>
                    </div>
                    <!-- code here -->


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