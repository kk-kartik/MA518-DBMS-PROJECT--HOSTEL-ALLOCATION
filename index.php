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
?>
<!DOCTYPE html>
<html lang="en" oncontextmenu="return false;">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Student Hostel Portal</title>
    <link rel="icon" href="assets/images/iitg.ico" type="image/icon">
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <link href="css/circular-style.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/fontawesome-all.css" />
    </script>
    <style>
      html,
      body {
        height: 100%;
        background-image: url("https://iitg.ac.in/ccd/assets/img/iitg.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-color: rgba(07, 11, 02, 0.5);
 background-blend-mode: soft-light;
      }

      body {
        display: -ms-flexbox;
        display: flex;

        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
      }
    </style>

    <script type="text/javascript">
      window.history.forward();
      function noBack() {
        window.history.forward();
      }
    </script>
  </head>

  <body
    onload="noBack();"
    onpageshow="if (event.persisted) noBack();"
    onunload=";"
  >
    <noscript>
      <div class="alert" style="width: 100%; margin-left: 1%; margin-top: 1%">
        Javasript is currently disabled by this browser. Please enable
        JavaScript for full functionality. Steps of
        <a href="http://www.enable-javascript.com/" target="_blank"
          >&nbsp;Enabling and disabling JavaScript.</a
        >
      </div>
    </noscript>

    <div class="splash-container">
      <div class="card">
        <div class="card-header text-center">
          <a href="https://www.iitg.ac.in" target="_blank"
            ><img class="logo-img" src="assets/images/iitg.ico" alt="logo"
          /></a>
          <span class="splash-description">Student Hostel Portal</span>
          <?php if (array_key_exists('postdata', $_SESSION) && isset($_SESSION['postdata']['error'])) : ?>
          <div class="p-2">
                    <div class="alert alert-danger" role="alert">
			<?php echo $_SESSION['postdata']['error']; unset($_SESSION['postdata']);
      ?>

                    </div>
                </div>
                <?php endif;?>
        </div>

        <div class="card-body">
          <form action="main.php" method="POST">
            <div class="form-group">
              <input
                class="form-control form-control-lg"
                id="username"
                name="username"
                type="text"
                placeholder="IITG Username"
                autocomplete="off"
                required
              />
            </div>
            <div class="form-group">
              <input
                class="form-control form-control-lg"
                id="password"
                name="password"
                type="password"
                placeholder="Internet/ERP Password"
                required
              />
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">
              Sign in
            </button>
          </form>
        </div>
        <div class="card-footer bg-white p-0">
          <div class="card-footer-item card-footer-item-bordered">
            <a
              href="changepwd.php"
              target="_blank"
              class="footer-link"
              >Change Password</a
            >
          </div>
          <div class="card-footer-item card-footer-item-bordered">
            <a
              href="reset.php"
              target="_blank"
              class="footer-link"
              >Reset Password</a
            >
          </div>
        </div>
      </div>
      <!-- <span class="splash-container card-footer-item mt-0 pt-0 mb-0 mt-0" style="color: #9497a3;"> MA518- DBMS Project 2022<br> KARTIK KURUPASWAMY - 212123027 <br> VICTOR IMMANUVEL S - 212123057</span>
      <span class="splash-container card-footer-item mt-0 pt-0 mb-0 mt-0" style="color: #9497a3;"
        >We strongly recommend to use updated browsers only</span
      ><br /><img
        src="assets/images/main-desktop-browser-logos.png"
        width="40%"
        height="40%"
        class="center"
      /> -->
</div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
