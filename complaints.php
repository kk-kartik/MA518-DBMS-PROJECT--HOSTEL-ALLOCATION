<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     foreach ($_POST as $key=>$value ){
    //         if (is_array($_POST[$key])) {
    //             $_SESSION['postdata'][$key]=$_POST[$key];
    //     } else {

    //       $_SESSION['postdata'][$key]=stripslashes(strval($value));
    //    }

    //   }

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
        <!-- <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet"> -->
        <script src="https://kit.fontawesome.com/099dc0ed07.js" crossorigin="anonymous"></script>
        <!-- css handled here -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="css/buttons.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="css/select.bootstrap4.css">
        <link rel="stylesheet" type="text/css" href="css/fixedHeader.bootstrap4.css">
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
                                <a class="dropdown-item" href="index.php"><i class="fas fa-power-off"></i> Logout</a>
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
                                <!-- --------------          STUDENT MENU START   --------------           -->


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
            <div class="dashboard-wrapper">

                <div class="container-fluid dashboard-content">

                    <!-- pageheader -->

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Complaints Dashboard</h2>
                            </div>
                        </div>
                    </div>

                    <!-- code here -->
                    <?php

                    require_once 'connect.php';
                    $query = "SELECT * FROM hab.students WHERE email = '{$_SESSION['postdata']['username']}'; ";
                    $sql2 = $conn->query($query);
                    $details = $sql2->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <?php

                    $query = "SELECT * FROM hab.roomrecords WHERE rollno = {$details['rollno']}; ";
                    $sql2 = $conn->query($query);
                    $rdetails = $sql2->fetch(PDO::FETCH_ASSOC);
                    $query = "SELECT * FROM hab.hostel WHERE hid IN (SELECT s.hid FROM hab.rooms s WHERE s.roomid={$rdetails['roomid']}) ; ";
                    $sql2 = $conn->query($query);
                    $hdetails = $sql2->fetch(PDO::FETCH_ASSOC);
                    if (isset($_SESSION['postdata']['cmpdesc'])) {
                        try{
                        $query = "INSERT INTO hab.`complaints`( `description`, `cstatus`, `givenby`, `offid`, `cdate`) VALUES ('{$_SESSION['postdata']['cmpdesc']}','PENDING','{$details['rollno']}','{$hdetails['warden']}',CURRENT_DATE);";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        }catch(PDOException $e){
                            $error=$e->getMessage();
                        }
                        unset($_SESSION['postdata']['cmpdesc']);
                    }
                    ?>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="text-right">
                                <!-- Button trigger modal -->
                                <button class="btn btn-primary showmshmodal" onclick="showmshreqmodal()">
                                    Raise a Complaint
                                </button>
                            </h3>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card text-dark">
                                <div class="card-header">
                                    Complaints History
                                </div>
                                <div class="card-body">
                                <?php if(isset($error)):?>
                                <div class="p-2">
                                    <div class="alert alert-danger" role="alert">
                                    <?php echo $error;
                                        unset($error);
                                    ?>
                                    </div>
                                </div>
                                <?php endif;?>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>Complaint ID</th>
                                                    <th>Complaint Date</th>
                                                    <th>Description</th>
                                                    <th>Current Desk</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM hab.complaints Where givenby={$details['rollno']};";
                                                $sql = $conn->query($query);
                                                while (
                                                    $row = $sql->fetch(
                                                        PDO::FETCH_ASSOC
                                                    )
                                                ) { ?>
                                                    <tr>
                                                        <td><?php echo $row['cmpid']; ?></td>
                                                        <td><?php echo $row['cdate']; ?></td>
                                                        <td><?php echo $row['description']; ?></td>
                                                        <td><?php echo $row['offid']; ?></td>
                                                        <td class="<?php echo ($row['cstatus'] == "PENDING") ? "text-primary" : (($row['cstatus'] == "SOLVED") ? "text-dark-green" : "text-danger"); ?>"><?php echo $row['cstatus']; ?></td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Complaint ID</th>
                                                    <th>Complaint Date</th>
                                                    <th>Description</th>
                                                    <th>Current Desk</th>
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


        </div>


        <!----------------------------------- Complaints Modal --------------------->

        <div class="modal fade" id="viewmshrequestM" tabindex="-1" role="dialog" aria-labelledby="viewmshrequestMH" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="viewmshrequestMH">View Married Scholar Hostel Accomodation Request</h5>
                        <button class="close closebtn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" action="complaints.php">
                        <div class="modal-body">
                            <div id="basicform">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="vmshbname">Name</label>
                                        <input id="vmshbname" type="text" name="cmpname" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $details['name']; ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="vmshrollno">Email</label>
                                        <input id="vmshrollno" type="text" name="username" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $_SESSION['postdata']['username']; ?>">
                                        <input name="password" value="<?php echo $_SESSION['postdata']['password']; ?>" type="password" hidden>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="vmshphone">Hostel</label>
                                        <input id="vmshphone" type="text" name="cmphostel" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $hdetails['hname']; ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="vmshemail">Room No.</label>
                                        <input id="vmshemail" type="number" name="cmproomno" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $rdetails['roomid']; ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="vmshperadd">Describe your complaint</label>
                                        <input id="vmshperadd" type="text" name="cmpdesc" required placeholder="" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary closebtn" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit" name="regcmp">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end request -->


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

            function showmshreqmodal() {
                $("#viewmshrequestM").modal("show");
            }
            $(".closebtn").click(function() {
                $("#updateprofileModal,#changeRoomReqModal,#updatehostelModal,#viewhostelshift,#viewmshrequestM").find("input,textarea,select").val('').end().find("input[type=checkbox], input[type=radio],input[type=date]").prop("checked", "").end();
                $('#updateprofileModal,#changeRoomReqModal,#updatehostelModal,#viewhostelshift,#viewmshrequestM').modal('hide');
                $(".addon").remove();
            });
        </script>
    <?php endif;
    ?>
    </body>

    </html>