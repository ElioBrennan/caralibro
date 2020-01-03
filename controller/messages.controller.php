<?php

class MessagesController
{

    static public function getAllMessages()
    {
        $table = 'mensajes';
        $messages = MessagesModel::getAllMessages($table);
        $response = array();
        foreach ($messages as $key => $value) {
            $user = UsersModel::getUserByID("usuarios", $value["user"])[0];
            array_push(
                $response,
                array(
                    "id" => $value["id"],
                    "user" => $user["name"] . ' ' . $user["surname"],
                    "message" => $value["message"],
                    "date" => $value["date"]
                )
            );
        }
        return $response;
    }

    static public function managePublic()
    {
        if (count($_POST) > 0) {
            $table = 'mensajes';
            $data = array(
                "message" => $_POST["idMessage"],
                "user" => $_POST["idUser"]
            );
            $response = MessagesModel::makeMessage($table, $data);
            if ($response == "OK")
                return "OK";
            else
                return "KO";
        }
    }
}
