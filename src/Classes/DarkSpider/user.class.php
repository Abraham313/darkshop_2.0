<?php
/*
 *
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plan_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
  PRIMARY KEY (`id`), UNIQUE (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 */

class User{


        private $ranks = array(
            1 => array("name" => "member"),
            100 => array("name" => "admin"),
        );

        private $db;

        public function __construct()
        {
            $this->db = $GLOBALS["pdo"];
        }

        public function isAdmin(){
           $user =  $this->getUser();
           if( $user["rank"] == 100){
               return true;
           }
           return false;
        }

        public function getRanks(){
            return $this->ranks;
        }

        public function setAmount($amount,$id){
            $statement = $GLOBALS["pdo"]->prepare("UPDATE users SET amount_in_usd = ? WHERE id = ?");
            $statement->execute(array(number_format($amount,2),$id));
        }

        public function addAmount($amount,$id){

            $user = $this->getUserByID($id);
            $newAmount = $user["amount_in_usd"] + $amount;
            $statement = $GLOBALS["pdo"]->prepare("UPDATE users SET amount_in_usd = ? WHERE id = ?");
            $statement->execute(array(number_format($newAmount,2),$user["id"]));
        }

        public function buy($amount){
            $user = $this->getUser();

            if($user["amount_in_usd"] >= $amount){
                $newAmount = $user["amount_in_usd"] - $amount;
                $statement = $GLOBALS["pdo"]->prepare("UPDATE users SET amount_in_usd = ? WHERE id = ?");
                $statement->execute(array(number_format($newAmount,2),$user["id"]));
                return true;
            }


            return false;

        }

        public function register($username,$passwort,$passwort2){
            $message ="";
            $error = false;

            if(strlen($passwort) == 0) {
                $message .= 'Bitte ein Passwort angeben<br>';
                $error = true;
            }
            if($passwort != $passwort2) {
                $message .= 'Die Passwörter müssen übereinstimmen<br>';
                $error = true;
            }

            if(!$error) {
                $statement = $this->db->prepare("SELECT * FROM users WHERE username = :username");
                $result = $statement->execute(array('username' => $username));
                $user = $statement->fetch();

                if($user !== false) {
                    $message .= 'Diese E-Mail-Adresse ist bereits vergeben<br>';
                    $error = true;
                }
            }

            if(!$error) {
                $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

                $statement = $this->db->prepare("INSERT INTO users (username, passwort) VALUES (:username, :passwort)");
                $result = $statement->execute(array('username' => $username, 'passwort' => $passwort_hash));

                if($result) {
                    $message .= 'Du wurdest erfolgreich registriert.';
                    header("Location: /login");
                    $error = false;
                } else {
                    $message .= 'Failed.';
                    $error = true;
                }

            }


            return array(
                "error"=>$error,
                "message" => $message,
            );
        }


        public function login($username,$password){


            $statement = $this->db->prepare("SELECT * FROM users WHERE username = :username");
            $result = $statement->execute(array('username' => $username));
            $user = $statement->fetch();

            //Überprüfung des Passworts
            if ($user !== false && password_verify($password, $user['passwort'])) {
                $_SESSION['userid'] = $user['id'];
                header("Location: /dashboard");
            } else {
                $errorMessage = "E-Mail oder Passwort war ungültig<br>";
            }
        }

        public function isLoggedIn(){
            if(!isset($_SESSION['userid'])) {
               return false;
            }
            return true;
        }

        public function getUser(){
            $statement = $this->db->prepare("SELECT * FROM users WHERE id = ?");
            $statement->execute(array($_SESSION['userid']));
            $user = $statement->fetch();
            $user["planInfo"] = Plans::getPlan($user["plan_id"]);
            return $user;
        }

        public function getAllUser(){
            $statement = $this->db->prepare("SELECT * FROM users ");
            $statement->execute();
            $user = array();
            while($row = $statement->fetch()) {
                $user[] = $row;
            }

            return $user;
        }

        public function getUserByID($id){
            $statement = $this->db->prepare("SELECT * FROM users WHERE id = ?");
            $statement->execute(array($id));
            $user = $statement->fetch();
            return $user;
        }
}