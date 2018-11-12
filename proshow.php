<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proshow</title>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <style>
    *{
        margin:0;
        padding:0;
        font-family:Arial;
    }
    .container-proshow{
        height:100vh;
        width:100vw;
        background:#000000;
        overflow-X:hidden;
    }
    .container-proshow .ticket{
        color: #ffffff;
        font-size:30px;
    }
    .container-proshow .ticket a{
        color: #0080ff;
        text-decoration:none;
    }
    @media (min-width:600px)
    {
        .container-proshow .tile{
            height:90vh;
        }

    }
    @media (max-width:600px)
    {
        .container-proshow .tile{
            margin-top:50px;
            width:100vw;
        }
    }
    </style>
</head>
<body>
    <div class="container-proshow">
        <center>
            <div>
                <img src="images/masala coffee.jpg" class="tile">
            </div>
            <div class="ticket">
                For tickets <a href="https://bit.ly/Masalacoffee">click here</a>
            </div>
        </center>
    </div>
</body>
</html>