
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
  <form action="login.php" method="post>
  <h2> login </h2>
  <?php if(isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <label> Username</label>
    <input type="text" name="uname" placeholder="Username"><br>
    <label>Password</label>
    <inpit type="password" name="password" placeholder="Password"><br>

    <button tupe="submit">LOgin</button>


</form>

  </body>
</html>

