<?php
    session_start();
    error_reporting(0);
    include("../admin/config.php");
    $connect = mysqli_connect($serverName, $username, $password, $mydb);

    // if (isset($_GET['did'])){
    //   $did = intval($_GET['did']);

    // }
    // $sql = "Select * from tbl_tourpackages where PackageId=$did";
    // $result = mysqli_query($connect, $sql);
    // $row = mysqli_fetch_array($result);
    // if(isset($_POST["submit"])){
    //   $date = $_POST["dateoftravel"];
    //   $guest = $_POST["guest"];
    //   if ($_POST["dateoftravel"] && $_POST["guest"]) {
    //     $_SESSION["date"] = $date;
    //     $_SESSION["guest"] = $guest;
    //     $_SESSION["tourId"] = $did;
    //     $_SESSION["tour"] = $row;
    //     // header("location: http://localhost/Php-Travel/public/payment.php");
    //   }
    // }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../src/css/index.css" />
    <link rel="stylesheet" href="../src/css/chitiet.css">
    <link rel="stylesheet" href="../src/css/news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="link ">
                <h3>Tin tức nổi bật</h3>
            </section>
            <section class="main">
                <?php
                $connect = mysqli_connect($serverName, $username, $password, $mydb);
                $sql = "select * from tbl_news where 1 =1";
                $results = mysqli_query($connect, $sql);
                mysqli_fetch_all($results, MYSQLI_ASSOC);
                foreach ($results as $row) {
                
                ?>
                <div class="news">
                    <div class="news-img">
                        <img src="<?php echo ('../pimages/'.$row["image"]);  ?>" alt="">
                    </div>
                    <div class="news-title">
                        <a href="../public/newsId.php?pic=<?php echo ($row["id"]); ?>" class="news-header">
                            <?php echo ($row["title"]);  ?>
                        </a>
                        <p class="news-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit rerum vel
                            praesentium, repudiandae alias itaque ad eius atque ipsum est necessitatibus illum aut
                            provident nobis. Accusamus iure maxime sed dignissimos.
                        </p>
                    </div>
                </div>
                <?php } mysqli_close($connect); ?>
            </section>
            <?php include("./footer.php") ?>
        </div>
    </div>
</body>

</html>
<?php mysqli_close($connect); ?>