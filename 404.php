<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>404 Not Found</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f6f9ff;
            font-family: 'Arial', sans-serif;
        }

        .container404 {
            text-align: center;
        }

        .error-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .rotate {
            font-size: 10rem;
            color: red;
        }

        p {
            font-size: 1.2rem;
            color: #333;
        }

        .svg-container {
            margin-top: 20px;
        }

        .home-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .home-link:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container404">
            <h1 class="rotate">404</h1>
            <h2>Oops! The page you are looking for could not be found.</h2>
            <p>Sorry but the page you are looking for does not exist, has been removed, 
            name changed or is temporarily unavailable</p>
            <div class="svg-container">
              
                <a href="#" class="home-link" onclick="goBack()">Go Back</a>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
