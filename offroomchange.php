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
require_once "connect.php";
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
                                    Warden Menu
                                </li>



                                <li class="nav-item">
                                    <a class="nav-link" href="main.php"><i class="fas fa-home"></i>Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="offroomchange.php"><i class="fa-solid fa-hotel"></i>Room Change Requests</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" href="offcomplaints.php"><i class="fa-solid fa-user"></i>Complaints</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>


            <div class="dashboard-wrapper">

                <div class="container-fluid dashboard-content">

                    <!-- pageheader -->
                    <!-- In case no cycle was registered by user yet -->

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Room Change Requests </h2>
                            </div>
                        </div>
                    </div>
                    <?php
                    $query = "SELECT * FROM hab.emply WHERE email = '{$_SESSION['postdata']['username']}'; ";
                    $sql2 = $conn->query($query);
                    $details = $sql2->fetch(PDO::FETCH_ASSOC);

                    if (isset($_SESSION['postdata']['submithm'])) {
                        if($_SESSION['postdata']['submithm']=="REJECTED"){
                            $query = "UPDATE hab.`rchange` SET `rstatus`='{$_SESSION['postdata']['submithm']}' WHERE `rcid`={$_SESSION['postdata']['rcid']};";
                            unset($_SESSION['postdata']['submithm']);
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                        }else{
                            $query = "UPDATE hab.`roomrecords` SET `tdate`=CURRENT_DATE WHERE `rollno`={$_SESSION['postdata']['rollno']} and `tdate` IS NULL;";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $query = "INSERT INTO hab.`roomrecords`(`roomid`, `rollno`, `sdate`) VALUES ('{$_SESSION['postdata']['rto']}','{$_SESSION['postdata']['rollno']}',CURRENT_DATE);";
                            
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $query = "UPDATE hab.`rchange` SET `rstatus`='{$_SESSION['postdata']['submithm']}' WHERE `rcid`={$_SESSION['postdata']['rcid']};";
                            unset($_SESSION['postdata']['submithm']);
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                        }
                        
                    }
                    ?>
                    <!-- code here -->
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
                                                    <th>Request ID</th>
                                                    <th>Previous Hostel</th>
                                                    <th>New Hostel</th>
                                                    <th>Roll Number</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                print_r($_SESSION);

                                                $query =
                                                    "SELECT * FROM hab.rchange WHERE empid={$details['empid']};";
                                                $sql = $conn->query(
                                                    $query
                                                );
                                                while (
                                                    $row = $sql->fetch(
                                                        PDO::FETCH_ASSOC
                                                    )
                                                ) { ?>
                                                    <tr>
                                                        <td><?php echo $row['rcid']; ?></td>
                                                        <td><?php echo $row['rfrom']; ?></td>
                                                        <td><?php echo $row['rto']; ?></td>
                                                        <td><?php echo $row['rollno']; ?></td>
                                                        <td class="<?php echo ($row['rstatus'] == "PENDING") ? "text-primary" : (($row['rstatus'] == "APPROVED") ? "text-dark-green" : "text-danger"); ?>"><?php echo $row['rstatus']; ?></td>
                                                        <td>
                                                            <a class="viewhostelshift" data-chid="<?php echo $row['rcid']; ?>" data-hfrom="<?php echo $row['rfrom']; ?>" data-hto="<?php echo $row['rto']; ?>" data-rollno="<?php echo $row['rollno']; ?>" data-status="<?php echo $row['rstatus']; ?>"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Request ID</th>
                                                    <th>Previous Hostel</th>
                                                    <th>New Hostel</th>
                                                    <th>Roll Number</th>
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

                    <!-- code here -->
                    <div class="modal fade" id="changeHM" tabindex="-1" role="dialog" aria-labelledby="addhosModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="changeRoomReqModalH">Hostel Change Request</h5>
                                    <button class="close closebtn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <form action="offroomchange.php" method="POST" id="changeroomreqform">
                                    <div class="modal-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="presentH">Request ID</label>
                                                <input id="presentH" type="text" name="rcid" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['chid']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="presentB">Current Status</label>
                                                <input id="presentB" type="text" name="status" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['chstatus']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="presentR">Roll Number</label>
                                                <input id="presentR" type="text" name="rollno" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['rollno']; ?>">
                                            </div>
                                        </div>
                                        <input id="bemail" type="text" hidden name="username" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $details['email']; ?>">
                                        <input name="password" value="<?php echo $_SESSION['postdata']['password']; ?>" type="password" hidden>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="presentH1">Present Hostel</label>
                                                <input id="presentH1" type="text" name="rfrom" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['hfrom']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="presentB2">Change Requested</label>
                                                <input id="presentB2" type="text" name="rto" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['hto']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary closebtn" data-dismiss="modal" type="reset">Close</button>
                                        <button type="submit" id="rejhm" name="submithm" value="REJECTED" class="btn btn-danger">Reject</button>
                                        <button type="submit" id="apphm" name="submithm" value="APPROVED" class="btn btn-primary">Approve</button>
                                    </div>

                                </form>

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
            $(".closebtn").click(function() {
                $("#changeHM,#changeRoomReqModal,#updatehostelModal,#viewhostelshift,#viewmshrequestM").find("textarea").val('').end().find("input[type=checkbox], input[type=radio],input[type=date]").prop("checked", "").end();
                $('#changeHM,#changeRoomReqModal,#updatehostelModal,#viewhostelshift,#viewmshrequestM').modal('hide');
                $(".addon").remove();
                $("#rejhm").removeAttr("hidden");
                $("#apphm").removeAttr("hidden");
            });
            $(document).on("click", ".viewhostelshift", function() {
                $("#presentH").val($(this).data("chid"));
                $("#presentB").val($(this).data("status"));
                $("#presentR").val($(this).data("rollno"));
                $("#presentH1").val($(this).data("hfrom"));
                $("#presentB2").val($(this).data("hto"));
                $("#changeHM").modal("show");
                if ($(this).data("status") != "PENDING") {
                    $("#rejhm").attr("hidden", "");
                    $("#apphm").attr("hidden", "");
                }
            });
        </script>
    <?php endif;
    ?>
    </body>

    </html>