<!doctype html>
<html lang="en">
    <head>
        <title>Verify Email</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <?php 
         session_start();
          

        if(isset($_GET['email'])){
            $email = $_GET['email'];
            $_SESSION['email'] = $email;
            
        }else{
            $email = $_SESSION['email'];
        }
        
        ?>
        <header>
            <!-- place navbar here -->
            <h2 class="text-center text-success mt-5">Verify Email</h2>
        </header>
        <main>
            <form action="verify.php" class="form w-25 m-auto mt-5" method="post">
                <label for="">Enter OTP Code:</label>
                <div class="mb-3">
                    <!-- <label for="" class="form-label">Name</label> -->
                    <!-- <input type="hidden" name="email" value="<?=$email; ?>"> -->
                    <input
                        type="text"
                        class="form-control"
                        name="otp"
                        id=""
                        aria-describedby="helpId"
                        placeholder="Enter OTP from Email"
                    />
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
                <button
                    type="submit"
                    class="btn btn-success w-100"
                    name="verify_btn"
                >
                    Verify Email
                </button>
                
                
            </form>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
