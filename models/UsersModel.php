<?php

class UsersModel{
    function __construct() {
        $this->cnx = new MySqlDB;
    }

    function createUser($usr){
        $sql="INSERT INTO `users`(name,email,password,role) VALUES (?,?,?,?)";
        $params=[
            $usr->getName(),
            $usr->getEmail(),
            $usr->getPassword(),
            'admin'
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok ? $this->cnx->lastInsertId() : false;
    }

    function getUserByEmail(String $email){
        $sql="SELECT * FROM users WHERE email=?";
        $data=$this->cnx->query($sql,[$email]);
        return empty($data)?null:new User($data[0]);
    }
    /*function cambiaRol(String $id, String $new_rol){
        $sql="UPDATE `usuarios` SET rol=? WHERE id_usuario=?";
        $params=[
            $new_rol,
            $id
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok;
    }*/
}