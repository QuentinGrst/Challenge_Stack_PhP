<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <?= (!empty($header)) ? $header : ""; ?>
</head>

<body>
    <header>
        <nav class="role_<?= $_SESSION['user']->role ?? 'none' ?>">
            <div class="menu">
                <div class="home"><a href="/"><i class="fas fa-home"></i></a></div>
                <?php if (empty($_SESSION['user'])) :  ?>
                    <div><a href="/SignIn">Inscription</a></div>
                    <div><a href="/Login">Connexion</a></div>
                <?php else :  ?>
                        <?php if ($_SESSION['user']->role == "client") :  ?>
                            <div><a href="/Order">Commandes</a></div>
                            <div><a href="/Basket">Panier</a></div>
                        <?php else : ?>
                            <div><a href="/Product/New">Ajout Prod.</a></div>
                        <?php endif ?>
                    <div><a href="/Logout">Logout</a></div>
                <?php endif ?>
            </div>
        </nav>
    </header>
    <div class="content">
        <?php if (isset($message) && $message) : ?>
            <div class="message"><?= $message ?></div>
        <?php endif ?>
        <?= $content; ?>
    </div>
    <?= (!empty($headerjs)) ? $headerjs : ""; ?>
</body>

</html>
