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
               
            </div>
        </div>
    </section>
</div>
<div class="container">
    <section id="forms" class="mt-5">
        <div class="row justify-content-center ">
            <div class="col-0 col-sm-0 mx-0">
     
          
            </div>
        </div>
        
       
<p class="p3" style="text-align: center; font-size: 50px">Album Content</p> 


<div class="container">
    <section id="forms" class="mt-5">
    <div class="row justify-content-center ">
      <button class="btn btn-outline-secondary" type="button">Mark As Private</button>
    </div>
    <br>
        <div class="row justify-content-center ">
       
       
             <form class="ProfileForm" method="POST" action="albumUploads.php" enctype="multipart/form-data">
                        
                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                    <input type="hidden" name="album_id" value ='.$_POST["album_id"].' />
                    
                    <div class="row">
                        <div class="col-8">
                            <input type="file" class="form-control" name="picToUpload" id="picToUpload" />
                        </div>
                        <div class="col-4">
                          
                    <button class="btn btn-outline-secondary" type="submit" value="Picture" name="submitPicture">Add to Album</button>
                    </div>
                </div>
             </form>
         </div>
    </section>
</div>
<div class="container">
    <section id="forms" class="mt-5">
        <div class="row">

';
        $sqlPosts = "SELECT * FROM tbaimages WHERE album_id = " . $_POST["album_id"] . " ";
        $resultPosts = $conn->query($sqlPosts);

            while ($rowPosts = $resultPosts->fetch_assoc()) {
                echo '
                
                        <div class="col-sm-6 col-12 mb-3">
                            <form method="post" class="inline" action="albumUploads.php" >
                                <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                                <input type="hidden" name="album_id" value =' . $rowPosts["album_id"] . ' />
                                
                                <button type="submit" class="imageButtonClass">
                                    <a href="./PostPage.php?' . $rowPosts["filename"] . '">
                                        <img src="CSS-Content/gallery/' . $rowPosts["filename"] . '" class="posts" alt="CSS-Content/samples/car.jpg"/>
                                    </a>
                                </button>
                            </form>
                        </div>
             
                ';


            }
                if(isset($_POST["submitPicture"]))
                {

                    $target_dir= "CSS-Content/albums/";
                    $uploadFile = $_FILES["picToUpload"];


                    if(($uploadFile["type"] == "image/jpg" || $uploadFile["type"] == "image/jpeg" || $uploadFile["type"] == "image/png") && $uploadFile["size"] < 1048576)
                    {
                        if($uploadFile["error"] > 0)
                        {
                            echo "Error: " . $uploadFile["error"] . "<br/>";
                        }
                        else
                        {
                            $insertSQL = "INSERT INTO tbaimages (imagecollect_id ,album_id,filename) VALUES (null,".$_POST["album_id"].",'".$uploadFile["name"]."')";
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
                    //echo'<script>window.location.href = "./albumPage.php";</script>';






        }
        echo '

            </div>
    </section>
</div>

<p class="p3" style="text-align: center; font-size: 50px">Add Friends to Albums</p>
<div class="container">
    <section class="mt-5">
        <div class="row">
            <div class="col-12" >
               <div class="card-border-dark mt-0 mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6" >
                                 <div class="card-body m-2">
                                    <div class="postPageOverflow" style="max-height:200px;width:100%">';

        $queryUsers = "SELECT * FROM tbusers" ;
        global $conn;
        include('includes/config.php');
        $resUsers = $conn->query($queryUsers);

        while($rowUser = $resUsers->fetch_assoc()){
            echo'<a class="followLink p3">' . $rowUser["username"] . '</a> ';

        }



        echo'
                                    
                                    </div>
                                 </div>
                            </div>
                            
                            <div class="col-12 col-sm-6 mt-4" >
                                <form class="ProfileForm" method="POST" action="albumUploads.php" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                                    <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                                    <input type="hidden" name="album_id" value =' . $rowPosts["album_id"] . ' />
                                    
                                    <div class="row">
                                    <div class="col-8 pt-5 mt-4">
                                    <input type="text" class="form-control" name="usernameFollow" id="usernameFollow" placeholder="example: TheLegend27"/>
                                    </div>
                                    <div class="col-4">
                                    
                                    <button class="btn btn-outline-secondary" type="submit" value="addFriend" name="submitAddFriend">Add User to Album</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-outline-secondary" type="submit" value="unFriend" name="submitUnFriend"> Remove User from Album</button>
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
</div>









</body>
</html>';

    }

}


?>