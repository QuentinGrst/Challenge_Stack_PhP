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
            return false;
        } else {
            // L'e-mail n'existe pas, l'utilisateur peut procéder à l'inscription
            return true;
        }
    }

    function SignInForm()
    {
        if (empty($_SESSION['user'])) {
            $this->View("signin");
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
        if (!$this->CheckEmailExists($mail)) {
            $this->View("signin", "Un compte avec cet email existe déjà !");
            return;
        }
        $user = new \stdClass();
        $user->mail = $mail;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->pseudo = "test";
        $user->is_seller = ($role == "vendeur") ? 1 : 0;
        $user->is_admin = 0;
        if ($this->usersManager->create($user)) {
            $this->View("login", "Le compte a été créé ! Veuillez vous connecter");
        } else {
            $this->View("signin", "Erreur :(");
        }   
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
            $this->View("login", "Email incorrect");
        }
    }

    function Logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}
