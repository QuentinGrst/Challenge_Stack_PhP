<?php
namespace Model;

class UsersManager extends ModelManager
{

    public function __construct()
    {
        parent::__construct("users");
    }

    public function getByEmail($mail)
    {
        $req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE mail = :mail");
        $req->bindParam(":mail", $mail);
        $req->execute();
        $req->setFetchMode(\PDO::FETCH_OBJ);
        return $req->fetch();
    }
}