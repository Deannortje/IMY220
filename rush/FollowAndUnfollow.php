<!DOCTYPE html>
<html>
<head>
    <title>Follow&Unfollow - D3</title>
    <meta charset="utf-8" />
    <meta name="author" content="Dean Nortje">

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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Ubuntu">

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

if($email && $pass) {
    $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
    global $conn;
    include('includes/config.php');
    $res = $conn->query($query);

    if ($row = mysqli_fetch_array($res)) {


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
        
                                    <p class="p3" style="text-align: center; font-size: 50px">Follow Users</p>
                                        <div class="container">
                                            <section class="mt-5">
                                                <div class="row">
                                                    <div class="col-12" >
                                                       <div class="card-border-dark mt-0 mb-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class=" col-12 col-sm-12 mb-4" >
                                                                       <div align="center">
                                                                               
                                                                            <form class="ProfileForm" method="POST" action="FollowAndUnfollow.php" enctype="multipart/form-data">
                                                                                <input class="followerSearch" type="text" name="searchfollower" id="searchfollower" placeholder="S E A R C H ... "/>
                                                                                 <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                                                                 <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />   
                                                                                 <button class="btn btn-outline-secondary" align="center" type="submit"  name="submitAddFriend"><i class="fas fa-search"></i> S E A R C H ...  </button>
                                                                             
                                                                            </form>
                                                                       </div>
                                                                        
                                                                        </br>
                                                                        ';
                                                                            if(isset($_POST["searchfollower"])) {
                                                                                $queryUsers = "SELECT * FROM tbusers WHERE (tbusers.username NOT IN (SELECT followed_username FROM `tbfollowers` WHERE username = '".$_POST["loginEmail"]."') AND `username` != '".$_POST["loginEmail"]."') AND tbusers.username LIKE '%".$_POST["searchfollower"]."%'";
                                                                                global $conn;
                                                                                include('includes/config.php');
                                                                                $resUsers = $conn->query($queryUsers);
                                                                            }
                                                                            else
                                                                            {
                                                                                $queryUsers = "SELECT * FROM tbusers WHERE tbusers.username NOT IN (SELECT followed_username FROM `tbfollowers` WHERE username = '".$_POST["loginEmail"]."') AND `username` != '".$_POST["loginEmail"]."'";
                                                                                global $conn;
                                                                                include('includes/config.php');
                                                                                $resUsers = $conn->query($queryUsers);
                                                                            }

                                                                                while ($rowUser = $resUsers->fetch_assoc()) {
                                                                                    echo '
                                                                            <form class="ProfileForm" method="POST" action="FollowAndUnfollow.php" enctype="multipart/form-data">
                                                                                <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                                                                <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                                                                                
                                                                                <div class="row">
                                                                                <div class="offset-1 col-2 mt-3">
                                                                                    <img class="smallPP" align="right" src="CSS-Content/ProfilePictures/' . $row["profileImage"] . '" />
                                                                                </div>
                                                                                <div class="col-4 mt-3">
                                                                                    <a class="followLink p3">' . $rowUser["username"] . '</a>
                                                                                </div>
                                                                                </br>
                                                                                </br>
                                                                                <div class="col-5 mt-3" align="center" >
                                                                                    <input type="hidden" name="follow" value =' . $rowUser["username"] . ' />
                                                                                    <button class="btn btn-outline-secondary" type="submit" value="addFriend" name="submitAddFriend">F O L L O W</button>
                                                 
                                                                                </div>
                                                                                </div>
                                                                            </form>';
                                                                                }


                                                                            echo'
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                <p class="p3" style="text-align: center; font-size: 50px">UnFollow Users</p>
                                        <div class="container">
                                            <section class="mt-5">
                                                <div class="row">
                                                    <div class="col-12" >
                                                       <div class="card-border-dark mt-0 mb-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class=" col-12 col-sm-12 mb-4" >
                                                                       <div align="center">
                                                                               
                                                                            <form class="ProfileForm" method="POST" action="FollowAndUnfollow.php" enctype="multipart/form-data">
                                                                                <input class="followerSearch" type="text" name="searchunfollower" id="searchunfollower" placeholder="S E A R C H ... "/>
                                                                                 <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                                                                 <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />   
                                                                                 <button class="btn btn-outline-secondary" align="center" type="submit" ><i class="fas fa-search"></i> S E A R C H ...  </button>
                                                                             
                                                                            </form>
                                                                       </div>
                                                                        
                                                                        </br>
                                                                        ';
                                                                                if(isset($_POST["searchunfollower"])) {
                                                                                    $queryUsers = "SELECT * FROM tbfollowers WHERE tbfollowers.username = '".$_POST["loginEmail"]."' AND followed_username LIKE '%".$_POST["searchunfollower"]."%'";
                                                                                    global $conn;
                                                                                    include('includes/config.php');
                                                                                    $resUsers = $conn->query($queryUsers);
                                                                                }
                                                                                else
                                                                                {
                                                                                    $queryUsers = "SELECT * FROM tbfollowers WHERE tbfollowers.username = '".$_POST["loginEmail"]."' ";
                                                                                    global $conn;
                                                                                    include('includes/config.php');
                                                                                    $resUsers = $conn->query($queryUsers);
                                                                                }
                                                                                while ($rowUser = $resUsers->fetch_assoc()) {
                                                                                echo '
                                                                            <form class="ProfileForm" method="POST" action="FollowAndUnfollow.php" enctype="multipart/form-data">
                                                                                <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                                                                                <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />
                                                                                
                                                                                <div class="row">
                                                                                <div class="offset-1 col-2 mt-3">
                                                                                    <img class="smallPP" align="right" src="CSS-Content/ProfilePictures/' . $row["profileImage"] . '" />
                                                                                </div>
                                                                                <div class="col-4 mt-3">
                                                                                    <a class="followLink p3">' . $rowUser["followed_username"] . '</a>
                                                                                </div>
                                                                                </br>
                                                                                </br>
                                                                                <div class="col-5 mt-3" align="center" >
                                                                                
                                                                                    <input type="hidden" name="unfollow" value =' . $rowUser["followed_username"] . ' />
                                                                                    <button class="btn btn-outline-secondary" type="submit" value="addFriend" name="submitAddFriend">U N F O L L O W</button>
                                                 
                                                                                </div>
                                                                                </div>
                                                                            </form>
                                                                            
                                                                            ';
        }

        if(isset($_POST["follow"])){

            $sqlFollowers = "INSERT INTO tbfollowers (ff_id, username, followed_username) VALUES (null,'".$_POST["loginEmail"]."','".$_POST["follow"]."')";
            echo $sqlFollowers;
            global $conn;
            include ('includes/config.php');
            $res = mysqli_query($conn, $sqlFollowers) == TRUE;
            echo '
        
       <script type="text/javascript">
            $(window).on("load", function() {
                // Handler for .load() called.
                //alert("document is ready");
                $("form#reloadForm").submit();
                
                });
        </script>
    ';

        }
        if(isset($_POST["unfollow"])){

            $sqlFollowers = "DELETE FROM tbfollowers WHERE username = '".$_POST["loginEmail"]."' AND followed_username = '".$_POST["unfollow"]."'";
            global $conn;
            include ('includes/config.php');
            $res = mysqli_query($conn, $sqlFollowers) == TRUE;
            echo '
         <script type="text/javascript">
            $(window).on("load", function() {
                // Handler for .load() called.
                //alert("document is ready");
                $("form#reloadForm").submit();
                
                });
        </script>
    ';


        }
        echo'
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
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
<form class="ProfileForm" id="reloadForm" method="POST" action="FollowAndUnfollow.php" enctype="multipart/form-data">
                 <input type="hidden" name="loginEmail" value =' . $_POST["loginEmail"] . ' />
                 <input type="hidden" name="loginPass" value =' . $_POST["loginPass"] . ' />   
                 <button type="submit" class="reload invisible" value="Edit" />
            </form>
</body>
</html>';




    }else {
        echo '<div class="alert alert-danger mt-3" role="alert">
  						An Error Validating you account please login again					
                        <a href="../index.html">Login Click Here</a>
  					</div>';
    }
}else{
    echo '<div class="alert alert-danger mt-3" role="alert">
  						Error
  						<a href="../index.html">Error Click Here</a>
  					</div>';
}
                                                ;?>