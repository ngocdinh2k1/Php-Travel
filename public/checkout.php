<?php
    session_start();
    error_reporting(0);

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    $connect = mysqli_connect($serverName, $username, $password, $mydb);

    $did = $_SESSION["tourId"];
    $date = $_SESSION["date"];
    $guest = $_SESSION["guest"];
    $tour = $_SESSION["tour"];



    $fullname = $email = $phone = $address = $NguoiLon = $TreEm = $TreNho = $room = $sex = $message = $adust = $baby = $children = '';
    $CountPerson = $total = 0;
    if (isset($_POST["submitt"])){
        $date = $_SESSION["date"];
        $fullname = isset($_POST["Fullname"]) ? $_POST["Fullname"] : "";
        $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
        $phone = isset($_POST["Telephone"]) ? $_POST["Telephone"] : "";
        $address = isset($_POST["Address"]) ? $_POST["Address"] : "";
        $dateOfBirth = isset($_POST["dateof"]) ? $_POST["dateof"] : "";
        $room = isset($_POST["room"]) ? $_POST["room"] : "";

        $sex = isset($_POST["sex"]) ? $_POST["sex"] : "";
        $message = isset($_POST["note"]) ? $_POST["note"] : "";
        $adust = $_POST["NguoiLon"];
        $baby = ($_POST["TreEm"]);
        $children = $_POST["TreNho"];
        $adust = $_POST["NguoiLon"];
        $baby = $_POST["TreEm"];
        $children = $_POST["TreNho"];
        $CountPerson = $adust + $baby + $children;
        $total = $adust*9290000 + $baby*5574000 + $children*3700000;

        $_SESSION['name'] = $fullname;
        $_SESSION['email'] = $email;
        $sqltour = "INSERT INTO tbl_booking(PackageId, FullName, UserEmail, FromDate, dateOfBirth, Phone, Address, NguoiLon, TreEm, TreNho, Room, Sex, Message, price, Confirm)
        values ($did,'$fullname','$email','$date','$dateOfBirth','$phone','$address',$adust,$baby,$children,$room,'$sex','$message', $total, 'Pending')";
        mysqli_query($connect,$sqltour);

    }   
    if(isset($_POST['submit']))
    {
        $fullname = $_SESSION['name'];
        $email = $_SESSION['emai'];
        $queryS = "select BookingId from tbl_booking where FullName = '$fullname' and UserEmail = '$email'";
        $kq = mysqli_query($connect, $queryS);
        $row  = mysqli_fetch_array($kq);

        $BkId = $row['BookingId'];

        $inforNguoiLon = isset($_POST["nguoilon"]) ? $_POST["nguoilon"] : "";
        $inforTreNho = isset($_POST["trenho"]) ? $_POST["trenho"] : "";
        $inforTreEm = isset($_POST["treem"]) ? $_POST["treem"] : "";
        
        $sqlinfor1 = "INSERT INTO tbl_tourist(Fullname,Age, BookingId) values('$inforNguoiLon',12,$BkId)";
        $sqlinfor2 = "INSERT INTO tbl_tourist(Fullname,Age, BookingId) values('$inforTreNho',15,$BkId)";
        $sqlinfor3 = "INSERT INTO tbl_tourist(Fullname,Age, BookingId) values('$inforTreEm',1,$BkId)";
        mysqli_query($connect,$sqlinfor1);
        mysqli_query($connect,$sqlinfor2);
        mysqli_query($connect,$sqlinfor3);
    }

    



    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.css" />
    <link rel="stylesheet" href="../src/css/tour-du-lich.css">
    <link rel="stylesheet" href="../src/css/thanhtoan.css">
    <link rel="stylesheet" href="../src/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../src/css/hide.js">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="link ">
                <p>Th??ng tin chi ti???t v??? tour du l???ch</p>
            </section>
            <section class="product">
                <div class="product-image">
                    <img src='../pimages/<?php echo $tour["PackageImage"]; ?>' alt="">
                </div>
                <div class="product-content">
                    <div class="rate">
                        <span>9</span>
                        <h4>R???t t???t</h4>
                    </div>
                    <div class="title">
                        <?php echo (isset($tour["PackageName"]) ? $tour["PackageName"] : ""); ?>
                    </div>
                    <div class="entry">
                        <span>Kh???i h??nh: <b>
                                <?php
                                $date = date("j M Y", strtotime($date));
                                echo ($date); 
                            ?>
                            </b>
                        </span>
                        <span>Th???i gian:
                            <b><?php echo ($tour["PackageTime"]); ?></b>
                        </span>
                        <span>N??i kh???i h??nh: <b>
                                <?php echo ($tour["PackageLocation"]);?>
                            </b></span>
                        <span> S??? ch??? c??n nh???n: <b><?php echo(6 - $guest) ?></b></span>
                    </div>
                </div>
            </section>
            <section class="total">
                <form class="col-md-8 col-12 left" style="width: 100%;" method="post" id="form">
                    <section style="display: block; justify-content: center; gap: 50px;">
                        <div>
                            <h2>Nh???p th??ng tin ng?????i tham gia </h2>
                            <div class="nguoilon">
                                <h3>Th??ng tin li??n l???c ng?????i l???n (>12 tu???i)</h3>
                                <label for="">Vi???t th??ng tin c???a t???ng ng?????i theo c??ng th???c th???c h??? t??n - tu???i - gi???i
                                    t??nh</label><br>
                                <textarea style="border: 1px solid black;" name="nguoilon" id="" cols="100"
                                    rows="5"></textarea>
                            </div>
                            <div class="trenho">
                                <h3>Th??ng tin li??n l???c tr??? nh??? (5-11 tu???i)</h3>
                                <label for="">Vi???t th??ng tin c???a t???ng ng?????i theo c??ng th???c th???c h??? t??n - tu???i - gi???i
                                    t??nh</label><br>
                                <textarea style="border: 1px solid black;" name="trenho" id="" cols="100"
                                    rows="5"></textarea>
                            </div>
                            <div class="treem">
                                <h3>Th??ng tin li??n l???c tr??? em(< 5 tu???i)</h3>
                                        <label for="">Vi???t th??ng tin c???a t???ng ng?????i theo c??ng th???c th???c h??? t??n - tu???i -
                                            gi???i
                                            t??nh</label><br>
                                        <textarea style="border: 1px solid black;" name="treem" id="" cols="100"
                                            rows="5"></textarea>
                            </div>
                        </div>
                        <section class="col-md-4 col-12 right">
                            <div class="group-checkout">
                                <h3>T??m t???t chuy???n ??i</h3>
                                <p class="package-title">Tour tr???n g??i <span> (<?php echo ($guest) ?> kh??ch)</span></p>
                                <div class="product-1">
                                    <div class="product-image-1">
                                        <img src='../pimages/<?php echo $tour["PackageImage"]; ?>' class="img-fluid"
                                            alt="image">
                                    </div>
                                    <div class="product-content-1">
                                        <p class="title-1"><?php echo($tour["PackageName"]); ?></p>
                                    </div>
                                </div>
                                <div class="go-tour">
                                    <div class="start">
                                        <i class="fal fa-calendar-minus"></i>
                                        <div class="start-content">
                                            <h4>B???t ?????u chuy???n ??i</h4>
                                            <p class="time"><?php echo($date) ?></p>
                                            <p class="from"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="detail">
                                    <table style="width: 100%;">
                                        <tbody style="width:425px;">
                                            <tr>
                                                <th class="l1">H??nh kh??ch</th>
                                                <th class="l2 text-right">
                                                    <i class="fal ti-user"
                                                        id="AmoutPerson"><?php echo $CountPerson;  ?></i>
                                                    <p class="add-more"></p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="l1">S??? ph??ng</th>
                                                <th class="l2 text-right">
                                                    <i class="fal ti-user" id="AmoutRoom">
                                                        <?php
                                                    echo $room;
                                                    ?>
                                                    </i>
                                                    <p class="add-more"></p>
                                                </th>
                                            </tr>
                                            <tr class="pt">
                                                <td>Ng?????i l???n</td>
                                                <td class="t-price text-right" id="txtPhuThu">
                                                    <?php
                                                    echo $adust . 'x 9.290.000??'
                        
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tr??? nh???</td>
                                                <td class="t-price text-right" id="GiamGiaLastMinute">
                                                    <?php
                                                    echo $baby . 'x 5.574.000??'
                        
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tr??? em</td>
                                                <td class="t-price text-right" id="GiamGiaLastMinute">
                                                    <?php
                                                    echo $children . 'x 3.700.000??'
                        
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr class="total-1">
                                                <td>T???ng c???ng</td>
                                                <td class="t-price text-right" id="TotalPrice">
                                                    <?php
                        
                                                echo(number_format($total, 0, ',', '.') . " VN??");
                        
                                            ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </section>
                    <div class="order" style="width: 100%;">
                        <button type="submit" class="btn btn-primary btn-order" name="submit">Thanh to??n</button>
                    </div>

                </form>
            </section>
        </div>
    </div>
    <script type="text/javascript">
    var adultPlug = document.querySelector(".adust-plus");
    var per = document.querySelector(".form-control.adust").value;
    let total = Number(per);
    adultPlug.onclick = function() {
        total = total + 1;
        document.querySelector(".form-control.adust").value = total;
    }
    var adultMinus = document.querySelector(".adust-minus");
    adultMinus.onclick = function() {
        if (total <= 0) total = total;
        else total = total - 1;
        document.querySelector(".form-control.adust").value = total;
    }

    var childrenPlug = document.querySelector(".children-plus");
    var chil = document.querySelector(".form-control.children").value;
    let totalChil = Number(chil);
    childrenPlug.onclick = function() {
        totalChil = totalChil + 1;
        document.querySelector(".form-control.children").value = totalChil;
    }
    var childrenMinus = document.querySelector(".children-minus");
    childrenMinus.onclick = function() {
        if (totalChil <= 0) totalChil = totalChil;
        else totalChil = totalChil - 1;
        document.querySelector(".form-control.children").value = totalChil;
    }

    var babyPlug = document.querySelector(".baby-plus");
    var baby = document.querySelector(".form-control.baby").value;
    let totalBaby = Number(baby);
    babyPlug.onclick = function() {
        totalBaby = totalBaby + 1;
        document.querySelector(".form-control.baby").value = totalBaby;
    }
    var babyMinus = document.querySelector(".baby-minus");
    babyMinus.onclick = function() {
        if (totalBaby <= 0) totalBaby = totalBaby;
        else totalBaby = totalBaby - 1;
        document.querySelector(".form-control.baby").value = totalBaby;
    }


    function hide(x) {
        if (x == 0) {
            document.getElementById("cus").style.display = 'none'
        } else {
            document.getElementById("cus").style.display = 'block'
            return;
        }
    }
    var minus = document.getElementsByClassName("minus");
    var plus = document.getElementsByClassName("plus");

    function Minus1() {
        let number = document.getElementById("adult").innerText;
        let so = parseInt(number)
        if (so == 0) {
            so = 0;
        } else {
            so = so - 1;
            document.getElementById("adult").innerHTML = so;
        }
    }

    function Plus1() {
        let number = document.getElementById("adult").innerText;
        let so = parseInt(number)
        so = so + 1;
        document.getElementById("adult").innerHTML = so;
    }

    function Minus2() {
        let number = document.getElementById("children").innerText;
        let so = parseInt(number)
        if (so == 0) {
            so = 0;
        } else {
            so = so - 1;
            document.getElementById("children").innerHTML = so;
        }
    }

    function Plus2() {
        let number = document.getElementById("children").innerText;
        let so = parseInt(number)
        so = so + 1;
        document.getElementById("children").innerHTML = so;
    }

    function Minus3() {
        let number = document.getElementById("smallchildren").innerText;
        let so = parseInt(number)
        if (so == 0) {
            so = 0;
        } else {
            so = so - 1;
            document.getElementById("smallchildren").innerHTML = so;
        }
    }

    function Plus3() {
        let number = document.getElementById("smallchildren").innerText;
        let so = parseInt(number)
        so = so + 1;
        document.getElementById("smallchildren").innerHTML = so;
    }

    function Minus4() {
        let number = document.getElementById("baby").innerText;
        let so = parseInt(number)
        if (so == 0) {
            so = 0;
        } else {
            so = so - 1;
            document.getElementById("baby").innerHTML = so;
        }
    }

    function Plus4() {
        let number = document.getElementById("baby").innerText;
        let so = parseInt(number)
        so = so + 1;
        document.getElementById("baby").innerHTML = so;
    }
    </script>
</body>

</html>
<?php mysqli_close($connect); ?>