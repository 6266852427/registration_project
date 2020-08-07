<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <style>
        .user-online{
            margin-top: -200px;
        }
        .logout{
           margin-top: 20%;
           position: relative;
        }
        .user-profile{
            margin-top: 6%;
            margin-left: 20%;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        $conn = mysqli_connect('localhost','root','','register');
        if(!$conn){
            die("Error: cannot connect" . mysqli_connect_error());
        }

        $userprofile = $_SESSION['username'] ;

        if($userprofile==true){

        }else{
            header('location:index.html');
        }

        $sql_active = "SELECT * FROM user1 WHERE email_id='$userprofile'";
        $sql1 = "SELECT * FROM user1";
        $data = mysqli_query($conn, $sql1);
        $data_active = mysqli_query($conn, $sql_active);
        $result_active = mysqli_fetch_assoc($data_active);
        ?>
        <div class="user-profile">
            <h2><?php echo $result_active['first_name'] . " " . $result_active['last_name']; ?></h2>
            <p class="mt-5"><img src="<?php echo $result_active['pics']?>" height="200" width="300"/></p>
        </div>
        <div class="float-right position-relative user-online">
            <h3 class="mr-5">User Online</h3>
            <ol>
                <?php
                while($result = mysqli_fetch_assoc($data)){
                    echo "<li>". $result['first_name'] ."&nbsp;&nbsp;". $result['last_name'] ."</li>";
                }
                ?>
            </ol>
        </div>
        <br>
        <div class="logout btn btn-info"> <a style="text-decoration: none; color:#fff;" href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>