
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
  <form id="signInForm">
        <input type="text" id="username" placeholder="Username" required>
        <input type="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <button type="submit">Sign in</button>
        <button type="button" id="signinButton">Login</button>
    </form>
</form>

     
    <script>
      document.getElementById('loginButton').addEventListener('click', function() {
            window.location.href = 'login.php';
        });
  document.getElementById('signInForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username !== "" && password !== "") {
        var passwordPattern = new RegExp('(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}');
        if (!passwordPattern.test(password)) {
            alert('Invalid password format');
            return;
        }

        const encoder = new TextEncoder();
        const data = encoder.encode(password);
        const hash = await window.crypto.subtle.digest('SHA-256', data);
        
        let hashArray = Array.from(new Uint8Array(hash));
        let hashedPassword = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');

        console.log(`Username: ${username}, Password: ${hashedPassword}`);

// Redirect to home.html
window.location.href = "home.php";
} else {
alert('Invalid username or password');
}
});
        </script>
  </body>
</html>

