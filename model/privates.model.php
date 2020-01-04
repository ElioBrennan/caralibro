<?php

    class PrivatesModel {

        static public function getPrivateMessages($table, $from, $to) {
            $sql_statement = Connection::connect() -> prepare("
                SELECT *
                FROM $table
                WHERE (user = $from AND goto = $to)
                OR (user = $to AND goto = $from)
                ORDER BY id DESC;
            ");
            $sql_statement -> execute();
            return $sql_statement -> fetchAll();
            $sql_statement = null;
        }

        static public function makeMessage($table, $data)
        {
            $sql_statement = Connection::connect()->prepare(
                "INSERT INTO $table(message, user, goto)
                VALUES (:message, :user, :goto);"
            );
            $sql_statement->bindParam(":message", $data["message"],  PDO::PARAM_STR);
            $sql_statement->bindParam(":user", $data["from"],  PDO::PARAM_INT);
            $sql_statement->bindParam(":goto", $data["to"],  PDO::PARAM_INT);
            if ($sql_statement->execute())
                return "OK";
            else
                return "KO";
            $sql_statement = null;
        }
    }
