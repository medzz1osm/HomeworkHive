<!DOCTYPE html>
<html>
<head>
    <title>Countdown Timer</title>
    <script>
        function startTimer() {
            var time = document.getElementById('time').value;
            var countdown = document.getElementById('countdown');
            var intervalId = setInterval(function() {
                time--;
                countdown.innerHTML = "Time remaining: " + time + " seconds";
                if (time <= 0) {
                    clearInterval(intervalId);
                    countdown.innerHTML = "Time's up!";
                }
            }, 1000);
        }
    </script>
</head>
<body>
    <h2>Countdown Timer</h2>
    Set time (in seconds): <input type="number" id="time"><br>
    <button onclick="startTimer()">Start Timer</button>
    <p id="countdown"></p>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $time = $_POST['time'];

    // Convert time to seconds
    $seconds = intval($time);

    // Start countdown
    while ($seconds > 0) {
        echo "Time remaining: " . $seconds . " seconds<br>";
        sleep(1); // Wait for 1 second
        $seconds--;
    }

    echo "Time's up!";
}
?>

