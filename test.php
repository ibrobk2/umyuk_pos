<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jquery</title>
    <!-- <script src="jquery/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h2>Hello</h2>

    <form action="">
        <input type="text" id="username" placeholder="Enter Usernsme">
    </form>

    <button id="btn">Click</button>

    <div class="result">
        <p id="txt"></p>
    </div>


    <script>
        $(document).ready(function(){
            // let btn = $("#btn"); //document.querySelector("#btn")
            //
    

            $("#btn").click(function(){
                var user = $("#username").val();
               $.ajax({
                url: "fetch.php",
                type: "POST",
                data: {username: user},
                success: function(res){
                    $("#txt").html(res);
                }

               });
            })

        })
    </script>
</body>
</html>