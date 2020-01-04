<?php
    
    class PrivatesController {

        static public function getPrivateMessages($from, $to) {
            $table = 'privados';
            $messages = PrivatesModel::getPrivateMessages($table, $from, $to);
            return $messages;
        }

        static public function manageSend() {
            if (count($_POST) > 0) {
                $table = 'privados';
                $data = array(
                    "message" => $_POST["idMessage"],
                    "from" => $_POST["idFrom"],
                    "to" => $_POST["idTo"]
                );
                $response = PrivatesModel::makeMessage($table, $data);
                if ($response == "OK")
                    return "OK";
                else
                    return "KO";
            }
        }

    }
