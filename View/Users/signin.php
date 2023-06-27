<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>
<div id="signin">
<form method="POST" action="/SignIn" name="form-signin">
    <input type="email" class="input" id="user" name="mail" placeholder="Username"/>
    <input type="password" class="input" id="pass" name ="password" placeholder="Password" />
    <select name="role" class="selecteur">
        <option value="client" selected>Client</option>
        <option value="vendeur">Vendeur</option>
    </select>
    <button type="submit" class="submitbtn">S'inscrire</button>
</form>
</div>
</body>
</html>
