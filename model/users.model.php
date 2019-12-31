<?php

require_once 'connection.php';

class UsersModel
{

    static public function makeRegister($table, $data)
    {
        $sql_statement = Connection::connect()->prepare(
            "INSERT INTO $table(name, surname, email, password) VALUES
            (:name, :surname, :email, :password)"
        );
        $sql_statement->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $sql_statement->bindParam(":surname", $data["surname"], PDO::PARAM_STR);
        $sql_statement->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $sql_statement->bindParam(":password", $data["password"], PDO::PARAM_STR);

        if ($sql_statement->execute()) {
            return "OK";
        } else {
            return "KO";
        }

        $sql_statement = null;
    }

    static public function getAllUsers($table)
    {
        $sql_statement = Connection::connect()->prepare("SELECT *, DATE_FORMAT(date, '%d/%m/%y') AS date FROM $table");
        $sql_statement->execute();
        return $sql_statement->fetchAll();
        $sql_statement = null;
    }

    static public function getUserByID($table, $id) {
        $sql_statement = Connection::connect()->prepare(
            "SELECT *
            FROM $table
            WHERE id = $id"
        );
        $sql_statement->execute();
        return $sql_statement->fetchAll();
        $sql_statement = null;
    }

    static public function makeLogin($table, $check, $value)
    {
        $sql_statement = Connection::connect()->prepare(
            "SELECT *, DATE_FORMAT(date, '%d/%m/%y') AS date 
            FROM $table
            WHERE $check = :$check"
        );

        $sql_statement->bindParam(":" . $check, $value, PDO::PARAM_STR);
        $sql_statement->execute();

        return $sql_statement->fetchAll();

        $sql_statement = null;
    }

    static public function makeUpdate($table, $data)
    {
        $sql_statement = Connection::connect()->prepare(
            "UPDATE $table SET name=:name, surname=:surname,
           password=:password WHERE id=:id"
        );

        $sql_statement->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $sql_statement->bindParam(":surname", $data["surname"], PDO::PARAM_STR);
        $sql_statement->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $sql_statement->bindParam(":password", $data["password"], PDO::PARAM_STR);

        if ($sql_statement->execute()) {
            return "OK";
        } else {
            print_r(Connection::connect() -> errorInfo());
            return "KO";
        }

        $sql_statement = null;
    }
}
