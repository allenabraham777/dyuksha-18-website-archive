<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INFORMALS</title>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <style>
    *{
        padding:0;
        margin:0;
    }
    body{
        background-image:url(images/bgi.jpg);
        background-position: center;
        background-attachment:fixed;
        background-size: cover;
    }
    @media(max-width:500px)
    {
        .mobile{
            width:100vw;
        }
        .non-mobile{
            display:none;
        }
    }
    @media(min-width:500px)
    {
        .mobile{
            display:none;
        }
        .non-mobile{
            width:100%;
        }
    }
    </style>
</head>
<body>
    <img class="mobile" src="images/DROP.png">
    <img class="non-mobile" src="images/1080.jpg">
</body>
</html>