<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

//$server = "localhost";
//$username = "root";
//$password = "";
//$database = "dbrush";
////Create Connection
//$conn = mysqli_connect($server, $username, $password, $database);
////Check Connection
//if(!$conn){
//    die("Connection failed: ". mysqli_connect_error());
//}



$email = isset($_POST["loginEmail"]) ? $_POST["loginEmail"] : false;
$pass = isset($_POST["loginPass"]) ? $_POST["loginPass"] : false;
// if email and/or pass POST values are set, set the variables to those values, otherwise make them false
?>
<!DOCTYPE html>
<html>
<head>
    <title>IMY220 - Assignment 2</title>
    <meta charset="utf-8" />
    <meta name="author" content="Dean Nortje">
    <!-- Replace Name Surname with your name and surname -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://kit.fontawesome.com/44f1545032.js" crossorigin="anonymous"></script>


    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Orbitron">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Rokkitt">

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <script src="script.js" type="application/javascript"></script>
</head>
<body>
<div class="container">
    <section id="LOGOs" class="mt-5">
        <div class="row">
            <div class="col-12" style="text-align: center">
                <!--			<img src="CSS-Content/Logo/LOGONo_Background.png" style="width:100px;height:100px;"/>-->
                <h1 id="LogoName"><img src="CSS-Content/Logo/LOGOInvertedFinal.png" style="width:150px;height:150px;"/>RUSH</h1>
                <br>
                <p class="p3">A L B U M S</p>
            </div>
        </div>
    </section>
</div>
<div style="padding: 20px">
    <div class="fluid-container">
        <?php
        if($email && $pass){
            $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
            global $conn;
            include('includes/config.php');
            $res = $conn->query($query);
            if($row = mysqli_fetch_array($res)){
                echo '
        <section id="forms" class="mt-5">
                    <div class="offset-md-3 col-12 col-sm-6 p-0">
                        <div class="card-border-dark mb-3 mx-0">

                                <div class="card-body">
                                    <nav class="navbar navbar-dark bg-dark " style="width: 100%">
                                        <a class="navbar-brand" href="../index.html">
                                            <img src="CSS-Content/Logo/LOGOInvertedFinal.png" width="30" height="30" class="d-inline-block align-top" alt="">
                                        </a>

                                         <form class="commentForm" method="POST" action="profilePage.php">
                                        
                                                <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                

                                                <button class="btn btn-outline-secondary" type="submit" value="Profile" name="submitProfilePage">P r o f i l e</button>
                                         </form>
                                        <form class="commentForm" method="POST" action="homePage.php">
                                        
                                                <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                

                                                <button class="btn btn-outline-secondary" type="submit" value="Albums" name="submitAlbums">A c t i v i t y</button>
                                         </form>
                                        
              
                                        <button class="btn btn-outline-secondary" type="button">G l o b a l</button>
                                        <button class="btn btn-outline-secondary" type="button">L o c a l</button>
                                        
                                       <!--<form class="commentForm" method="POST" action="profilePage.php">
                                        
                                                <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                

                                                <button class="btn btn-outline-secondary" type="submit" value="Profile" name="submitProfilePage">F o l l o w e r s</button>
                                         </form>-->
                                         
                                         <form class="commentForm" method="POST" action="profilePage.php">
                                        
                                                <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                

                                                <button class="btn btn-outline-secondary" type="submit" value="Profile" name="submitProfilePage">M e s s a g i n g</button>
                                         </form>
                                        
                                       <!-- <button class="btn btn-outline-secondary" type="button">Followers</button>
                                        <button class="btn btn-outline-secondary" type="button">Direct Messaging</button>-->
                                            
                                                           
                                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">U p l o a d</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <form method="POST" action="albumPage.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                        <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                        <label style="color: black; font-family:  Rokkitt; font-size: 30px">Post Heading</label>
                                                        <input type="text" class="form-control" name="cHeading" id="cHeading" />
                                                        <label style="color: black; font-family:  Rokkitt; font-size: 30px">Post Caption</label>
                                                        <input type="text" class="form-control" name="caption" id="caption" />
                                                        <label style="color: black; font-family:  Rokkitt; font-size: 30px">Post Hashtags</label>
                                                        <input type="text" class="form-control" name="hashtag" id="hashtag" />
                                                        <label style="color: black; font-family:  Rokkitt; font-size: 30px">Upload Cover Image</label>
                                                        <input type="file" class="form-control" name="picToUpload" id="picToUpload" /><br/>
                                                        <input type="submit" class="btn btn-primary" value="Upload" name="submit" />
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    
                                    <a class="navbar-brand" href="#">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
        
        
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                    
                    
                    ';

                if (isset($_POST["submit"])){
                    $target_dir= "CSS-Content/albums/";
                    $userIdent = $row["user_id"];
                    $uploadFile = $_FILES["picToUpload"];
                    $cHeading = $_POST["cHeading"];
                    $caption = $_POST["caption"];
                    $hashtag = $_POST["hashtag"];

                    if(($uploadFile["type"] == "image/jpg" || $uploadFile["type"] == "image/jpeg" || $uploadFile["type"] == "image/png") && $uploadFile["size"] < 1048576)
                    {
                        if($uploadFile["error"] > 0)
                        {
                            echo "Error: " . $uploadFile["error"] . "<br/>";
                        }
                        else
                        {
                            $insertSQL = "INSERT INTO tbalbums (album_id,user_id,filename, cHeading, caption, hashtags) VALUES (null,".$userIdent.",'".$uploadFile["name"]."','".$cHeading."','".$caption."','".$hashtag."')";
                            $r = mysqli_query($conn, $insertSQL);
                            move_uploaded_file($uploadFile["tmp_name"], $target_dir . $uploadFile["name"]);
                            //echo "Stored in: " . $target_dir . $uploadFile["name"];

                        }
                    }
                    else
                    {
                        echo 	'<div class="alert alert-danger mt-3" role="alert">
                                            An Error occurred while uploading the image...
                                        </div>';
                    }
                }


                $sql = "SELECT * FROM tbalbums WHERE user_id = ".$row["user_id"];
                $result = $conn->query($sql);

                $count = 1;

                if($result->num_rows> 0) {
                    // output data of each row
                    $totalInput = $result->num_rows;
                    if($totalInput==1)
                    {
                        $half = -1;
                    }
                    else if($totalInput%2==0)//even
                    {
                        $half = $totalInput/2;
                    }
                    else
                    {
                        $half = ($totalInput+1)/2; //total is 3 then half is 2
                    }

                    while($row = $result->fetch_assoc()){

                        if($count==$half) {//LAST RUN TO CLOSE DIV --> half of table
                            echo '
                                        <div class="card-border-dark mb-3">
                                            <div class="row no-gutters" id="caption1">
                                                <div class="col-sm-6 col-12 captions" >
                                                    <div class="cardStyle card-body" >
                                                     <h5 class="card-title">' . $row["cHeading"] . '</h5>
                                                     <p class="card-text paragraph2">' . $row["caption"] . '</p>
                                                     <p class="card-text paragraph2">' . $row["hashtags"] . '</p>
                                                     <p class="card-text"><small class="text-muted">Uploaded by user' . $row["user_id"] . ' - '.$row["timestampDT"].' </small></p>
                                                     ';

                            $sqlQuery = "SELECT comment_id, CommentText FROM tbalbumcomments WHERE album_id = ".$row["album_id"]." ORDER BY comment_id DESC" ;
                            $results = $conn->query($sqlQuery);
                            $counting = 0;
                            if($results->num_rows> 0) {
                                while ($rows = $results->fetch_assoc()) {
                                    if($counting<=1) {
                                        echo '<p>' . $rows["CommentText"] . '</p>';
                                    }

                                    $counting++;
                                }
                            }


                            echo'
                                                     <button class="comment btn btn-outline-secondary"><i class="far fa-comment-alt"></i></button>
                                                     <button class="report btn btn-outline-secondary"><i class="far fa-flag"></i></button>
                                                     
                                                      <form class="commentForm" method="POST" action="pushComments.php">
                                                       <br>
                                                            <div class="form-group">
                                                                <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                                <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                                <input type="hidden" name="album_id" value =' . $row["album_id"] . ' />
                                                               
                                                                <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment Here"/>
                                                                <br>
                                                    
                                                                <input type="submit" class="btn btn-outline-dark" value="Upload" name="submit" />
                                                                <button type="button" class="btn btn-outline-dark" >Close</button>
                                                            </div>
                                                        </form>
                                                        
                                                       <form action="#" method="post" class="reportType">
                                                        <br>
                                                              <label for="report">Choose a report type:</label>
                                                              <select name="reportType" class="reportSelector">
                                                                <option value="Nudity">Nudity</option>
                                                                <option value="Violence">Violence</option>
                                                                <option value="imIn">Im in this post and I do not like it</option>
                                                                <option value="inappropriate">Inappropriate</option>
                                                              </select>
                                                              <br><br>
                                                              <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                              <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                              <input class="btn btn-outline-dark" type="submit" value="Submit" name="reportSubmit">
                                                        </form>

                                                </div>
                                            </div>
                                           <div class="col-sm-6 col-12">
                                                    <form method="post" class="inline" action="albumUploads.php" >
                                                        <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                        <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                        <input type="hidden" name="album_id" value ='. $row["album_id"] .' />
                                                      <button type="submit" class="imageButtonClass">
                                                          <a href="./PostPage.php?'. $row["filename"] .'">
                                                            <img src="CSS-Content/albums/' . $row["filename"] . '" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                                          </a>
                                                      </button>
                                                    </form>
                                        
                                                </div>
                                        </div>
                                    </div>
                                </div>
                        
                       
                            ';}
                        if($half==-1){


                            echo'


                                        <div class="card-border-dark mb-3">
                                            <div class="row no-gutters" id="caption1">
                                                    <div class="col-sm-6 col-12 captions" >
                                                        <div class="cardStyle card-body" >
                                                         <h5 class="card-title">' . $row["cHeading"] . '</h5>
                                                         <p class="card-text paragraph2">' . $row["caption"] . '</p>
                                                         <p class="card-text paragraph2">' . $row["hashtags"] . '</p>
                                                         <p class="card-text"><small class="text-muted">Uploaded by user' . $row["user_id"] . ' - '.$row["timestampDT"].' </small></p>
                                                         
                                                                           ';

                            $sqlQuery = "SELECT comment_id, CommentText FROM tbalbumcomments WHERE album_id = ".$row["album_id"]." ORDER BY comment_id DESC" ;
                            $results = $conn->query($sqlQuery);
                            $counting = 0;
                            if($results->num_rows> 0) {
                                while ($rows = $results->fetch_assoc()) {
                                    if($counting<=1) {
                                        echo '<p>' . $rows["CommentText"] . '</p>';
                                    }
                                    $counting++;

                                }
                            }


                            echo'
                                                         
                                                         <button class="comment btn btn-outline-secondary"><i class="far fa-comment-alt"></i></button>
                                                        <button class="report btn btn-outline-secondary"><i class="far fa-flag"></i></button>
                                                         <form class="commentForm" method="POST" action="PushComments.php">
                                                           <br>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                                    <input type="hidden" name="album_id" value =' . $row["album_id"] . ' />
                                                                   
                                                                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment Here"/>
                                                                    <br>
                                                        
                                                                    <input type="submit" class="btn btn-outline-dark" value="Upload" name="submit" />
                                                                    <button type="button" class="btn btn-outline-dark" >Close</button>
                                                                </div>
                                                            </form>
                                                            
                                                            <form action="#" method="post" class="reportType">
                                                             <br>
                                                              <label for="report">Choose a report type:</label>
                                                              <select name="reportType" class="reportSelector">
                                                                <option value="Nudity">Nudity</option>
                                                                <option value="Violence">Violence</option>
                                                                <option value="imIn">Im in this post and I do not like it</option>
                                                                <option value="inappropriate">Inappropriate</option>
                                                              </select>
                                                              <br><br>
                                                              <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                              <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                              <input class="btn btn-outline-dark" type="submit" value="Submit" name="reportSubmit">
                                                            </form>
                                                        
                                                        </div>
                                                    </div>
                                                <div class="col-sm-6 col-12">
                                                     
                                                    <form method="post" class="inline" action="albumUploads.php" >
                                                        <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                        <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                        <input type="hidden" name="album_id" value ='. $row["album_id"] .' />
                                                      <button type="submit" class="imageButtonClass">
                                                          <a href="./PostPage.php?'. $row["filename"] .'">
                                                            <img src="CSS-Content/albums/' . $row["filename"] . '" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                                          </a>
                                                      </button>
                                                    </form>
                                        
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                       
                                   
                                    


                                <div class="col-12 col-sm-6 mt-3 mt-sm-0 mx-0">
                                    <div class="card-border-dark mb-3" style=" max-height:400px">
                                        <div class="row no-gutters" id="caption1">
                                            <div class="col-sm-6 col-12">
                                                <img class="posts" src="CSS-Content/samples/motocross.jpg"/>
                                            </div>
                                            <div class="col-sm-6 col-12 captions" >
                                                <div class="card-body" style=" max-width: 540px; height: 100%">
                                                    <h5 class="card-title">RUSH</h5>
                                                    <p class="card-text paragraph2">WELCOME TO RUSH NEW USER</p>
                                                    <p class="card-text paragraph2">#WELCOME #RUSH #NEW #USER</p>
                                                    <p class="card-text"><small class="text-muted">RUSH - 2020-WELCOME</small></p>
                                                    <button class="comment btn btn-outline-secondary"><i class="far fa-comment-alt"></i></button>
                                                     <button class="report btn btn-outline-secondary"><i class="far fa-flag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';



                        }
                        else if($count<$half){//NORMAL RUN - left side
                            echo '
                                        <div class="card-border-dark mb-3">
                                            <div class="row no-gutters" id="caption1">
                                                    <div class="col-sm-6 col-12 captions" >
                                                        <div class="cardStyle card-body" >
                                                         <h5 class="card-title">' . $row["cHeading"] . '</h5>
                                                         <p class="card-text paragraph2">' . $row["caption"] . '</p>
                                                         <p class="card-text paragraph2">' . $row["hashtags"] . '</p>
                                                         <p class="card-text"><small class="text-muted">Uploaded by user' . $row["user_id"] . ' - '.$row["timestampDT"].' </small></p>
                                                         
                                                                           ';

                            $sqlQuery = "SELECT comment_id, CommentText FROM tbalbumcomments WHERE album_id = ".$row["album_id"]." ORDER BY comment_id DESC" ;
                            $results = $conn->query($sqlQuery);
                            $counting = 0;
                            if($results->num_rows> 0) {
                                while ($rows = $results->fetch_assoc()) {
                                    if($counting<=1) {
                                        echo '<p>' . $rows["CommentText"] . '</p>';
                                    }
                                    $counting++;

                                }
                            }


                            echo'
                                                         
                                                         <button class="comment btn btn-outline-secondary"><i class="far fa-comment-alt"></i></button>
                                                        <button class="report btn btn-outline-secondary"><i class="far fa-flag"></i></button>
                                                         <form class="commentForm" method="POST" action="PushComments.php">
                                                           <br>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                                    <input type="hidden" name="album_id" value =' . $row["album_id"] . ' />
                                                                   
                                                                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment Here"/>
                                                                    <br>
                                                        
                                                                    <input type="submit" class="btn btn-outline-dark" value="Upload" name="submit" />
                                                                    <button type="button" class="btn btn-outline-dark" >Close</button>
                                                                </div>
                                                            </form>
                                                            
                                                            <form action="#" method="post" class="reportType">
                                                             <br>
                                                              <label for="report">Choose a report type:</label>
                                                              <select name="reportType" class="reportSelector">
                                                                <option value="Nudity">Nudity</option>
                                                                <option value="Violence">Violence</option>
                                                                <option value="imIn">Im in this post and I do not like it</option>
                                                                <option value="inappropriate">Inappropriate</option>
                                                              </select>
                                                              <br><br>
                                                              <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                              <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                              <input class="btn btn-outline-dark" type="submit" value="Submit" name="reportSubmit">
                                                            </form>
                                                        
                                                        </div>
                                                    </div>
                                                <div class="col-sm-6 col-12">
                                                     
                                                    <form method="post" class="inline" action="albumUploads.php" >
                                                        <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                        <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                        <input type="hidden" name="album_id" value ='. $row["album_id"] .' />
                                                      <button type="submit" class="imageButtonClass">
                                                          <a href="./PostPage.php?'. $row["filename"] .'">
                                                            <img src="CSS-Content/albums/' . $row["filename"] . '" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                                          </a>
                                                      </button>
                                                    </form>
                                        
                                                </div>
                                            </div>
                                        </div>
                                  
                                        
                                   
                            ';
                        }
                        else if ($count == $half+1) {//First Run needs to have the top div - right side
                            echo '
                                  <div class="col-12 col-sm-6 mt-3 mt-sm-0 mx-0">
                                    <div class="card-border-dark mb-3" >
                                        <div class="row no-gutters" id="caption1">
                                            <div class="col-sm-6 col-12">
                                                    <form method="post" class="inline" action="albumUploads.php" >
                                                        <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                        <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                        <input type="hidden" name="album_id" value ='. $row["album_id"] .' />
                                                      <button type="submit" class="imageButtonClass">
                                                          <a href="./PostPage.php?'. $row["filename"] .'">
                                                            <img src="CSS-Content/albums/' . $row["filename"] . '" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                                          </a>
                                                      </button>
                                                    </form>
                                            </div>
                                            <div class="col-sm-6 col-12 captions" >
                                                <div class="cardStyle card-body">
                                                    <h5 class="card-title">' . $row["cHeading"] . '</h5>
                                                    <p class="card-text paragraph2">' . $row["caption"] . '</p>
                                                    <p class="card-text paragraph2">' . $row["hashtags"] . '</p>
                                                    <p class="card-text"><small class="text-muted">Uploaded by user' . $row["user_id"] . ' - '.$row["timestampDT"].' </small></p>
                                                    
                                                                      ';

                            $sqlQuery = "SELECT comment_id, CommentText FROM tbalbumcomments WHERE album_id = ".$row["album_id"]." ORDER BY comment_id DESC" ;
                            $results = $conn->query($sqlQuery);
                            $counting = 0;
                            if($results->num_rows> 0) {
                                while ($rows = $results->fetch_assoc()) {
                                    if($counting<=1) {
                                        echo '<p>' . $rows["CommentText"] . '</p>';
                                    }
                                    $counting++;

                                }
                            }


                            echo'
                                                    
                                                    <button type="button" class="comment btn btn-outline-secondary" ><i class="far fa-comment-alt"></i></button>
         
                                                     <button class="report btn btn-outline-secondary"><i class="far fa-flag"></i></button>
                                                     
                                                       <form class="commentForm" method="POST" action="pushComments.php">
                                                       <br>
                                                            <div class="form-group">
                                                                <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                                <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                                <input type="hidden" name="album_id" value =' . $row["album_id"] . ' />
                                                               
                                                                <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment Here"/>
                                                                <br>
                                                    
                                                                <input type="submit" class="btn btn-outline-dark" value="Upload" name="submit" />
                                                                <button type="button" class="btn btn-outline-dark" >Close</button>
                                                               
                                                            </div>
                                                        </form>
                                                        <form action="#" method="post" class="reportType">
                                                         <br>
                                                              <label for="report">Choose a report type:</label>
                                                              <select name="reportType" class="reportSelector">
                                                                <option value="Nudity">Nudity</option>
                                                                <option value="Violence">Violence</option>
                                                                <option value="imIn">Im in this post and I do not like it</option>
                                                                <option value="inappropriate">Inappropriate</option>
                                                              </select>
                                                              <br><br>
                                                              <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                              <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                              <input class="btn btn-outline-dark" type="submit" value="Submit" name="reportSubmit">
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                ';
                        } else if($count>$half){//NORMAL RUN  right side
                            echo '
                                            <div class="card-border-dark mb-3" >
                                                <div class="row no-gutters" id="caption1">
                                                     <div class="col-sm-6 col-12">
                                                    <form method="post" class="inline" action="albumUploads.php" >
                                                        <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                        <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                        <input type="hidden" name="album_id" value ='. $row["album_id"] .' />
                                                      <button type="submit" class="imageButtonClass">
                                                          <a href="./PostPage.php?'. $row["filename"] .'">
                                                            <img src="CSS-Content/albums/' . $row["filename"] . '" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                                          </a>
                                                      </button>
                                                    </form>
                                                </div>
                                                    <div class="col-sm-6 col-12 captions" >
                                                        <div class="cardStyle card-body">
                                                            <h5 class="card-title">' . $row["cHeading"] . '</h5>
                                                            <p class="card-text paragraph2">' . $row["caption"] . '</p>
                                                            <p class="card-text paragraph2">' . $row["hashtags"] . '</p>
                                                            <p class="card-text"><small class="text-muted">Uploaded by user' . $row["user_id"] . ' - '.$row["timestampDT"].' </small></p>
                                                            
                                                                              ';

                            $sqlQuery = "SELECT comment_id, CommentText FROM tbalbumcomments WHERE album_id = ".$row["album_id"]." ORDER BY comment_id DESC" ;
                            $results = $conn->query($sqlQuery);
                            $counting = 0;
                            if($results->num_rows> 0) {
                                while ($rows = $results->fetch_assoc()) {
                                    if($counting<1) {
                                        echo '<p>' . $rows["CommentText"] . '</p>';
                                    }
                                    $counting++;


                                }
                            }


                            echo'
                                                            
                                                            <button class="comment btn btn-outline-secondary"><i class="far fa-comment-alt"></i></button>
                                                            <button class="report btn btn-outline-secondary"><i class="far fa-flag"></i></button>
                                                            
                                                             <form class="commentForm" method="POST" action="pushComments.php">
                                                               <br>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                                    <input type="hidden" name="album_id" value =' . $row["album_id"] . ' />
                                                                   
                                                                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Comment Here"/>
                                                                    <br>
                                                        
                                                                    <input type="submit" class="btn btn-outline-dark" value="Upload" name="submit" />
                                                                    <button type="button" class="btn btn-outline-dark" >Close</button>
                                                                </div>
                                                            </form>
                                                            <form action="#" method="post" class="reportType">
                                                            <br>
                                                              <label for="report">Choose a report type:</label>
                                                              <select name="reportType" class="reportSelector">
                                                                <option value="Nudity">Nudity</option>
                                                                <option value="Violence">Violence</option>
                                                                <option value="imIn">Im in this post and I do not like it</option>
                                                                <option value="inappropriate">Inappropriate</option>
                                                              </select>
                                                              <br><br>
                                                              <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                                              <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                                              <input class="btn btn-outline-dark" type="submit" value="Submit" name="reportSubmit">
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                   
                            ';
                        }



                        $count++;


                        //echo '<div class="col-3" style="background-image: url(albums/".$row["filename"].")'> </div>'';
                    }
                    //echo $count;
                }
                else{//IF THERE IS NO CONTENT

                    echo'
                               
                                    <div class="card-border-dark mb-3" style=" max-height:400px">
                                        <div class="row no-gutters" id="caption1">
                                                <div class="col-sm-6 col-6 captions" >
                                                    <div class="card-body" style=" max-width: 540px; height: 100%">
                                                     <h5 class="card-title">NEW RUSH USER, TITLE HERE</h5>
                                                     <p class="card-text paragraph2">Fun day with redbull - This is where your content or caption will go when you upload a post</p>
                                                     <p class="card-text paragraph2">#HASHTAG #RACING - this is the hashtag section</p>
                                                     <p class="card-text"><small class="text-muted">Uploaded by user RUSH - 2000-01-01</small></p>
                                                     <button class="comment btn btn-outline-secondary"><i class="far fa-comment-alt"></i></button>
                                                     <button class="report btn btn-outline-secondary"><i class="far fa-flag"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-6">
                                                <img src="CSS-Content/samples/car.jpg" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';

                    echo'<div class="col-12 col-sm-6 mt-3 mt-sm-0 mx-0">
                                    <div class="card-border-dark mb-3" style=" max-height:400px">
                                        <div class="row no-gutters" id="caption1">
                                            <div class="col-sm-6 col-12">
                                                <img class="posts" src="CSS-Content/samples/motocross.jpg"/>
                                            </div>
                                            <div class="col-sm-6 col-12 captions" >
                                                <div class="card-body" style=" max-width: 540px; height: 100%">
                                                    <h5 class="card-title">RUSH</h5>
                                                    <p class="card-text paragraph2">WELCOME TO RUSH NEW USER</p>
                                                    <p class="card-text paragraph2">#WELCOME #RUSH #NEW #USER</p>
                                                    <p class="card-text"><small class="text-muted">RUSH - 2020-WELCOME</small></p>
                                                    <button class="comment btn btn-outline-secondary"><i class="far fa-comment-alt"></i></button>
                                                     <button class="report btn btn-outline-secondary"><i class="far fa-flag"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                }


                echo'
             
                </div>
            </section>
        </div>
    </div>
        <br>';

            }
            else{
                echo 	'<div class="alert alert-danger mt-3" role="alert">
	  							You are not registered on this site!
	  						</div>';
            }
        }
        else{
            echo 	'<div class="alert alert-danger mt-3" role="alert">
	  						Could not log you in
	  					</div>';
        }
        ?>



</body>
</html>
