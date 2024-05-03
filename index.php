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
    <form id="signInForm" action="login.php" method="post">
      <h2> login </h2>
      <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <input type="text" id="username" name="uname" placeholder="Username" required>
      <input type="password" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <button type="submit">Login</button>
    </form>

    <script>
     document.getElementById('signInForm').addEventListener('submit', async function(event) {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username !== "" && password !== "") {
        var passwordPattern = new RegExp('(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}');
        if (!passwordPattern.test(password)) {
            alert('Invalid password format');
            event.preventDefault();
            return;
        }

        const encoder = new TextEncoder();
        const data = encoder.encode(password);
        const hash = await window.crypto.subtle.digest('SHA-256', data);
        
        let hashArray = Array.from(new Uint8Array(hash));
        let hashedPassword = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');

        console.log(`Username: ${username}, Password: ${hashedPassword}`);
    } else {
        alert('Invalid username or password');
        event.preventDefault();
    }
});
    </script>
  </body>
</html>
