<?php

class UsersController
{
    static public function manageRegister()
    {
        if (count($_POST) > 0) {
            $table = 'usuarios';
            $data = array(
                "name" => $_POST["idName"],
                "surname" => $_POST["idSurname"],
                "email" => $_POST["idEmail"],
                "password" => $_POST["idPassword"]
            );

            if (
                $data["name"] == ""
                || $data["surname"] == ""
                || $data["email"] == ""
                || $data["password"] == ""
            ) {
                $response = "KO";
            } else {
                $response = UsersModel::makeRegister($table, $data);
            }

            return $response;
        }
    }

    static public function getUsers()
    {
        $table = "usuarios";
        $response = UsersModel::getAllUsers($table);
        return $response;
    }

    static public function makeLogin()
    {
        if (count($_POST) > 0) {
            $table = "usuarios";
            $check = "email";
            $value = $_POST["idEmail"];
            $password = $_POST["idPassword"];

            $response = UsersModel::makeLogin($table, $check, $value);
            if (count($response) > 0 ) {
                if ($response[0]["email"] == $value && $response[0]["password"] == $password
                ) {
                    return array("state" => "OK",
                                "email" => $response[0]["email"]);
                } else {
                    return "KO";
                }
            } else {
                return 'KO';
            }
            
        }
    }
}
