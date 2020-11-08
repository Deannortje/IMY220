<?php

$email = isset($_POST["loginEmail"]) ? $_POST["loginEmail"] : false;
$pass = isset($_POST["loginPass"]) ? $_POST["loginPass"] : false;

if($email && $pass) {
    $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
    global $conn;
    include('includes/config.php');
    $res = $conn->query($query);
    if ($row = mysqli_fetch_array($res)) {

        if (isset($_POST["submit"])) {
            $userIdent = $row["user_id"];
            $imageIdent = $_POST["image_id"];
            $comment = $row["username"] . ": " . $_POST["comment"];
//            echo "about to insert ";
            $insertSQL = "INSERT INTO tbcomments (comment_id,CommentText,image_id,user_id) VALUES (null,'".$comment."',$imageIdent,$userIdent)";
            $res = mysqli_query($conn, $insertSQL);
            //echo "insert done ".$insertSQL;

            echo ' 
                 <!DOCTYPE html>
                <html>
                <head>
                
                <script type="text/javascript">
                        function sub() {
                         
                         document.getElementById("submit").click(); 
                        }
                </script>
                
                </head>
                <body onload="sub()">
                    <form class="commentForm" method="POST" action="homePage.php">
                        <input type="hidden" name="loginEmail" value ='.$_POST["loginEmail"].' />
                        <input type="hidden" name="loginPass" value ='.$_POST["loginPass"].' />
                        <button type="submit" id="submit"></button>
                    </form>
                </body>
                    </html>
                    '

            ;



        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">
                                            An Error occurred while uploading the comment...
                                        </div>';
        }
    }
}