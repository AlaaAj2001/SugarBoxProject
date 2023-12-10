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
    <title> Menu </title>
    <link rel="icon" href="Images/Picture2.png">
    <link rel ="stylesheet" href="menu.css">
</head>
<body>
<?php
if($f == 1){
    for($i=0; $i< $res->num_rows; $i++){
        $row = $res->fetch_object();
        if($row->email == $lEmail){
            $UserName = $row->FullName;
//            echo "<p> welcome $UserName </p>";
        }
    }
}
?>
<button class="orderbtn" onclick="location.href='order.php' " ><img src="Images/order.png" alt=""></button>

<div align="center"  class="chef"><img src="Images/Picture1%20(2).png" alt=""> </div>
<div dir="rtl" class="grid-container">
    <div class="grid-item item1">
        <table class= "t1"  dir="rtl">
            <tr>
                <td> <img class="img" src="Images/crepe.png" alt=""></td>
                <td> <h1 class="h1"> الكريب </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> كريب </td>
                <td style="width: 100px"></td>
                <td> 13 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> كريب عجين الشوكلاتة </td>
                <td style="width: 100px"></td>
                <td> 14 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td>  كريب ريد فيلفيت </td>
                <td style="width: 100px"></td>
                <td> 15 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> كريب رول </td>
                <td style="width: 100px"></td>
                <td> 17 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> فوتوتشيني كريب </td>
                <td style="width: 100px"></td>
                <td> 20 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td>  كريب ميكس </td>
                <td style="width: 100px"></td>
                <td> 20 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div dir="rtl" class="grid-item item2">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/hot.png" alt=""></td>
                <td> <h1 class="h1"> مشروبات ساخنة </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> شاي  </td>
                <td style="width: 100px"></td>
                <td> 4 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> قهوة  </td>
                <td style="width: 100px"></td>
                <td> 4 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> نيسكافيه  </td>
                <td style="width: 100px"></td>
                <td> 4 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> نيسكافيه مع حليب  </td>
                <td style="width: 100px"></td>
                <td> 6 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> كابتشينو  </td>
                <td style="width: 100px"></td>
                <td> 4 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> هوت نوتيلا  </td>
                <td style="width: 100px"></td>
                <td> 10 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> هوت لوتس  </td>
                <td style="width: 100px"></td>
                <td> 10 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> هوت بستاشيو  </td>
                <td style="width: 100px"></td>
                <td> 12 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item3">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/لقمة.png" alt=""></td>
                <td> <h1 class="h1"> لقمة </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> حجم صغير (12 قطعة)  </td>
                <td style="width: 100px"></td>
                <td> 12 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> حجم وسط (16 قطعة) </td>
                <td style="width: 100px"></td>
                <td> 14 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> حجم كبير (20 قطعة) </td>
                <td style="width: 100px"></td>
                <td> 15 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item4">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/pizza.png" alt=""></td>
                <td> <h1 class="h1"> بيتزا </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> حجم صغير  </td>
                <td style="width: 100px"></td>
                <td> 20 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> حجم وسط  </td>
                <td style="width: 100px"></td>
                <td> 30 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> حجم كبير  </td>
                <td style="width: 100px"></td>
                <td> 40 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item5">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/pancake.png" alt=""></td>
                <td> <h1 class="h1"> بان كيك  </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> بان كيك  </td>
                <td style="width: 100px"></td>
                <td> 17 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> بان كيك اكسترا </td>
                <td style="width: 100px"></td>
                <td> 20 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item6">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/donat.png" alt=""></td>
                <td> <h1 class="h1"> دونات </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> القطعة  </td>
                <td style="width: 100px"></td>
                <td> 6 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> دوناتس بوظة </td>
                <td style="width: 100px"></td>
                <td> 8 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item7">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/shoros.png" alt=""></td>
                <td> <h1 class="h1"> شوروز </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> شوروز  </td>
                <td style="width: 100px"></td>
                <td> 8 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item8">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/cockies.png" alt=""></td>
                <td> <h1 class="h1"> كوكيز </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> القطعة  </td>
                <td style="width: 100px"></td>
                <td> 5 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> الوجبة  </td>
                <td style="width: 100px"></td>
                <td> 17 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item9">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/milk.png" alt=""></td>
                <td> <h1 class="h1"> ميلك شيك </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> فانيلا  </td>
                <td style="width: 100px"></td>
                <td> 10 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> نوتيلا  </td>
                <td style="width: 100px"></td>
                <td> 12 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> أوريو  </td>
                <td style="width: 100px"></td>
                <td> 12 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> لوتس  </td>
                <td style="width: 100px"></td>
                <td> 13 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> بلوبري  </td>
                <td style="width: 100px"></td>
                <td> 15 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> فراولة  </td>
                <td style="width: 100px"></td>
                <td> 15 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> بستاشيو  </td>
                <td style="width: 100px"></td>
                <td> 15 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>

    <div class="grid-item item10">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/waffle.png" alt=""></td>
                <td> <h1 class="h1"> الوافل  </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> وافل  </td>
                <td style="width: 100px"></td>
                <td> 17 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> وافل ساندويش بالبوظة </td>
                <td style="width: 100px"></td>
                <td> 18 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> وافل ساندويش بالفواكة </td>
                <td style="width: 100px"></td>
                <td> 20 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> برج الوافل  </td>
                <td style="width: 100px"></td>
                <td> 20 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item11">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/knafeh.png" alt=""></td>
                <td> <h1 class="h1"> كنافة </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> القرطوس  </td>
                <td style="width: 100px"></td>
                <td> 4 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> بين نارين </td>
                <td style="width: 100px"></td>
                <td> 8 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
    <div class="grid-item item12">
        <table class= "t1" dir="rtl">
            <tr>
                <td> <img class="img" src="Images/additions.png" alt=""></td>
                <td> <h1 class="h1"> إضافات </h1></td>
            </tr>
        </table>
        <table dir="rtl" class="list">
            <tr>
                <td> <li></li> </td>
                <td> جوز هند محمّص، شوكلاتة شبس بيضاء، شوكلاتة شبس سوداء، حب قريش، لوتس مكسّر، فستق عبيد مكسّر، مارشميلو، m&m's  </td>
                <td style="width: 100px"></td>
                <td> 1 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
            <tr>
                <td> <li></li> </td>
                <td> فواكة موسمية، كندر، كندر بوينو، كندر كيك، أوريو، كيت كات، فليك </td>
                <td style="width: 100px"></td>
                <td> 2 </td>
                <td style="font-size: 30px"> ₪ </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
