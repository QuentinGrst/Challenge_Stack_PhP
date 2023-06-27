<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <?= (!empty($header)) ? $header : ""; ?>
</head>

<body>
    <header>
        <nav>
            <div class="menu">
                <div><a href="/">Home</a></div>
                <?php if (empty($_SESSION['user'])) :  ?>
                    <div><a href="/SignIn">Inscription</a></div>
                    <div><a href="/Login">Connexion</a></div>
                <?php else :  ?>
                    <div><a href="/Order">Commandes</a></div>
                    <div><a href="/Logout">Logout</a></div>
                <?php endif ?>

            </div>
        </nav>
    </header>
    <div class="content">
        <?= $content; ?>
    </div>
</body>

</html>