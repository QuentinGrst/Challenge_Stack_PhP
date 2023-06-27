<?php

namespace Controller;

class UsersController extends BaseController
{
    function ShowUserList()
    {
        $userList = $this->usersManager->getAll();
        $this->addParam('users', $userList);
        $this->View('userList');
    }

    function ShowUser($id)
    {
        $user = $this->usersManager->getById($id);
        if ($user) {
            var_dump($user);
        } else {
            echo 'Utilisateur non trouvé';
        }
    }

    function DeleteUsers()
    {
        if ($this->usersManager->delete("3")) {
            echo "Utilisateur supprimé !";
        }
    }

    function CheckEmailExists($mail)
    {
        $user = $this->usersManager->getByEmail($mail);
        if ($user) {
            echo "<script>alert('Un compte existe déjà avec cet e-mail');</script>";
            echo "<script>setTimeout(function() { window.location.reload(); }, 1000);</script>";
        } else {
            // L'e-mail n'existe pas, l'utilisateur peut procéder à l'inscription
            $this->SignIn($mail, $password, $role);
        }
    }

    function SignInForm()
    {
        if (empty($_SESSION['user'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $mail = $_POST['mail'];
                $this->CheckEmailExists($mail);
            } else {
                $this->View("signin");
            }
        } else {
            header('Location: /');
        }
    }

    function SignIn($mail, $password, $role)
    {
        if (!empty($_SESSION['user'])) {
            header('Location: /');
            return;
        }
        $user = new \stdClass();
        $user->mail = $mail;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->pseudo = "test";
        $user->is_seller = ($role == "vendeur") ? 1 : 0;
        $user->is_admin = 0;

    }


    function LoginForm()    
    {
        if (empty($_SESSION['user'])) {
            $this->View("login");
        } else {
            header('Location: /');
        }
    }

    function Login($mail, $password)
    {
        if (!empty($_SESSION['user'])) {
            header('Location: /');
            return;
        }
        $user = $this->usersManager->getByEmail($mail);
        if ($user) {
            if (password_verify($password, $user->password)) {
                unset($user->password);
                $_SESSION['user'] = $user;
                $_SESSION['user']->role = ($user->is_admin == 1) ? "admin" : (($user->is_seller == 1) ? "seller" : "client");
                header('Location: /');
            } else {
                echo "Mot de passe érroné";
                $this->View("login");
            }
        } else {
            echo "Email incorrect";
            $this->View("login");
        }
    }

    function Logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}
