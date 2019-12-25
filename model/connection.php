<?php
    class Connection {
        static public function connect() {
            $link = new PDO("mysql:host=localhost;dbname=caralibro", "root", "");
            $link -> exec("set names ut8");
            return $link;
        }
    }
?>