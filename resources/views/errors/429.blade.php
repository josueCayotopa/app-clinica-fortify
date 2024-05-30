<!-- resources/views/errors/429.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Too Many Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8d7da;
        }
        .container {
            text-align: center;
        }
        .timer {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Too Many Requests</h1>
        <p>You have made too many login attempts. Please try again in <span id="countdown"></span> seconds.</p>
    </div>

    <script>
        // Get the time to wait from the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        let waitTime = parseInt(urlParams.get('retry_after')) || 60; // Default to 60 seconds

        // Update the countdown every second
        const countdownElement = document.getElementById('countdown');
        countdownElement.textContent = waitTime;
        const interval = setInterval(() => {
            waitTime--;
            countdownElement.textContent = waitTime;
            if (waitTime <= 0) {
                clearInterval(interval);
                location.reload(); // Reload the page after countdown ends
            }
        }, 1000);
    </script>
</body>
</html>