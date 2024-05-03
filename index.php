<?php
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=Username is required");
        exit();
    } else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        // Hash the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // Insert the user into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$uname', '$pass')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "User registered successfully!";
            exit();
        } else {
            header("Location: index.php?error=Something went wrong, please try again");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
  <head>
    <meta charset="UTF-8">
    <title>MAMP</title>
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
      }
      form {
        display: flex;
        flex-direction: column;
        width: 400px;
        padding: 50px;
        border: 3px solid #8C7140;
        border-radius: 5px;
        background-color: #FFC857;
      }
      input {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #FAF7EF;
        border-radius: 5px;
      }
      button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #23212C;
        color: #FAF7EF;
        cursor: pointer;
      }
      button:hover {
        background-color: #3A3637;
      }
    </style>
  </head>
  <body>
  <form action="signin.php" method="post">
        <label for="uname">Username:</label><br>
        <input type="text" id="uname" name="uname" required><br>
        <label for="pwd">Password:</label><br>
        <input type="password" id="pwd" name="password" required><br>
        <input type="submit" value="Sign In">
    </form>
  </body>
</html>
