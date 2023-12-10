<?php
$lEmail = 0;
$f = 0;
$res = 0;
$UserName = 0;
session_start();
if(isset($_SESSION['Email'])) {
    if ($_SESSION['Email'] == 0) {
        header('location: beforelogin.php');
    }
    $lEmail = $_SESSION['Email'];
    @$db = new mysqli('localhost', 'root', '', 'sugerbox_db');
    $qs = "SELECT * FROM `members`";
    $res = $db->query($qs);
    $f = 1;
}else {
    header('location: beforelogin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Sugar Box </title>
    <link rel="icon" href="Images/Picture2.png">
    <link rel ="stylesheet" href="BackGroundStyle.css">
    <link rel ="stylesheet" href="slideimgs.css">
    <link rel ="stylesheet" href="buttons.css">
    <style>
    </style>

</head>
<body>
<?php
if($f == 1){
    for($i=0; $i< $res->num_rows; $i++){
        $row = $res->fetch_object();
                if($row->email == $lEmail){
                    $UserName = $row->FullName;
//        echo "<p> welcome $UserName </p>";
                }
    }
}
?>
<header>
    <div>
        <ul>
            <li><a class="logo"> <img src="Images/Picture2.png" alt="" style=" height:120px; width:120px">  </a></li>
            <li><a href="afterlogin.php#slides" class = "cu"> HOME  </a></li>
            <li><a href="menu.php" class = "cu"> MENU  </a></li>
            <li><a href="reservations.php" class = "cu"> RESERVATIONS </a></li>
            <li><a href="afterlogin.php#location" class = "cu"> LOCATION </a></li>
            <li><a href="afterlogin.php#about" class = "cu"> ABOUT US  </a></li>
            <li><a href="https://www.instagram.com/sugarboxofficial/" id ="Ins"> <img src="Images/insta.png" alt=""> </a></li>
            <li><a href="https://www.facebook.com/sugarboxofficial" id ="Fac"> <img src="Images/face.png" alt=""> </a></li>
            <li><button name="logout" type="button" onclick="location.href='beforelogin.php'" style=" border-radius:50%; background-color: transparent; width: auto;"><img src="Images/icons8-logout-rounded-left-35.png" alt=""></button></li>
        </ul>
        <div style="float: bottom" id='login-form' class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button' onclick='login()' class='toggle-btn'>Log In</button>
                    <button type='button' onclick='register()' class='toggle-btn'>Register</button>
                </div>
                <form id='login' class='input-group-login'>
                    <label>
                        <input type='text' class='input-field' placeholder='Email Address' required >
                    </label>
                    <label>
                        <input type='password' class='input-field' placeholder='Password' required>
                    </label>
                    <button type='submit' class='submit-btn'>Log in</button>
                </form>
                <form id='register' class='input-group-register'>
                    <label>
                        <input type='text' class='input-field' placeholder='Full Name' required>
                    </label>
                    <label>
                        <input type='email' class='input-field' placeholder='Email Address' required>
                    </label>
                    <label>
                        <input type='password' class='input-field' placeholder='Password' required>
                    </label>
                    <label>
                        <input type='password' class='input-field' placeholder='Confirm Password'  required>
                    </label>
                    <label>
                        <input type='checkbox' class='check-box'>
                    </label><span class="span1">I agree to the terms and conditions</span>
                    <button type='submit' class='submit-btn'>Register</button>
                </form>
            </div>
        </div>
    </div>
</header>
<script>
    var x=document.getElementById('login');
    var y=document.getElementById('register');
    var z=document.getElementById('btn');
    function register()
    {
        x.style.left='-400px';
        y.style.left='50px';
        z.style.left='110px';
    }
    function login()
    {
        x.style.left='50px';
        y.style.left='450px';
        z.style.left='0px';
    }
</script>
<script>
    var modal = document.getElementById('login-form');
    window.onclick = function(event)
    {
        if (event.target === modal)
        {
            modal.style.display = "none";
        }
    }
</script>
<script type="text/javascript">
    window.addEventListener("scroll", function (){
        let header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })

</script>

<div id="slides" style=" z-index: -1; margin-top: 0" class="slideshow-container" >

    <div class="mySlides fade">
        <img src="Images/1.jpg" style="width:100%" alt="">
    </div>

    <div class="mySlides fade">
        <img src="Images/Picture4.jpg" style="width:100%" alt="">
    </div>

    <div class="mySlides fade">
        <img src="Images/Picture6.jpg" style="width:100%" alt="">
    </div>
</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>


<div id="about" class="info">

    <h1 align="CENTER"><label> ABOUT US </label></h1>
    <p align="CENTER">Sugar Box specializes in selling sweets such as: Crepes, Waffles, Waffle sticks, Donuts, Cake, Cookies, Pancakes, Hot drinks and Milkshakes.</p>
</div>

<div class="grid-container">
    <div class="header"><img src="Images/ezgif.com-gif-maker%20(1).gif" alt=""></div>

    <div class="left"><img src="Images/ramadansamll1.jpg" alt=""></div>
    <div class="middle"><img src="Images/ramadan1.jpg" alt=""></div>
    <div class="right"><img src="Images/ramadanbig1.jpg" alt=""></div>
    <div class="bottomm"><button class="button1" onclick="location.href='menu.php' "><span> Menu </span></button></div>
    <div id="location" class="footer">
        <h1> Our Location </h1>
        <a href="https://www.google.com/maps/place/Sugar+Box/@32.2252237,35.2264387,63m/data=!3m1!1e3!4m5!3m4!1s0x151ce1ef99e222ef:0x78678ac968691431!8m2!3d32.2252818!4d35.226403"> Nablus, Rafidia, Aladdin Street next to Berlin Restaurant <br><br>
        </a>
        <img src="Images/location.gif" alt="" style="width: 50%">
    </div>
</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" aa", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " aa";
        setTimeout(showSlides, 2500); // Change image every 1 seconds
    }
</script>
</body>
</html>
