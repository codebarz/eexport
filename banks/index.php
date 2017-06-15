<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bank Portal | Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css" type="text/css" media="screen">

    <link rel="stylesheet" href="../css/banks.css" type="text/css" media="screen">

    <link rel="stylesheet" href="fonts/font-awesome.css">

    <script src="js/popup.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="../js/msg.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/cycle2.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/banks.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sanchez" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mrs+Sheppards" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet">
</head>
<body>
  <div class="reg_area_b">
    <div class="bn_header">
        <p><img src="../images/close.png"></p>
    </div>
      <div class="reg_form">
          <form action="../bank_login.php" method="post" enctype="multipart/form-data">
            <p>Please Login</p>
              <input type="email" name="b_uname" id="b_uname" placeholder="Email Address">
              <input type="password" name="b_pword" id="b_pword" placeholder="password">
              <input type="submit" name="b_login" id="b_login" value="Login">
              <p>Forgot password? or <a href="#">Create an account</a></p>
      </div>
      <!-- <div class="acc_form">
          <form action="../bank_reg.php" method="post" enctype="multipart/form-data">
            <p>Create an Account</p>
            <p style="font-size: 12px; text-align: left">*Please fill all fields carefully</p>
              <input type="text" name="b_acc_name" id="b_acc_name" placeholder="Bank Name">
              <input type="text" name="b_acc_r_num" id="b_acc_r_num" placeholder="RC Nunmber"><br>
              <input type="email" name="b_acc_em" id="b_acc_em" placeholder="Email Adddress">
              <input type="text" name="b_acc_add" id="b_acc_add" placeholder="Bank Address"><br>
              <input type="password" name="b_acc_pword" id="b_acc_pword" placeholder="Password">
              <input type="text" name="b_acc_r_pword" id="b_acc_r_pword" placeholder="Retype password">
              <div class="b_img_prev"><img id="b_img_prev" src=""></div><br>
              <label for="b_c_logo">Upload Company logo</label><span>400px X 400px (for logo size)</span>
              <input type="file" name="b_c_logo" id="b_c_logo" onchange="logoPrev()" placeholder="Company Logo"><br>
              <div class="b_ban_prev"><img id="b_ban_prev" src=""></div><br>
              <label for="b_c_ban">Upload Company Banner</label><span>900px X 400px (for banner size)</span>
              <input type="file" name="b_c_ban" onchange="banPrev()" id="b_c_ban" placeholder="Company Banner">
              <textarea name="bank_brief" id="bank_brief" rows="5" placeholder="Brief Description About The Bank"></textarea>
              <div class="counter"></div>
              <textarea name="bank_req" id="bank_req" rows="10" placeholder="Bank Requirements For Export Funding"></textarea>
              <input type="submit" name="sub_b_reg" value="Submit" id="sub_b_reg">
          </form>
      </div> -->
  </div>
  </div>
<div class="b_head">
    <a class="login_btn" href="#">Login</a>
    <a class="signup_btn" href="#">Create an Account</a>
</div>
<div class="ft_img">
  <div id="slideshow" class="cycle-slideshow"
       data-cycle-fx = "fade"
       data-cycle-speed = "600"
       data-cycle-timeout = "3000"
       data-cycle-pager = "#pager"
       data-cycle-next = "#next"
       data-cycle-prev = "#prev"
       data-cycle-manual-fx = "scrollHorz"
       data-cycle-manual-speed = "400"
       data-cycle-pager-fx = "fade">
       <img src="../images/banknote.jpg">
       <img src="../images/golds.jpg">
       <img src="../images/bnk.jpg">
     </div>
</div>
<!-- <h1 class="welcome_msg">The First Export/Import Database For Banks</h1> -->
<div class="clients"></div>
<div class="row">
  <div class="row_cols">
        <div class="row_cols_img"></div>
        <div class="row_cols_txt">
            <h2>ACESS TO LAGRE EXPORTER/IMPORTER DATABASE</h2>
        </div>
  </div>
  <div class="row_cols">
    <h1 style="color: #212121">We have a large database of users in the Export/Import business</h1>
    <p style="color: #212121">
        We got you covered. Easy access to our clients looking for laons to run their import/export businesses.
        Simple to use interface for you, upload you bank's requirement for loaning and be assured wide spread views.
          <br>
    </p>
        <h5 style="color: #212121">- Create an account<br>
        - Upload required information<br>
        - Upload your requirements for loans.<br></h5>
        <br>
        <a class="crt_acc" href="">Create an Account</a>
  </div>
</div>
<div class="row" style="background: radial-gradient(circle closest-corner at 50% 50%, #33753E 0%, #003832 80%);">
  <div class="row_cols">
      <br><br><div class="row_cycle"></div>
      <h1>Lightning fast messaging system for you and your clients</h1>
      <p>Break the gap with you and your clients with the chat system available with our accounts.
      Clients can now send message of inquiry to you the bank.<br><br>

      <strong>- Its fast</strong><br>
      <strong>- Its Reliable</strong></p>
  </div>
  <div class="row_cols">
    <div class="row_cols_img_2"></div>
    <div class="row_cols_txt">
        <h2 style="color: #fff">TALK DIRECTLY WITH YOUR CUSTOMERS IN REALTIME</h2>
    </div>
  </div>
</div>
<div class="growth">
  <h1>Its Really All About Growth...</h1>
</div>
<div class="sm_row">
  <div class="sm_row_col_2" style="background: radial-gradient(circle closest-corner at 50% 50%, #33753E 0%, #003832 80%);">
    <div class="xl_row_col">
        <div class="xl_sm_row_col">
            <div class="row_ft">
                <div class="row_ft_img">
                    <img src="../images/they learn.png">
                </div>
                <p>THEY LEARN</p>
            </div>
            <div class="row_ft">
              <div class="row_ft_img">
                  <img src="../images/we connect.png">
              </div>
              <p>WE CONNECT</p>
            </div>
            <div class="row_ft">
              <div class="row_ft_img">
                  <img src="../images/they grow.png">
              </div>
              <p>THEY GROW</p>
            </div>
        </div>
        <div class="xl_sm_row_col mision">
            <p>"We are here to get you unlimited access to all of Nigeria's
            high quality exportable products :)"</p>
        </div>
    </div>
  </div>
  <div class="sm_row_col_2">
    <div class="sm_row_col">
        <h4>USEFUL LINKS</h4>
        <ul>
            <li><a href="#">Visit main site</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
        </ul>
    </div>
    <div class="sm_row_col">
        <div class="sm_row_slide">
          <div id="slideshow" class="cycle-slideshow"
               data-cycle-fx = "fade"
               data-cycle-speed = "600"
               data-cycle-timeout = "3000"
               data-cycle-pager = "#pager"
               data-cycle-next = "#next"
               data-cycle-prev = "#prev"
               data-cycle-manual-fx = "scrollHorz"
               data-cycle-manual-speed = "400"
               data-cycle-pager-fx = "fade">
               <img src="../images/banknote.jpg">
               <img src="../images/banking.jpg">
             </div>
        </div>
    </div>
  </div>
</div>
<div class="footer">
    <div class="fot_logo">
        <img src="../images/nexport.png">
    </div>
    <div class="fot_smi_b">
        <div class="copy">
            <p>&copy; 2017 Nigeriaeexport. All Rights Reserved. <a href="">Privacy Policy |</a><a href=""> Terms & Conditions.</a></p>
        </div>
        <div class="smi_area">
            <ul>
                <li><a href=""><img src="../images/fot_fb_b.png"></a></li>
                <li><a href=""><img src="../images/fot_tw_b.png"></a></li>
                <li><a href=""><img src="../images/fot_ln_b.png"></a></li>
                <li><a href=""><img src="../images/fot_ig_b.png"></a></li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
function updateCounter() {
    var remaining = 200 - $('#bank_brief').val().length;
    $('.counter').text(remaining + ' characters remaining.');
    if (remaining <= 0) {
        $('.counter').css("color", "red");
        $('#bank_brief').keypress(function (e) {
            e.preventDefault();
        });
    } else {
        $('.counter').css("color", "#999");
        $('#bank_brief').unbind('keypress');
    }
}
function logoPrev(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#b_img_prev').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#b_c_logo').change(function () {
    logoPrev(this);
});
function banPrev(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#b_ban_prev').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#b_c_ban').change(function () {
    banPrev(this);
});
$(document).ready(function() {
  updateCounter();
  $('#bank_brief').on("change keyup", function (e) {
      updateCounter();
  });
  $('.bn_header p img').click(function() {
      $('.reg_area_b').fadeOut('slow');
  });
});
</script>
</body>
</html>
