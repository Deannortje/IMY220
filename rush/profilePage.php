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

    <script>
        function redirectFunction(){
            location.replace("..index.html");
        }
    </script>

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


                echo '
    
    
 
<div class="container">
    <section id="LOGOs" class="mt-5">
        <div class="row">
            <div class="col-12" style="text-align: center">
                <h1 id="LogoName"><img src="CSS-Content/Logo/LOGOInvertedFinal.png" style="width:150px;height:150px;"/>RUSH</h1>
                <br>
                <h1 id="slogan">PROFILE</h1>
            </div>
        </div>
    </section>
</div>
<div class="container">
    <section id="forms" class="mt-5">
        <div class="row justify-content-center ">
            <div class="col-0 col-sm-0 mx-0">
                <div class="card-border-dark mt-4" style="max-height:700px;width:100%">
                    <img src="CSS-Content/ProfilePictures/' . $row["profileImage"] . '" style="width:300px; max-height:100%; filter: invert(0%); border-radius:50%;"/>
                </div>
            </div>
        </div>

<p class="p3" style="text-align: center; font-size: 50px">Posts</p>

<div class="container">
    <section id="forms" class="mt-5">
        <div class="row">

';
        $sqlPosts = "SELECT * FROM tbgallery WHERE user_id = ".$row["user_id"]." ORDER BY timestampDT ASC";
        $resultPosts = $conn->query($sqlPosts);

            while($rowPosts = $resultPosts->fetch_assoc()) {
                echo '
                
                        <div class="col-sm-6 col-12 mb-3">
                            <form method="post" class="inline" action="./PostPage.php?image=' . $rowPosts["filename"] . '" >
                                <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                                <input type="hidden" name="image_id" value =' . $rowPosts["image_id"] . ' />
                                
                                <button type="submit" class="imageButtonClass">
                                    <a href="./PostPage.php?' . $rowPosts["filename"] . '">
                                        <img src="CSS-Content/gallery/' . $rowPosts["filename"] . '" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                    </a>
                                </button>
                            </form>
                        </div>
             
                ';


            }
                echo'

            </div>
    </section>
</div>
<p class="p3" style="text-align: center; font-size: 50px">Albums</p>
<div class="container">
    <section id="forms" class="mt-5">
        <div class="row">

';
        $sqlPosts = "SELECT * FROM tbalbums WHERE user_id = " . $row["user_id"] . " ";
        $resultPosts = $conn->query($sqlPosts);

        while ($rowPosts = $resultPosts->fetch_assoc()) {
            echo '
                
                        <div class="col-sm-6 col-12 mb-3">
                            <form method="post" class="inline" action="./albumUploads.php?image=' . $rowPosts["filename"] . '" >
                                <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                                <input type="hidden" name="album_id" value =' . $rowPosts["album_id"] . ' />
                                
                                <button type="submit" class="imageButtonClass">
                                    <a href="./albumUploads.php?' . $rowPosts["filename"] . '">
                                        <img src="CSS-Content/gallery/' . $rowPosts["filename"] . '" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                    </a>
                                </button>
                            </form>
                        </div>
             
                ';


        }

        echo'

            </div>
    </section>
</div>











  <br>
   <br>

                            <div class="col-12 col-sm-12 mt-4" align="center">
                                <form class="ProfileForm" method="POST" action="FollowAndUnfollow.php" enctype="multipart/form-data">
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    <button class="btn btn-outline-dark btn-lg btn-block" type="submit" value="next" name="next">Manage Followers<i class="fas fa-biking"></i></button>
                                    <br>
                                </form>
                            </div>


 <div class="container">
    <section class="mt-5">
        <div class="row">
            <div class="col-12" >
               <div class="card-border-dark mt-0 mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6" >
                            <p class="p3" style="text-align: center">Followers</p>
                                 <div class=" m-2">
                                    <div class="postPageOverflow" style="max-height:600px;width:100%">';

                                        $queryUsers = "SELECT * FROM tbfollowers WHERE followed_username ='".$_POST["loginEmail"]."'" ;
                                        global $conn;
                                        include('includes/config.php');
                                        $resUsers = $conn->query($queryUsers);

                                        while($rowUser = $resUsers->fetch_assoc()){
                                            echo'<a class="followLink p3">' . $rowUser["username"] . '</a></br> ';

                                        }

                                        echo'
                                    
                                    </div>
                                 </div>
                            </div>
                            
                            <div class="col-12 col-sm-6" >
                            <p class="p3" style="text-align: center">Following</p>
                                 <div class="m-2">
                                    <div class="postPageOverflow" style="max-height:600px;width:100%">';

                                        $queryUsers = "SELECT * FROM tbfollowers WHERE username ='".$_POST["loginEmail"]."'" ; ;
                                        global $conn;
                                        include('includes/config.php');
                                        $resUsers = $conn->query($queryUsers);

                                        while($rowUser = $resUsers->fetch_assoc()){
                                            echo'<a class="followLink p3">' . $rowUser["followed_username"] . '</a> ';

                                        }
                                        echo'
                                    
                                    </div>
                                 </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
        
<p class="p3" style="text-align: center">Please take note that, After these changes you will be required to login again</p>
<div class="container">
    <section id="forms" class="mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card-border-dark mt-0">
                    <div class="card-body">
                        <div class="postPageOverflow row">
                            <div class="col-4 col-lg-4 offset-1" >
                              <p class="p3">Profile Picture:</p>
                               </div>
                               <div class="col-4 col-lg-4" >
                              <p class="p3">'.$row["profileImage"].'</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="profilePage.php" enctype="multipart/form-data">
                                        
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="file" class="form-control" name="picToUpload" id="picToUpload" />
                                        </div>
                                        <div class="col-4">
                                          
                                    <button class="btn btn-outline-secondary" type="submit" value="ProfilePicture" name="submitProfilePicture">Edit</button>
                                    </div>
                                </div>
                             </form>
                           </div>
                           <br>
                             <div class="col-4 col-lg-4 offset-1" >
                              <p class="p3">Username:</p>
                               </div>
                               <div class="col-4 col-lg-4" >
                              <p class="p3">'.$row["username"].'</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="profilePage.php">
                                        
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="New Username"/>
                                        </div>
                                        <div class="col-4">
                                          
                                        <button class="btn btn-outline-secondary" type="submit" value="Username" name="submitUsername">Edit</button>
                                        
                                        </div>
                                    </div>
                             </form>
                              
                            </div>
                            <div class="col-4 col-lg-4 offset-1" >
                              <p class="p3">Name:</p>
                               </div>
                               <div class="col-4 col-lg-4" >
                              <p class="p3">'.$row["name"].'</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="profilePage.php">
                                        
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="nameName" id="name" placeholder="New Name"/>
                                       
                                        </div>
                                        <div class="col-4">
                                          
                                    <button class="btn btn-outline-secondary" type="submit" value="name" name="submitName">Edit</button>
                                    </div>
                                    </div>
                             </form>
                            </div>
                             <div class="col-4 col-lg-4 offset-1" >
                              <p class="p3">Surname:</p>
                               </div>
                               <div class="col-4 col-lg-4" >
                              <p class="p3">'.$row["surname"].'</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                               <form class="ProfileForm" method="POST" action="profilePage.php">
                                        
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="surname" id="surname" placeholder="New Surname"/>
                                       
                                        </div>
                                        <div class="col-4">
                                          
                                    <button class="btn btn-outline-secondary" type="submit" value="surname" name="submitSurname">Edit</button>
                                    </div>
                                    </div>
                             </form>
                            </div>
                             <div class="col-4 col-lg-4 offset-1" >
                              <p class="p3">Email:</p>
                               </div>
                               <div class="col-4 col-lg-4" >
                              <p class="p3">'.$row["email"].'</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="profilePage.php">
                                        
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="New Email"/>
                                       
                                        </div>
                                        <div class="col-4">
                                          
                                            <button class="btn btn-outline-secondary" type="submit" value="email" name="submitEmail">Edit</button>
                                        </div>
                                    </div>
                                   
                             </form>
                            </div>
                           <div class="col-4 col-lg-4 offset-1" >
                              <p class="p3">Password:</p>
                               </div>
                               <div class="col-4 col-lg-4" >
                              <p class="p3">***************</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="profilePage.php">
                                        
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    <div class="row">
                                        <div class="col-8">
                                            <input type="password" class="form-control" name="NewPassword" id="NewPassword" placeholder="New Password"/>
                                        </div>
                                        <div class="col-4">
                                          
                                    <button class="btn btn-outline-secondary" type="submit" value="Password" name="submitPassword">Edit</button>
                                    </div>
                                    </div>
                             </form>
                           </div>
                           <div class="col-4 col-lg-4 offset-1" >
                              <p class="p3" style="color: red">Delete Account:</p>
                               </div>
                               <div class="col-4 col-lg-4" >
                              <p class="p3" style="color: red">Warning Permanent</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="profilePage.php">
                                        
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    <div class="row">
                                        <div class="col-7">
                                            <input type="password" class="form-control" name="passwordAccount" id="passwordAccount" placeholder="Password"/>
                                        </div>
                                        <div class="col-5">
                                    <button class="btn btn-outline-secondary" type="submit" value="Password" name="deleteAccount">Delete</button>
                                    </div>
                                    </div>
                             </form>
                           </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <br>
    </div>
    
  ';



        if(isset($_POST["submitProfilePicture"]))
        {

            echo'submit the new profile picture please';

            $target_dir= "CSS-Content/ProfilePictures/";
            $userIdent = $row["user_id"];
            $uploadFile = $_FILES["picToUpload"];


            if(($uploadFile["type"] == "image/jpg" || $uploadFile["type"] == "image/jpeg" || $uploadFile["type"] == "image/png") && $uploadFile["size"] < 1048576)
            {
                if($uploadFile["error"] > 0)
                {
                    echo "Error: " . $uploadFile["error"] . "<br/>";
                }
                else
                {
                    $insertSQL = "UPDATE tbusers SET profileImage='".$uploadFile['name']."' WHERE user_id=".$userIdent;
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
            echo'<script>window.location.href = "../index.html";</script>';


        }

        if(isset($_POST["submitUsername"]))
        {

            $insertSQL = "UPDATE tbusers SET username='".$_POST['username']."' WHERE user_id=".$row["user_id"];
            $r = mysqli_query($conn, $insertSQL);
            echo'<script>window.location.href = "../index.html";</script>';
        }

        if(isset($_POST["submitName"]))
        {

            $insertSQL = "UPDATE tbusers SET name='".$_POST['nameName']."' WHERE user_id=".$row["user_id"];
            $r = mysqli_query($conn, $insertSQL);
            echo'<script>window.location.href = "../index.html";</script>';

        }

        if(isset($_POST["submitSurname"]))
        {

            $insertSQL = "UPDATE tbusers SET surname='".$_POST['surname']."' WHERE user_id=".$row["user_id"];
            $r = mysqli_query($conn, $insertSQL);
            echo'<script>window.location.href = "../index.html";</script>';
        }

        if(isset($_POST["submitEmail"]))
        {

            $insertSQL = "UPDATE tbusers SET email='".$_POST['email']."' WHERE user_id=".$row["user_id"];
            $r = mysqli_query($conn, $insertSQL);
            echo'<script>window.location.href = "../index.html";</script>';
        }

        if(isset($_POST["submitPassword"]))
        {
            $insertSQL = "UPDATE tbusers SET password='".$_POST['NewPassword']."' WHERE user_id=".$row["user_id"];
            $r = mysqli_query($conn, $insertSQL);
            echo'<script>window.location.href = "../index.html";</script>';
        }

        if(isset($_POST["deleteAccount"])&&$_POST['passwordAccount']==$_POST['loginPass'])
        {
            //echo '<script>alert("Deleting")</script>';
            $deleteSQL = "DELETE FROM tbusers WHERE password='".$_POST['passwordAccount']."'AND user_id=".$row["user_id"]; "DELETE FROM tbgallery WHERE user_id=".$row["user_id"]; "DELETE FROM tbcomments WHERE user_id=".$row["user_id"]; "DELETE FROM tbalbumcomments WHERE user_id=".$row["user_id"];
            echo '<script>alert("Your Account Has Been Deleted")</script>';
            $r = mysqli_query($conn, $deleteSQL);

            echo'<script>window.location.href = "../index.html";</script>';
        }

    }
}
                echo'
</body>
</html>';




?>