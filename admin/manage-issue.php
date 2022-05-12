<?php
    session_start();
    error_reporting();
    include("./config.php");
    include("./permission.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage issue</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Import CSS -->
    <link rel="stylesheet" href="../src/css/dashboard.css" />
    <link rel="stylesheet" href="../src/css/manage-category.css" />
</head>

<body>
    <div class="wrapper">
        <?php
            include("./header.php")
        ?>
        <div class="container">
            <?php
            include("./sidebar.php")
            ?>
            <div class="main">
                <div class="href">
                    <a href="#">Home</a>
                    <a><i class="fa-solid fa-angle-right"></i> Manage Issue</a>
                </div>
                <div class="href">
                    <h2>Manage Issue</h2>
                </div>
                <div class="table">
                    <div class="table-info">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email Address</th>
                                    <th>Issue</th>
                                    <th>Description</th>
                                    <th>Posting Date</th>
                                    <th>Admin Remark</th>
                                    <th>Admin Remark Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                              $connect = mysqli_connect($serverName, $username, $password, $mydb);
                              $sql = "select * from tbl_issues where 1 =1";
                              $results = mysqli_query($connect, $sql); 
                              mysqli_fetch_all($results, MYSQLI_ASSOC);
                              // $result = $connect -> query($sql);
                              $cnt=1;
                              
                              foreach($results as $row){
                              // while($row = $result ->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo ($cnt);?></td>
                                    <td><?php echo ($row["UserEmail"]);?></td>
                                    <td><?php echo ($row["Issue"]);?></td>
                                    <td>
                                        <?php echo ($row["Description"]);?>
                                    </td>
                                    <td>$<?php echo ($row["PostingDate"]);?></td>
                                    <td><?php echo ($row["AdminRemark"]);?></td>
                                    <td><?php echo ($row["AdminremarkDate"]);?></td>
                                    <td>
                                        <a href="update-category.php?pid=<?php echo ($row["id"]);?>"><button
                                                type="button" class="btn btn-primary btn-block">
                                                Views
                                            </button>
                                        </a>
                                        <a href="delete.php?pid=<?php echo ($row["id"]);?>"><button type="button"
                                                style="background-color: red; color: white;"
                                                class="btn btn-primary btn-block">
                                                Delete
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                $cnt=$cnt+1;} 
                                mysqli_close($connect);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>Group 5</div>
        </div>
    </div>
</body>

</html>