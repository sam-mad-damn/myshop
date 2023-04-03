<?php


namespace App\models;

use App\helpers\Connection;

class User
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT users.id as id, users.name as user, users.mail as mail, users.phone as phone, users.age as age, role FROM users");
        return $query->fetchAll();
    }
    public static function getRoles()
    {
        $query = Connection::make()->query("SELECT role FROM users");
        return $query->fetchAll();
    }
    public static function getUser($login, $password)
    {
        $query = Connection::make()->prepare("SELECT users.*,roles.name as role FROM users INNER JOIN roles ON users.role_id=roles.id WHERE login=:login");
        $query->execute([
            "login" => $login,
        ]);
        $user = $query->fetch();
        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }
    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT users.* FROM users WHERE users.id=:id");
        $query->execute([
            "id" => $id,
        ]);
        $user = $query->fetch();
        return $user;
    }
    public static function insert($data)
    {
        $query = Connection::make()->prepare("INSERT INTO `users`( `name`, `surname`,`login`, `email`, `password`, `role_id`) VALUES (:name,:surname,:login,:email,:password,'2')");
        return $query->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "login" => $data["login"],
            "email" => $data["email"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT)
        ]);
        //вернет номер последней добавленной записи
        //self::connect()->lastInsertId();
    }
    public static function add_admin($data)
    {
        $query = Connection::make()->prepare("INSERT INTO `users`( `name`, `surname`,`login`, `email`, `password`, `role_id`) VALUES (:name,:surname,:login,:email,:password,'1')");
        return $query->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "login" => $data["login"],
            "email" => $data["email"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT)
        ]);
        //вернет номер последней добавленной записи
        //self::connect()->lastInsertId();
    }
    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM `users` WHERE id=?");
        return $query->execute([$id]);
    }
    public static function update($data)
    {
        $query = Connection::make()->prepare("UPDATE `users` SET `name`=:name,`surname`=:surname,`login`=:login,`email`=:email WHERE id=:user_id");
        return $query->execute([
            "name"=>$data["name"],
            "surname"=>$data["surname"],
            "login"=>$data["login"],
            "email"=>$data["email"],
            "user_id"=>$data["user_id"]
        ]);
    }
}
