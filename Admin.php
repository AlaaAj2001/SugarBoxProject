<?php

if( !( @$db = new mysqli('localhost', 'root', '', 'sugerbox_db')))
    die('Failed to connect to MySQL Database Server');
$qs1 = "SELECT * FROM `members`";
$qs2 = "SELECT * FROM `reservation`";
$qs3 = "SELECT * FROM `ordering`";
$qs4 = "SELECT * FROM `menu`";
$res1 = $db->query($qs1);
$res2 = $db->query($qs2);
$res3 = $db->query($qs3);
$res4 = $db->query($qs4);
?>

<!DOCTYPE html>
<html lang="Eng">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="icon" href="Images/Picture2.png">
    <link rel="stylesheet" href="Admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="S"><img src="Images/Picture22.png" alt=""></div>
<div id="mySidenav" class="sidenav">
    <a id="tab11" class="tablinks" onclick="opentab(Event, 'tab1')"> Show Members</a>
    <a id="tab22" class="tablinks" onclick="opentab(Event, 'tab2')"> Show Reservations </a>
    <a id="tab33" class="tablinks" onclick="opentab(Event, 'tab3')"> Show Orders</a>
    <a id="tab44" class="tablinks" onclick="opentab(Event, 'tab4')"> Show Menu</a>
    <a id="tab55" class="tablinks" onclick="opentab(Event, 'tab5')"> Add a new Admin</a>


</div>

<div align="center" style="width: 70%; margin-left: 250px; margin-bottom: -50px " > <img style="height: 150px; margin-top: -220px;" src="Images/output-onlinegiftools%20(2).gif" alt="">
</div>

<div id="tab1" class="tabcontent">
    <div class="container mt-3" style="overflow: scroll; height: 530px">
        <h2>Members Table</h2>
        <form action="Admin.php" method="post">
            <table class="table">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Type Of User</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(($res1->num_rows)==0 ){
                    echo '<tr><td colspan="4">No Rows Returned</td></tr>';
                }else{
                    for($i=0; $i< $res1->num_rows; $i++){
                        $row = $res1->fetch_object();
                        echo "<tr><td>$row->User_Id</td><td>$row->FullName</td><td>$row->email</td><td>$row->type_Of_User</td></tr>\n";
                    }
                ?>
                </tbody>
            </table>
            <?php
            }
                ?>
        </form>
    </div>
</div>

<div id="tab2" class="tabcontent">
    <div class="container mt-3" style="overflow: scroll; height: 530px">
        <h2> Reservations Table</h2>
        <form action="Admin.php" method="post">
            <table class="table">
                <thead>
                <tr>
                    <th>Reservation Num</th>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Day</th>
                    <th>Hour</th>
                    <th>Number Of People</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(($res2->num_rows)==0 ){
                    echo '<tr><td colspan="4">No Data Exist Yet</td></tr>';
                }else{
                for($i=0; $i< $res2->num_rows; $i++){
                    $row = $res2->fetch_object();
                    echo "<tr><td>$row->Id</td><td>$row->User_Id</td><td>$row->Name</td><td>$row->PhoneNum</td><td>$row->DaySelected</td><td>$row->HourSelected</td><td>$row->NumOfPerson</td></tr></>\n";
                }
                ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </form>
    </div>
</div>
<?php
$n = 0;
$e = 0;
$p = 0;
if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['pass'])){
    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['pass'];
    $connection = new mysqli('localhost', 'root', '', 'sugerbox_db');
    $sqll = mysqli_prepare($connection,"INSERT INTO `members` (`User_Id`,`FullName`, `email`, `pass`, `type_Of_User`) VALUES ('', '".$n."', '".$e."', '".$p."', 'Admin')");
    if($sqll !== false){
        if(mysqli_stmt_execute($sqll)){
            echo '<script> alert("A new admin has been added successfully")</script>';
        }else {
            echo mysqli_stmt_error($sqll);
        }
    }else {
        echo mysqli_error($connection);
    }
    echo '<script> alert("A new admin has been added successfully")</script>';
//    header('location: Admin.php');
}
?>
<div id="tab5" class="tabcontent">
    <div class="hero">
        <form action="Admin.php" method="post">
            <h2 align="center" style="margin-top: 20px;  margin-bottom: 20px"> Add A new Admin </h2>
            <div class="row">
                <div class="input-group">
                    <input type="text" id="name" name="name" required>
                    <label for="name" ><i class="fas fa-user"></i> Admin Name </label>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <input type="email" id="email" name="email" required>
                    <label for="email" ><i class="fas fa-envelope"></i>Email Address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <input type="password" id="pass" name="pass" required>
                    <label for="pass" ><i class="fas fa-user"></i> Admin Pass </label>
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <button type="submit">Add<i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="clearfix"></div>
<div id="tab4" class="tabcontent">
    <div class="container mt-3" style="overflow: scroll; height: 530px">
        <h2> The Menu</h2>
            <form action="Admin.php" method="post">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Type Num</th>
                        <th>Type Name</th>
                        <th>Type Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(($res4->num_rows)==0 ){
                        echo '<tr><td colspan="4">No Data Exist Yet</td></tr>';
                    }else{
                    for($i=0; $i< $res4->num_rows; $i++){
                        $row = $res4->fetch_object();
                        echo "<tr><td>$row->Type_Id</td><td>$row->TypeName</td><td>$row->TypePrice</td></tr></>\n";
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </form>
        </div>
    </div>


<div id="tab3" class="tabcontent">
    <div class="container mt-3">
        <h2> Orders Table </h2>
        <form action="Admin.php" method="post">
            <table class="table">
                <thead>
                <tr>
                    <th>Order Num</th>
                    <th>User ID</th>
                    <th>Phone Number</th>
                    <th>Orders</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(($res3->num_rows)==0 ){
                    echo '<tr><td colspan="4">No Data Exist Yet</td></tr>';
                }else{
                for($i=0; $i< $res3->num_rows; $i++){
                    $row = $res3->fetch_object();
                    echo "<tr><td>$row->Order_Id</td><td>$row->User_Id</td><td>$row->PhoneNumber</td><td>$row->orders</td></tr></>\n";
                }
                ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </form>
    </div>
</div>

<script>
    function opentab(evt, TabName) {
        let i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(TabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

</body>
</html>

