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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservations</title>
    <link rel="icon" href="Images/Picture2.png">
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <link rel="stylesheet" href="reservations.css">
</head>
<body>
<?php
$uid = 0;
if($f == 1){
    for($i=0; $i< $res->num_rows; $i++){
        $row = $res->fetch_object();
        if($row->email == $lEmail){
            $UserName = $row->FullName;
            $uid = $row->User_Id;

//            echo "<p> welcome $UserName </p>";
        }
    }
}

$D = 0;
$H = 0;
$ress = 0;
$sum = 0;
@$db= new mysqli('localhost', 'root', '', 'sugerbox_db');
$qs = "SELECT * FROM `reservation`";
$ress = $db->query($qs);
for($i=0; $i< $ress->num_rows; $i++) {
    $row = $ress->fetch_object();
}

$phone = 0;
$Day = 0;
$Hour = 0;
$NumOfper = 0;
if(isset($_POST['uphone']) and isset($_POST['days']) and isset($_POST['hours']) and isset($_POST['NumOfPersons'])) {
    $phone = $_POST['uphone'];
    $Day = $_POST['days'];
    $Hour = $_POST['hours'];
    $NumOfper = $_POST['NumOfPersons'];
    $conn = new mysqli('localhost', 'root', '', 'sugerbox_db');
    $sql = mysqli_prepare($conn, "INSERT INTO `reservation`(`Id`, `User_Id`, `Name`, `PhoneNum`, `DaySelected`, `HourSelected`, `NumOfPerson`) VALUES ('','" . $uid . "','" . $UserName . "','" . $phone . "','" . $Day . "','" . $Hour . "','" . $NumOfper . "')");
    if ($sql !== false) {
        if (mysqli_stmt_execute($sql)) {
//            echo "new reservation successfully";
        } else {
            echo mysqli_stmt_error($sql);
        }
    } else {
        echo mysqli_error($conn);
    }

    echo '<script>alert("new reservation successfully")</script>';
//    header('location: reservations.php');
}
?>
<section class="banner">
    <h2>Book Your Table Now</h2>
    <div class="card-container">
        <div class="card-img">

        </div>

        <div class="card-content">
            <h3>Reservation</h3>
            <form action="reservations.php" method="post">
                <div class="form-row">
                    <select name = "days">
                        <option value = "day-select"> Select Day </option>
                        <option value = "Sunday"> Sunday </option>
                        <option value = "Monday"> Monday </option>
                        <option value = "Tuesday"> Tuesday </option>
                        <option value = "Wednesday"> Wednesday </option>
                        <option value = "Thursday"> Thursday </option>
                        <option value = "Friday"> Friday </option>
                        <option value = "Saturday"> Saturday </option>
                    </select>

                    <select name="hours">
                        <option value = "hour-select"> Select Hour </option>
                        <option value = "10:00 AM"> 10:00 AM </option>
                        <option value = "11:00 AM"> 11:00 AM</option>
                        <option value = "12:00 PM"> 12:00 PM</option>
                        <option value = "1:00 PM"> 1:00 PM </option>
                        <option value = "2:00 PM"> 2:00 PM </option>
                        <option value = "3:00 PM"> 3:00 PM </option>
                        <option value = "4:00 PM"> 4:00 PM</option>
                        <option value = "5:00 PM"> 5:00 PM</option>
                        <option value = "6:00 PM"> 6:00 PM</option>
                        <option value = "7:00 PM"> 7:00 PM</option>
                        <option value = "8:00 PM"> 8:00 PM</option>
                        <option value = "9:00 PM"> 9:00 PM</option>
                    </select>
                </div>

                <div class="form-row">
                    <input type="text"
                           value = "<?php echo $UserName?>" readonly>
                    <input name="uphone" type="text"
                           placeholder = "PhoneNumber">
                </div>

                <div class="form-row">
                    <input name="NumOfPersons" type="number"
                           placeholder = "How many persons?" min = "1" max = "25">
                    <input type="submit" value= "Book Table">
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>
