<!DOCTYPE html>
<html>
<head>
    <title>IMY220 - D1</title>
    <meta charset="utf-8" />
    <meta name="author" content="Dean Nortje">
    <!-- Replace Name Surname with your name and surname -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://kit.fontawesome.com/44f1545032.js" crossorigin="anonymous"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Orbitron">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Rokkitt">

    <link rel="apple-touch-icon" sizes="180x180" href="rush/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="rush/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="rush/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

</head>
<body>
<?php

$email = isset($_POST["loginEmail"]) ? $_POST["loginEmail"] : false;
$pass = isset($_POST["loginPass"]) ? $_POST["loginPass"] : false;

if($email && $pass){


    $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
    global $conn;
    include('includes/config.php');
    $res = $conn->query($query);

    if($row = mysqli_fetch_array($res)) {


        $sql = "SELECT * FROM tbgallery WHERE image_id = " . $_POST["image_id"] ;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {


            while ($row = $result->fetch_assoc()) {

                echo '
    
    
 
<div class="container">
    <section id="LOGOs" class="mt-5">
        <div class="row">
            <div class="col-12" style="text-align: center">
                <h1 id="LogoName"><img src="CSS-Content/Logo/LOGOInvertedFinal.png" style="width:150px;height:150px;"/>RUSH</h1>
                <br>
                <h1 id="slogan">Live Life On The Edge</h1>
            </div>
        </div>
    </section>
</div>
<div class="container">
    <section id="forms" class="mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 mx-0">
                <div class="card-border-dark mt-4" style="max-height:700px;width:100%">
                    <img src="CSS-Content/gallery/' . $row["filename"] . '" style="width:1110px; max-height:100%;"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-border-dark mt-0">
                    <div class="card-body" >
                        <div class="postPageOverflow row">
                            <div class="col-12 col-lg-12 " >
                                <h5 class="card-title">' . $row["cHeading"] . '</h5>
                            </div>
                            <div class="col-12 col-lg-12">
                                <p class="card-text paragraph2">' . $row["caption"] . '</p>
                            </div>
                            <div class="col-12 col-lg-12">
                                <p class="card-text paragraph2">' . $row["hashtags"] . '</p>
                            </div>
                            <div class="col-12 col-lg-12">
                                <p class="card-text"><small class="text-muted">Uploaded by user' . $row["user_id"] . ' - ' . $row["timestampDT"] . ' </small></p>
                            </div>
                            <div class="col-12 col-lg-12" >
                            
                               ';
                $sqlQuery = "SELECT comment_id, CommentText FROM tbcomments WHERE image_id = " . $row["image_id"] . " ORDER BY comment_id DESC";
                $results = $conn->query($sqlQuery);

                if ($results->num_rows > 0) {
                    while ($rows = $results->fetch_assoc()) {

                        echo '<p class="card-text paragraph2">' . $rows["CommentText"] . '</p>';


                    }
                }

            }
        }
    }
}
?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
</div>
</body>
</html>

