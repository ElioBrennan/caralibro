<?php

require_once 'connection.php';

class MessagesModel
{
    static public function getAllMessages($table)
    {
        $sql_statement = Connection::connect()->prepare("SELECT *, DATE_FORMAT(date, '%d/%m/%y') AS date FROM $table 
                                                        ORDER BY id DESC");
        $sql_statement->execute();
        return $sql_statement->fetchAll();
        $sql_statement = null;
    }

    static public function makeMessage($table, $data)
    {
        $sql_statement = Connection::connect()->prepare(
            "INSERT INTO $table(message, user)
            VALUES (:message, :user);"
        );
        $sql_statement->bindParam(":message", $data["message"],  PDO::PARAM_STR);
        $sql_statement->bindParam(":user", $data["user"],  PDO::PARAM_INT);
        if ($sql_statement->execute())
            return "OK";
        else
            return "KO";
        $sql_statement = null;
    }
}
