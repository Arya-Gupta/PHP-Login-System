<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            *
            {
                box-sizing: border-box;
                text-decoration: none;
                margin: 0;
                padding: 0;
            }
            body { background-color: lightgray; }
            form { width: 50%; }
            span { margin-left: 50px; }
            .navbar-brand { cursor: pointer; }
            a 
            { 
                color: white; 
                text-decoration: none; 
                transition-duration: 0.5s;
            }
            a:hover { color: lightgray; }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <span class="navbar-brand mb-0 h1" style="margin-left: 50px; margin-right: 1200px;">PHP Login System</span>
                <span class="navbar-brand mb-0 h1"><a href="/php-loginsys/signup.php">Signup</a></span>
                <span class="navbar-brand mb-0 h1"><a href="/php-loginsys/login.php">Login</a></span>
                <span class="navbar-brand mb-0 h1"><a href="/php-loginsys/logout.php">Logout</a></span>
            </div>
        </nav>
    </body>
</html>