<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>UMYUK POS:: Add User</title>

   <style>
     .errors{
        background-color: #e7b29c; 
        color: brown;
        width: 250px;
        margin: auto;
        margin-top: 20px;
        padding: 10px;
        border-radius: 1rem;

    }
   </style>
</head>
<body>
    <?php
    include_once("../controller/add_user.php");
    include_once("../../connection/index.php");

    if(count($errors)>0): ?>
    <div class="errors">
        <?php foreach($errors as $err): ?>
            <ul><?=$err; ?></ul>
        <?php endforeach; ?>
    </div>
    <?php endif;?>


<?php
  



?>
    <form action="index.php" class="form w-50 m-auto mt-5" method="post">
        <h2 class="text-center text-success">Add User</h2>
        <div class="mb-3">
        <label for="" class="form-label">Full Name</label>
        <input
            type="text"
            class="form-control"
            name="fname"
            id=""
            value="<?=$full_name; ?>"
           
            placeholder="Enter Full Name"
        />
   
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input
            type="text"
            class="form-control"
            name="username"
            id=""
            value="<?=$username; ?>"
           
            placeholder="Enter Username"
        />
    </div>
   
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input
            type="email"
            class="form-control"
            name="email"
            id=""
            value="<?=$email; ?>"
           
            placeholder="Enter Email"
        />
   
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Role</label>
       <select name="role" id="" class="form-select">
        <?php if($role=="") : ?>
            <option value="" >Select</option>
            <option value="Admin">Admin</option>
            <option value="Staff">Staff</option>
        <?php else: ?>
            <option  value="<?=$role; ?>"><?=$role; ?></option>
        <?php endif; ?>
       </select>
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
    </div>

   

        <div class="mb-3">
        <label for="" class="form-label">Confirm Password</label>
        <input
            type="password"
            class="form-control"
            name="cpass"
            id=""
            
           
            placeholder="Enter Password"
        />
        </div>

        <button type="submit" class="btn btn-success mt-3 w-100" name="add_user">Add User</button>
   
    </div>

    </form>
    
</body>
</html>
