<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>UMYUK POS:: Login Page</title>
</head>
<body>
    <form action="./auth/login.php" class="form w-50 m-auto mt-5" method="post">
        <h2 class="text-center text-primary">User Login</h2>
    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input
            type="text"
            class="form-control"
            name="username"
            id=""
           
            placeholder="Enter Username"
        />
   
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input
            type="password"
            class="form-control"
            name="pass"
            id=""
           
            placeholder="Enter Password"
        />

        <button type="submit" class="btn btn-primary mt-3 w-100" name="login_btn">Login</button>
   
    </div>

    </form>
    
</body>
</html>
