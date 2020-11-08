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
    $query = "SELECT * FROM tbadmin WHERE username = '$email' AND password = '$pass'";
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
                <h1 id="slogan">ADMIN</h1>
            </div>
        </div>
    </section>
</div>

<br>
<br>
<div class="container">
    <section>
        <div class="row">
            <div class="col-12" style="text-align: center">
                <form method="post" class="inline" action="adminPage.php" >
                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                    <input type="hidden" name="deleteAllActivity" value="null"/>
                    
                    <button type="submit" class="btn btn-outline-secondary">Delete All Activity</button>
                </form>
                <br>
                <form method="post" class="inline" action="adminPage.php" >
                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                    <input type="hidden" value="null" name ="deleteAllPosts" />
                    
                    <button type="submit" class="btn btn-outline-secondary">Delete All Posts</button>
                </form>
                <br>
                <form method="post" class="inline" action="adminPage.php" >
                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                    <input type="hidden" value="null" name ="deleteAllUsers" />
                    
                    <button type="submit" class="btn btn-outline-secondary">Delete All Users</button>
                </form>
                
            </div>
        </div>
    </section>
</div>
';

        if(isset($_POST["deleteAllActivity"]))
        {
            $sql = "DELETE FROM tbusers WHERE user_id>0";
            $sql = "DELETE FROM tbgallary WHERE user_id>0";
            $r = mysqli_query($conn, $sql);
        }
        if(isset($_POST["deleteAllPosts"]))
        {
            $sql = "DELETE FROM tbgallary WHERE user_id>0";
            $r = mysqli_query($conn, $sql);
        }
        if(isset($_POST["deleteAllUsers"]))
        {
            $sql = "DELETE FROM tbusers WHERE user_id>0";
            $r = mysqli_query($conn, $sql);
        }

        echo'


<div class="container">
    <section id="forms" class="mt-5">
        
<p class="p3" style="text-align: center; font-size: 50px">Users</p>

<div class="container">
    <section id="forms" class="mt-5">
        <div class="row">

';
        $sqlUsers = "SELECT * FROM tbusers" ;
        $resultUsers = $conn->query($sqlUsers);

        while($rowUsers = $resultUsers->fetch_assoc()) {
            echo '
                
                            <div class="col-6" >
                                <p class="p3">'.$rowUsers["username"].'</p>
                             </div>
                             
                             <form method="post" class="inline" action="adminPage.php" >
                                <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                                <input type="hidden" name="editUser" value ='.$rowUsers["username"].' />
                                
                                <button type="submit" class="btn btn-outline-secondary btn-lg">Edit</button>
                            </form>

                ';
        }
        echo'

            </div>
    </section>
</div>
';
        if(isset($_POST["editUser"]))
        {
            $userValue = $_POST["editUser"];
            $query = "SELECT * FROM tbusers WHERE email = '$userValue' or username = '$userValue'";
            global $conn;
            include('includes/config.php');
            $res = $conn->query($query);

            if($row = mysqli_fetch_array($res)) {
                echo '

<p class="p3 mt-5" style="text-align: center; font-style: italic">'.$userValue.'</p>
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
                              <p class="p3">' . $row["profileImage"] . '</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="profilePage.php" enctype="multipart/form-data">
                                        
                                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                                    
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
                                <p class="p3">' . $row["username"] . '</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="adminPage.php">
                                        
                                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
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
                              <p class="p3">' . $row["name"] . '</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="adminPage.php">
                                        
                                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
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
                              <p class="p3">' . $row["surname"] . '</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                               <form class="ProfileForm" method="POST" action="adminPage.php">
                                        
                                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
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
                              <p class="p3">' . $row["email"] . '</p>
                               </div>
                            <div class="col-3 col-lg-3" >
                              <form class="ProfileForm" method="POST" action="adminPage.php">
                                        
                                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
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
                              <form class="ProfileForm" method="POST" action="adminPage.php">
                                        
                                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
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
                              <form class="ProfileForm" method="POST" action="adminPage.php">
                                        
                                    <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                    <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
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


                if (isset($_POST["submitProfilePicture"])) {

                    echo 'submit the new profile picture please';

                    $target_dir = "CSS-Content/ProfilePictures/";
                    $userIdent = $row["user_id"];
                    $uploadFile = $_FILES["picToUpload"];


                    if (($uploadFile["type"] == "image/jpg" || $uploadFile["type"] == "image/jpeg" || $uploadFile["type"] == "image/png") && $uploadFile["size"] < 1048576) {
                        if ($uploadFile["error"] > 0) {
                            echo "Error: " . $uploadFile["error"] . "<br/>";
                        } else {
                            $insertSQL = "UPDATE tbusers SET profileImage='" . $uploadFile['name'] . "' WHERE user_id=" . $userIdent;
                            $r = mysqli_query($conn, $insertSQL);
                            move_uploaded_file($uploadFile["tmp_name"], $target_dir . $uploadFile["name"]);
                            //echo "Stored in: " . $target_dir . $uploadFile["name"];

                        }
                    } else {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                                            An Error occurred while uploading the image...
                                        </div>';
                    }
                    echo '<script>window.location.href = "../index.html";</script>';


                }

                if (isset($_POST["submitUsername"])) {

                    $insertSQL = "UPDATE tbusers SET username='" . $_POST['username'] . "' WHERE user_id=" . $row["user_id"];
                    $r = mysqli_query($conn, $insertSQL);
                    echo '<script>window.location.href = "../index.html";</script>';
                }

                if (isset($_POST["submitName"])) {

                    $insertSQL = "UPDATE tbusers SET name='" . $_POST['nameName'] . "' WHERE user_id=" . $row["user_id"];
                    $r = mysqli_query($conn, $insertSQL);
                    echo '<script>window.location.href = "../index.html";</script>';

                }

                if (isset($_POST["submitSurname"])) {

                    $insertSQL = "UPDATE tbusers SET surname='" . $_POST['surname'] . "' WHERE user_id=" . $row["user_id"];
                    $r = mysqli_query($conn, $insertSQL);
                    echo '<script>window.location.href = "../index.html";</script>';
                }

                if (isset($_POST["submitEmail"])) {

                    $insertSQL = "UPDATE tbusers SET email='" . $_POST['email'] . "' WHERE user_id=" . $row["user_id"];
                    $r = mysqli_query($conn, $insertSQL);
                    echo '<script>window.location.href = "../index.html";</script>';
                }

                if (isset($_POST["submitPassword"])) {
                    $insertSQL = "UPDATE tbusers SET password='" . $_POST['NewPassword'] . "' WHERE user_id=" . $row["user_id"];
                    $r = mysqli_query($conn, $insertSQL);
                    echo '<script>window.location.href = "../index.html";</script>';
                }s

                if (isset($_POST["deleteAccount"])) {
                    //echo '<script>alert("Deleting")</script>';
                    $deleteSQL = "DELETE FROM tbusers WHERE user_id=" . $row["user_id"];
                    "DELETE FROM tbgallery WHERE user_id=" . $row["user_id"];
                    "DELETE FROM tbcomments WHERE user_id=" . $row["user_id"];
                    "DELETE FROM tbalbumcomments WHERE user_id=" . $row["user_id"];
                    echo '<script>alert("Your Account Has Been Deleted")</script>';
                    $r = mysqli_query($conn, $deleteSQL);

                    echo '<script>window.location.href = "../index.html";</script>';
                }
            }
        }
    }
}
echo'
<br>
<br>
</body>
</html>';




?>