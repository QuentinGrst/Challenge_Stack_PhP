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
    <input required type="email" class="input" id="user" name="mail" placeholder="Email"/>
    <input required type="password" class="input" id="pass" name ="password" placeholder="Mot de pase" />
    <input required type="text" class="input" id="pseudo" name="pseudo" placeholder="Pseudo"/>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <select name="role" class="selecteur">
        <option value="client" selected>Client</option>
        <option value="vendeur">Vendeur</option>
    </select>
    <button type="submit" class="submitbtn">S'inscrire</button>
</form>
</div>
</body>
</html>
