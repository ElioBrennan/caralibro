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

    static public function getUserByID($id)
    {
        $table = "usuarios";
        $user = UsersModel::getUserByID($table, $id);
        return $user;
    }

    static public function makeLogin()
    {
        if (count($_POST) > 0) {
            $table = "usuarios";
            $check = "email";
            $value = $_POST["idEmail"];
            $password = $_POST["idPassword"];

            $response = UsersModel::makeLogin($table, $check, $value);
            if (count($response) > 0) {
                if (
                    $response[0]["email"] == $value && $response[0]["password"] == $password
                ) {
                    return array(
                        "state" => "OK",
                        "email" => $response[0]["email"]
                    );
                } else {
                    return "KO";
                }
            } else {
                return 'KO';
            }
        }
    }

    public function manageUpdate()
    {
        if (count($_POST) > 0) {

            $name = null;
            if ($_POST["idName"] != $_POST["actualName"]) {
                $name = $_POST["idName"];
            } else {
                $name = $_POST["actualName"];
            }

            $surname = null;
            if ($_POST["idSurname"] != $_POST["actualSurname"]) {
                $surname = $_POST["idSurname"];
            } else {
                $surname = $_POST["actualSurname"];
            }
           
            $password = null;
            if ($_POST["idPassword"] != $_POST["actualPassword"]) {
                $password = $_POST["idPassword"];
            } else {
                $password = $_POST["actualPassword"];
            }

            $id = $_POST["id"];

            $table = "usuarios";
            $newdata = array(
                "id" => $id,
                "name" => $name,
                "surname" => $surname,
                "password" => $password
            );

            $response = UsersModel::makeUpdate($table, $newdata);
            if ($response == "OK") {
                echo 
                '<script type="text/javascript">
				    if ( window.history.replaceState ) {
					    window.history.replaceState( null, null, window.location.href );
				    }
                </script>';
                echo '<div class="alert alert-success">El registro se ha actualizado correctamente. Actualiza la página para ver los cambios.</div>';
                echo 
                '<script type="text/javascript">
                    setTimeout(function() {
                        window.location = "index.php";
                    }, 2500);
                </script>';
            }
        }
    }
}
