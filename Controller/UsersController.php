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

    function CreateUsers()
    {
        $user = new \stdClass();
        $user->mail = "test@test.fr";
        $user->password = password_hash("imverysecure", PASSWORD_DEFAULT);
        $user->pseudo = "test";
        if ($this->usersManager->create($user)) {
            echo "Utilisateur créé !";
        }
    }

    function UpdateUsers()
    {
        $user = new \stdClass();
        $user->id = 3;
        $user->mail = "test2@test2.fr";
        $user->password = password_hash("imverysecure", PASSWORD_DEFAULT);
        $user->pseudo = "test2";
        if ($this->usersManager->update($user)) {
            echo "Utilisateur modifié !";
        }
    }

    function DeleteUsers()
    {
        if ($this->usersManager->delete("3")) {
            echo "Utilisateur supprimé !";
        }
    }

    function SignInForm()
    {
        $this->View("signin");
    }

    function SignIn($mail, $password, $role)
    {
        $user = new \stdClass();
        $user->mail = $mail;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->pseudo = "test";
        $user->is_seller = ($role == "vendeur") ? 1 : 0;
        $user->is_admin = 0;
        if ($this->usersManager->create($user)) {
            echo "Utilisateur créé !";
        }

    }

    function LoginForm()
    {
        $this->View("login");
    }

    function Login($mail, $password)
    {
        $user = $this->usersManager->getByEmail($mail);
        if ($user) {
            if (password_verify($password, $user->password)) {
                unset($user->password);
                $_SESSION['user'] = $user;

            } else {
                echo "Mot de passe érroné";
                $this->View("login");
            }
        } else {
            echo "Email incorrect";
            $this->View("login");
        }

    }
}