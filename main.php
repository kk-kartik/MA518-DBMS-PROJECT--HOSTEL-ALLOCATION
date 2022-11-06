<?php
require_once 'connect.php';

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

    $query = "SELECT * FROM hab.users WHERE email = '{$_SESSION['postdata']['username']}' and pwd ='{$_SESSION['postdata']['password']}' ; ";
    $sql = $conn->query($query);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
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
        <?php if ($row['pwd'] == $_SESSION['postdata']['password']) : ?>
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
                <?php if ($row['type'] == 'STUD') : ?>
                    <div class="nav-left-sidebar sidebar-dark">

                        <div class="menu-list" style="overflow: hidden; width:auto; height:100%;">
                            <nav class="navbar navbar-expand-lg navbar-light ">
                                <a class="d-xl-none d-lg-none" href="#">Student Hostel Portal</a>
                                <button class="navbar-toggler" type="button" onclick="showmenu();" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="navbar-collapse collapse" id="navbarNav">
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
                                        <!-- --------------          PROJECT STAFF MENU ENDS   --------------           -->
                                        <!-- <li class="nav-divider"></li><li class="nav-item"></li><li class="nav-item">&nbsp;</li><li class="nav-item">&nbsp;</li><li class="nav-item">&nbsp;</li> -->

                                    </ul>
                                </div>
                            </nav>
                        </div>


                    </div>
                    <div class="dashboard-wrapper">

                        <div class="container-fluid dashboard-content ">

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
                                    <?php
                                    $query = "SELECT * FROM hab.students WHERE email = '{$_SESSION['postdata']['username']}'; ";
                                    $sql2 = $conn->query($query);
                                    $details = $sql2->fetch(PDO::FETCH_ASSOC);
                                    $query = "SELECT * FROM hab.roomrecords WHERE rollno = {$details['rollno']}; ";
                                    $sql2 = $conn->query($query);
                                    $rdetails = $sql2->fetch(PDO::FETCH_ASSOC);
                                    $query = "SELECT * FROM hab.rooms s WHERE s.roomid={$rdetails['roomid']}; ";
                                    $sql2 = $conn->query($query);
                                    $rrdetails = $sql2->fetch(PDO::FETCH_ASSOC);

                                    $query = "SELECT * FROM hab.hostel WHERE hid IN (SELECT s.hid FROM hab.rooms s WHERE s.roomid={$rdetails['roomid']}) ; ";
                                    $sql2 = $conn->query($query);
                                    $hdetails = $sql2->fetch(PDO::FETCH_ASSOC);
                                    $query = "SELECT * FROM hab.cycles WHERE ownerid ={$details['rollno']} ; ";
                                    //$cdetails['cycleid']=" ";
                                    $sql2 = $conn->query($query);
                                    $cdetails = $sql2->fetch(PDO::FETCH_ASSOC);

                                    if (isset($_SESSION['postdata']['rto'])) {
                                        $query = "INSERT INTO hab.`rchange`( `rollno`, `empid`, `rfrom`, `rto`, `rstatus`) VALUES ('{$details['rollno']}','{$hdetails['warden']}','{$_SESSION['postdata']['rfrom']}','{$_SESSION['postdata']['rto']}','PENDING');";
                                        unset($_SESSION['postdata']['rto']);
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                    }

                                    if (isset($_SESSION['postdata']['hto']) && $_SESSION['postdata']['hto'] != "") {
                                        $query = "INSERT INTO hab.`hchange`( `rollno`, `empid`, `hfrom`, `hto`, `chstatus`) VALUES ('{$details['rollno']}','1001','{$_SESSION['postdata']['hfrom']}','{$_SESSION['postdata']['hto']}','PENDING');";
                                        unset($_SESSION['postdata']['rto']);
                                        $stmt = $conn->prepare($query);
                                        $stmt->execute();
                                    }
                                    ?>


                                    <div id="curprofiledata" class="alert alert-primary bg-info">

                                        <div class="row">
                                            <h4 class="col-md-4">Name: <span class="text-muted"><?php echo $details['name']; ?> </span> </h4>
                                            <h4 class="col-md-4">Department: <span class="text-muted"><?php echo $details['dept']; ?></span> </h4>
                                            <h4 class="col-md-4">Hostel: <span class="text-muted"><?php echo $hdetails['hname']; ?></span> </h4>
                                        </div>
                                        <div class="row">
                                            <h4 class="col-md-4">Email: <span class="text-muted"><?php echo $details['email']; ?></span> </h4>
                                            <h4 class="col-md-4">Programme: <span class="text-muted"><?php echo $details['prog']; ?></span> </h4>
                                            <h4 class="col-md-4">Room No: <span class="text-muted"><?php echo $rdetails['roomid']; ?></span> </h4>
                                        </div>
                                        <div class="row">
                                            <h4 class="col-md-4">Roll No: <span class="text-muted"><?php echo $details['rollno']; ?></span></h4>
                                            <h4 class="col-md-4">Date of Birth: <span class="text-muted"><?php echo $details['dob']; ?></span></h4>
                                            <h4 class="col-md-4">Cycle No: <span class="text-muted"><?php echo $cdetails['cycleid'] ??
                                                                                                        'No Cycle registered'; ?></span> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------------------- Change Room Request Table --------------------------->

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h3 class="text-right">
                                        <!-- Button trigger modal -->
                                        <button class="btn btn-primary showmshmodal" onclick="showcrreqmodal()">
                                            Change Room Request
                                        </button>
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
                                                            <th>Request ID</th>
                                                            <th>Previous Room</th>
                                                            <th>Current Desk</th>
                                                            <th>Current Status</th>
                                                            <th>New Room</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query = "SELECT * FROM hab.rchange Where rollno={$details['rollno']};";
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
                                                                <td><?php echo $row['empid']; ?></td>
                                                                <td><?php echo $row['rstatus']; ?></td>
                                                                <td><?php echo $row['rto']; ?></td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Request ID</th>
                                                            <th>Previous Room</th>
                                                            <th>Current Desk</th>
                                                            <th>Current Status</th>
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
                                    <h3 class="text-right">
                                        <!-- Button trigger modal -->
                                        <button class="btn btn-primary showmshmodal" onclick="showhsreqmodal()">
                                            Hostel Shift Request
                                        </button>
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

                                                        <?php
                                                        $query = "SELECT * FROM hab.hchange Where rollno={$details['rollno']};";
                                                        $sql = $conn->query(
                                                            $query
                                                        );
                                                        while (
                                                            $row = $sql->fetch(
                                                                PDO::FETCH_ASSOC
                                                            )
                                                        ) { ?>
                                                            <tr>
                                                                <td><?php echo $row['chid']; ?></td>
                                                                <td><?php echo $row['hfrom']; ?></td>
                                                                <td><?php echo $row['empid']; ?></td>
                                                                <td><?php echo $row['chstatus']; ?></td>
                                                                <td><?php echo $row['hto']; ?></td>
                                                            </tr>
                                                        <?php }
                                                        ?>

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
                                                            <th>Record ID</th>
                                                            <th>Room Number</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query = "SELECT * FROM hab.roomrecords Where rollno={$details['rollno']};";
                                                        $sql = $conn->query(
                                                            $query
                                                        );
                                                        while (
                                                            $row = $sql->fetch(
                                                                PDO::FETCH_ASSOC
                                                            )
                                                        ) {
                                                            if (
                                                                $row['tdate'] !=
                                                                ''
                                                            ) { ?>
                                                                <tr>
                                                                    <td><?php echo $row['recordid']; ?></td>
                                                                    <td><?php echo $row['roomid']; ?></td>
                                                                    <td><?php echo $row['sdate']; ?></td>
                                                                    <td><?php echo $row['tdate']; ?></td>
                                                                    <td class="text-dark-green"><?php echo 'Completed'; ?></td>
                                                                </tr>
                                                            <?php } else { ?>
                                                                <tr>
                                                                    <td><?php echo $row['recordid']; ?></td>
                                                                    <td><?php echo $row['roomid']; ?></td>
                                                                    <td><?php echo $row['sdate']; ?></td>
                                                                    <td><?php echo $row['tdate']; ?></td>
                                                                    <td class="text-primary"><?php echo 'Current'; ?></td>
                                                                </tr>
                                                        <?php }
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Record ID</th>
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

                    <!----------------------------------- Hostel Shift Request Modal ---------------------------------------------->

                    <div class="modal fade" id="updatehostelModal" tabindex="-1" role="dialog" aria-labelledby="updatehostelModalH" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="updatehostelModalH">Hostel Shift Request</h5>
                                    <button class="close closebtn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="main.php" method="POST" id="changehostelreqform">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="hsbname">Name</label>
                                                <input id="hsbname" type="text" name="hsbname" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $details['name']; ?>">
                                            </div>


                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="hsrollno">Roll Number</label>
                                                <input id="hsrollno" type="text" name="hsrollno" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $details['rollno']; ?>">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="hsemail">Email</label>
                                                <input id="hsemail" type="text" name="hsemail" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $details['email']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="hshostelfrom">Hostel From</label>
                                                <input id="hfrom" type="text" name="hfrom" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $hdetails['hname']; ?>">
                                                <input id="bemail" type="text" hidden name="username" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $details['email']; ?>">
                                                <input name="password" value="<?php echo $_SESSION['postdata']['password']; ?>" type="password" hidden>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="hshostelto">Hostel To<span class="text-danger">*</span></label>
                                                <select name="hto" id="hshostelto" class="form-control">
                                                    <option value="" disabled selected>Choose a Hostel</option>
                                                    <?php
                                                    $query = "SELECT H.hname as opt FROM hab.hostel H Where H.hname<>'{$hdetails['hname']}';";
                                                    $sql = $conn->query($query);
                                                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo $row['opt'] ?>"><?php echo $row['opt'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <h3>DECLARATION</h3>
                                        <h5>
                                            <ol>
                                                <li>I, Mr./Ms <span class="text-danger"> <?php echo strtoupper($details['name']); ?></span> hereby declare that, the above information is true to the best of my knowledge and belief. I am aware that, if I found false anytime, appropriate action will be taken against me.</li>
                                                <li>I agree with the decision of the Competent Authority on my hostel change request. I am aware that hostel change request are considered only under medical/specific issues as considered suitable by the Competent Authority.</li>
                                            </ol>
                                        </h5>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary closebtn" data-dismiss="modal" type="reset">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!----------------------------------- Change Room Request Modal ----------------------------------------------->

                    <div class="modal fade" id="changeRoomReqModal" tabindex="-1" role="dialog" aria-labelledby="addhosModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="changeRoomReqModalH">Reason For Change</h5>
                                    <button class="close closebtn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="main.php" method="POST" id="changeroomreqform">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="presentH">Present Hostel</label>
                                                <input id="presentH" type="text" name="presentH" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $hdetails['hname']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="presentB">Present Room Number</label>
                                                <input id="presentB" type="text" name="rfrom" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $rdetails['roomid']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="presentR">Present Type</label>
                                                <input id="presentR" type="text" name="presentR" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $rrdetails['type']; ?>">
                                                <input id="bemail" type="text" hidden name="username" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $details['email']; ?>">
                                                <input name="password" value="<?php echo $_SESSION['postdata']['password']; ?>" type="password" hidden>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="rto">Requested Room</label>
                                                <select name="rto" id="hshostelto" required class="form-control">
                                                    <option value="" disabled selected>Choose a Room</option>
                                                    <?php
                                                    $query = "SELECT H.roomid as opt FROM hab.rooms H Where H.type > (SELECT COUNT(*) FROM hab.roomrecords R WHERE R.roomid=H.roomid and R.tdate IS NULL) AND H.roomid<>{$rdetails['roomid']};";
                                                    $sql = $conn->query($query);
                                                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo $row['opt'] ?>"><?php echo $row['opt'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary closebtn" data-dismiss="modal" type="reset">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>



                <?php else:
                    $query = "SELECT * FROM hab.emply WHERE email = '{$_SESSION['postdata']['username']}'; ";
                    $sql2 = $conn->query($query);
                    $details = $sql2->fetch(PDO::FETCH_ASSOC);
                if ($details['etype'] == 'OFF') : 
                    if(isset($_SESSION['postdata']['submithm'])){
                        $query="UPDATE hab.`hchange` SET `chstatus`='{$_SESSION['postdata']['submithm']}' WHERE `chid`={$_SESSION['postdata']['chid']};";
                        unset($_SESSION['postdata']['submithm']);
                        $stmt=$conn->prepare($query);
                        $stmt->execute();
                    }
                    
                    ?>
                    <div class="nav-left-sidebar sidebar-dark">

                        <div class="menu-list" style="overflow: hidden; width:auto; height:100%;">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="d-xl-none d-lg-none" href="#">Hostel Portal</a>
                                <button class="navbar-toggler" type="button" onclick="showmenu();" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="navbar-collapse collapse" id="navbarNav">
                                    <ul class="navbar-nav flex-column">
                                        <!-- --------------          PROJECT STAFF MENU START   --------------           -->


                                        <li class="nav-divider">
                                            HAB Menu
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="main.php"><i class="fas fa-home"></i>Home</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="allocateroom.php"><i class="fas fa-hand-paper"></i>Allocate Rooms</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="addemployee.php"><i class="fas fa-hand-paper"></i>Add Employee</a>
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
                                        <h2 class="pageheader-title">HAB Office Dashboard</h2>
                                    </div>
                                </div>
                            </div>


                            <!-- end pageheader -->

                            <!------------------------------- Hostel Shift Request Table --------------------------->

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
                                                        $query = "SELECT * FROM hab.hchange WHERE chstatus='PENDING';";
                                                        $sql = $conn->query(
                                                            $query
                                                        );
                                                        while (
                                                            $row = $sql->fetch(
                                                                PDO::FETCH_ASSOC
                                                            )
                                                        ) { ?>
                                                            <tr>
                                                                <td><?php echo $row['chid']; ?></td>
                                                                <td><?php echo $row['hfrom']; ?></td>
                                                                <td><?php echo $row['hto']; ?></td>
                                                                <td><?php echo $row['rollno']; ?></td>
                                                                <td class="text-primary"><?php echo $row['chstatus']; ?></td>
                                                                <td><a href="javascript:void(0)" class="viewhostelshift" onclick="<?php $metach=$row; ?> showchm();"><i class="fas fa-eye"></i>
                                                                        </a></td>
                                                            </tr>
                                                        <?php }
                                                        ?>

<?php
                                                        $query = "SELECT * FROM hab.hchange WHERE chstatus='APPROVED';";
                                                        $sql = $conn->query(
                                                            $query
                                                        );
                                                        while (
                                                            $row = $sql->fetch(
                                                                PDO::FETCH_ASSOC
                                                            )
                                                        ) { ?>
                                                            <tr>
                                                                <td><?php echo $row['chid']; ?></td>
                                                                <td><?php echo $row['hfrom']; ?></td>
                                                                <td><?php echo $row['hto']; ?></td>
                                                                <td><?php echo $row['rollno']; ?></td>
                                                                <td class="text-dark-green"><?php echo $row['chstatus']; ?></td>
                                                                <td><a href="javascript:void(0)" class="viewhostelshift" onclick="<?php $metach=$row; ?> showchm();"><i class="fas fa-eye"></i>
                                                                        </a></td>
                                                            </tr>
                                                        <?php }
                                                        ?>
<?php
                                                        $query = "SELECT * FROM hab.hchange WHERE chstatus='REJECTED';";
                                                        $sql = $conn->query(
                                                            $query
                                                        );
                                                        while (
                                                            $row = $sql->fetch(
                                                                PDO::FETCH_ASSOC
                                                            )
                                                        ) { ?>
                                                            <tr>
                                                                <td><?php echo $row['chid']; ?></td>
                                                                <td><?php echo $row['hfrom']; ?></td>
                                                                <td><?php echo $row['hto']; ?></td>
                                                                <td><?php echo $row['rollno']; ?></td>
                                                                <td class="text-danger"><?php echo $row['chstatus']; ?></td>
                                                                <td><a href="javascript:void(0)" class="viewhostelshift" onclick="<?php $metach=$row; ?> showchm();"><i class="fas fa-eye"></i>
                                                                        </a></td>
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
                            
<!----------------------------------- Change Hostel M Request Modal ----------------------------------------------->

<div class="modal fade" id="changeHM" tabindex="-1" role="dialog" aria-labelledby="addhosModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="changeRoomReqModalH">Hostel Change Request</h5>
                                    <button class="close closebtn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="main.php" method="POST" id="changeroomreqform">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="presentH">Request ID</label>
                                                <input id="presentH" type="text" name="chid" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['chid']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="presentB">Current Status</label>
                                                <input id="presentB" type="text" name="rfrom" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['chstatus']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="presentR">Roll Number</label>
                                                <input id="presentR" type="text" name="presentR" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['rollno']; ?>">
                                                <input id="bemail" type="text" hidden name="username" readonly="" placeholder="" autocomplete="off" class="form-control" value="<?php echo $details['email']; ?>">
                                                <input name="password" value="<?php echo $_SESSION['postdata']['password']; ?>" type="password" hidden>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="presentH">Present Hostel</label>
                                                <input id="presentH" type="text" name="hfrom" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['hfrom']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="presentB">Change Requested</label>
                                                <input id="presentB" type="text" name="hto" required placeholder="" autocomplete="off" class="form-control" readonly value="<?php echo $metach['hto']; ?>">
                                            </div>
                                        </div><?php if($metach["chstatus"]=="PENDING"):?>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary closebtn" data-dismiss="modal" type="reset">ACCEPT</button>
                                            <button type="submit" name="submithm" value="REJECTED" class="btn btn-danger">Reject</button>
                                            <button type="submit" name="submithm" value="APPROVED" class="btn btn-primary">Approve</button>
                                        </div>
                                        <?php endif;?>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>




                        <?php elseif ($details['etype'] == 'HST') : ?>
                            <div class="nav-left-sidebar sidebar-dark">

                                <div class="menu-list" style="overflow: hidden; width:auto; height:100%;">
                                    <nav class="navbar navbar-expand-lg navbar-light">
                                        <a class="d-xl-none d-lg-none" href="#">Hostel Portal</a>
                                        <button class="navbar-toggler" type="button" onclick="showmenu();" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="navbar-collapse collapse" id="navbarNav">
                                            <ul class="navbar-nav flex-column">
                                                <!-- --------------          HOSTEL OFFICE STAFF MENU START   --------------           -->


                                                <li class="nav-divider">
                                                    Hostel Office Menu
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="main.php"><i class="fas fa-home"></i>Home</a>
                                                </li>

                                                <!-- <li class="nav-item">
                                        <a class="nav-link" href="addstudents.php"><i class="fas fa-hand-paper"></i>Add Students</a>
                                    </li> -->

                                                <li class="nav-item">
                                                    <a class="nav-link" href="offroomchange.php"><i class="fas fa-hand-paper"></i>Room Change Requests</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="offcomplaints.php"><i class="fas fa-hand-paper"></i>Complaints</a>
                                                </li>

                                                <!-- <li class="nav-item">
                                        <a class="nav-link" href="cyreg.php"><i class="fa-solid fa-person-biking"></i>Requests</a>
                                    </li> -->
                                                <!-- --------------          PROJECT STAFF MENU ENDS   --------------           -->
                                                <!-- <li class="nav-divider"></li><li class="nav-item"></li><li class="nav-item">&nbsp;</li><li class="nav-item">&nbsp;</li><li class="nav-item">&nbsp;</li> -->

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
                                                <h2 class="pageheader-title">Hostel Office Dashboard</h2>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- end pageheader -->



                                    <!------------------------------- Change Room Request Table --------------------------->

                                    <!-- <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="text-right">   //Button trigger modal 
                            <a href="#" class="btn btn-primary" target="_blank">
                                    Change Room
                                </a> 
                            </h3>
                        </div>
                    </div> -->


                                    <!-- <div class="row">
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
                    </div> -->

                                    <!------------------------------- Hostel Shift Request Table --------------------------->

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h3 class="text-right">
                                                <!-- Button trigger modal -->
                                                <a href="vacatingform.pdf" class="btn btn-primary" target="_blank">
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
                                                                        <a href="javascript:void(0)" class="viewhostelshift" data-name='Kartik Kurupaswamy' data-email='NA' data-roll_reg_no='212123027' data-contact='9427686046' data-cur_room='Umiam~C~Third Floor~C-302' data-hosfrom='Umiam' data-hosto='Siang' data-shiftdate='2022-08-13' data-reason='My classes start at 8 in the morning and go upto 6pm in the evening. Commuting to hostels become hectic and I dont know to ride bicycle, I am unable to maintain my health.' data-hosfee='0' data-messfee='0' data-canteenfee='0' data-stanfee='0' data-juicefee='0' data-dsdcfee='0'><i class="fas fa-eye"></i>
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

                                    <!-- <div class="row">
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
</div> -->




                                <?php endif;
                                endif; ?>
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

                                function showcrreqmodal() {
                                    $("#changeRoomReqModal").modal("show");
                                }

                                function showhsreqmodal() {
                                    $("#updatehostelModal").modal("show");
                                }
                                function showchm() {
                                    $("#changeHM").modal("show");
                                }
                                $(".closebtn").click(function() {
                                    $("#changeHM,#changeRoomReqModal,#updatehostelModal,#viewhostelshift,#viewmshrequestM").find("textarea").val('').end().find("input[type=checkbox], input[type=radio],input[type=date]").prop("checked", "").end();
                                    $('#changeHM,#changeRoomReqModal,#updatehostelModal,#viewhostelshift,#viewmshrequestM').modal('hide');
                                    $(".addon").remove();
                                });
                            </script>
                        <?php elseif (
                        $_SESSION['postdata']['username'] == 'admin'
                    ) : ?>
                            <script>
                                $.redirectPost("/", {
                                    error: "Invalid Username"
                                })
                            </script>
                        <?php elseif ($_SESSION['postdata']['password']) : ?>
                            <script>
                                $.redirectPost("/", {
                                    error: "Invalid Password"
                                })
                            </script>
                        <?php else : ?>
                            <script>
                                $.redirectPost("/");
                            </script>
                        <?php endif; ?>
    </body>

    </html>
<?php
endif;
?>