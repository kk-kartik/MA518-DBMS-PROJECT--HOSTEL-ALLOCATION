<?php

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
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
    <title>Student Affairs Portal</title>
    <link rel="icon" href="assets/images/iitg.ico" type="image/icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/099dc0ed07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
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
<?php 
    if (isset($_SESSION['postdata']['submit']) && ($_SESSION['postdata']['username'] == $_SESSION['postdata']['password'])):
    
?>
    <!-- main wrapper -->

    <div class="dashboard-main-wrapper">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-white fixed-top">

            <div class="dashboard-nav-brand">
                <a class="dashboard-logo" href="https://www.iitg.ac.in/"><img src="assets/images/iitg.ico" alt="IITG Logo" style="max-width:50%;"></a>
            </div>

            <button style="border: none; border-radius: 4px; margin-left: 10rem;" class="btn-warning opennoticemodal btn-xs" data-toggle="modal" data-target="#requestCountModal">
                <span class="fa-stack">
                    <i class="fa fa-bell fa-stack-1x fa-inverse request-notification" data-count="0"></i>
                </span>
            </button>

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
                        <button class="nav-link nav-user-img" onClick="show();" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/logout.jpg" alt="" class="user-avatar-md rounded-circle"></button>
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
                    <a class="d-xl-none d-lg-none" href="#">Student Affairs Portal</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>

                    <!-- <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav flex-column"> -->
                    <script>
                        // $(document).ready(function() {
                        //     $("a").each(function() {
                        //         if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
                        //             $(this).addClass('activeMenuItem');
                        //         }
                        //     });
                        // });
                        
                        function show() {
                            
                            document.getElementsByClassName('nav-user-img')[0].ariaExpanded=true;
                            $('.nav-user').toggleClass('show');
                            $('.nav-user-dropdown').toggleClass('show');
                        }
                    </script>
                    <?php
elseif($_SESSION['postdata']['username']=="admin"):
    ?>
    <script>
        $.redirectPost("/",{error:"Invalid Username"})
    </script>
    <?php
    elseif($_SESSION['postdata']['password']):
        ?>
        <script>
        $.redirectPost("/",{error:"Invalid Password"})
    </script>
        <?php
else: ?>
<script>
    $.redirectPost("/");
</script>
<?php
endif;
?>
</body>
</html>
<?php
unset($_SESSION['postdata']);
endif;
?>