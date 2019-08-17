<?php

class Main{


        public function index()
        {
            Header("Location: /login");
            die();
        }

        public function register()
        {
                $userHandler = new User();
                if($userHandler->isLoggedIn()){
                    Header("Location: /dashboard");
                    die();
                }
                $status = false;
                if(!empty($_POST["password"]) && !empty($_POST["password2"]) & !empty($_POST["username"])){
                   $status =  $userHandler->register($_POST["username"],$_POST["password"],$_POST["password2"]);
                }
                $GLOBALS["tpl"]->assign("status", $status);
        }

        public function login(){
            $userHandler = new User();
            if($userHandler->isLoggedIn()){
                Header("Location: /dashboard");
                die();
            }
             if(!empty($_POST["username"]) && !empty($_POST["password"])){
                 $userHandler->login($_POST["username"],$_POST["password"]);
             }
        }

        public function dashboard(){
            $userHandler = new User();
            if(!$userHandler->isLoggedIn()){
                Header("Location: /login");
                die();
            }

            if(!empty($_POST["addBalance"])){
                if (filter_var($_POST["amount"], FILTER_VALIDATE_FLOAT))
                {
                    if(floatval($_POST["amount"]) < floatval(20.00)){


                        $GLOBALS["currentAlerts"] .= Alerts::render("error", "Minimum Topup is 20.00 $ ");

                    }else{
                        $bitcoinDriver = new BTC_SpiderPayment();
                        if($GLOBALS["config"]["payments"]["testnet"]){
                            $bitcoinDriver->testnet = true;
                        }

                        $addresInfo = $bitcoinDriver->generateBitcoinAddress();


                        $btc_amount = $bitcoinDriver->usdToBtc($_POST["amount"]);


                        $statement = $GLOBALS["pdo"]->prepare("INSERT INTO payments_btc (user_id, balance_usd, private_key, public_key, min_btc, recived_btc, payed) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $statement->execute(array($_SESSION["userid"], $_POST["amount"],$addresInfo["privatekey"],$addresInfo["address"],$btc_amount,"0",0));


                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $_SESSION['postdata'] = $_POST;
                        unset($_POST);
                    }
                }
            }


            $statement =  $GLOBALS["pdo"]->prepare("SELECT * FROM payments_btc WHERE user_id = ? ORDER BY create_date DESC");
            $statement->execute(array($_SESSION["userid"]));
            $payments = array();
            while($row = $statement->fetch()) {
                $payments[] = $row;
            }
            $GLOBALS["tpl"]->assign("payments",  $payments);

        }



        public function settings(){
            $userHandler = new User();
            if(!$userHandler->isLoggedIn()){
                Header("Location: /login");
                die();
            }


            if(!empty($_POST["edit_pass"])){
                $passwort_hash = password_hash($_POST["edit_pass"], PASSWORD_DEFAULT);
                $statement = $GLOBALS["pdo"]->prepare("UPDATE users SET passwort = :passwort WHERE id = :userid");
                $result = $statement->execute(array('passwort' => $passwort_hash, 'userid' => $_SESSION["userid"] ));
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_SESSION['postdata'] = $_POST;
                    unset($_POST);
                    header("Location: ".$GLOBALS["link"] );
                }
            }


            $GLOBALS["tpl"]->assign("user",  $userHandler->getUser());
        }

        public function support(){
            $userHandler = new User();
            if(!$userHandler->isLoggedIn()){
                Header("Location: /login");
                die();
            }



            $support = new Support();
            $allTickets =  $support->getAllTicketsByUserID($_SESSION["userid"]);
            $GLOBALS["tpl"]->assign("ticketCount",  $support->getUserTicketCounts($_SESSION["userid"]));
            $GLOBALS["tpl"]->assign("allTickets",  $allTickets);
        }

        public function support_create(){
            $userHandler = new User();
            if(!$userHandler->isLoggedIn()){
                Header("Location: /login");
                die();
            }
            $support = new Support();
            if(!empty($_POST["openTicket"])){
               $bool =  $support->createTicket($_SESSION["userid"],$_POST["title"],$_POST["description"]);
               if($bool){
                   header("Location: /support");
               }else{
                   die("Detected");
               }

            }
        }

        public function support_view($id){
            $userHandler = new User();
            $support = new Support();

            if(!$userHandler->isLoggedIn()){
                Header("Location: /login");
                die();
            }
            $ticket = $support->getTicketByID($id);
            if(!$userHandler->isAdmin()){
                if($ticket["user_id"] != $_SESSION["userid"]){
                    die("not your Ticket");
                }
            }

            if(!empty($_POST["closeTicket"])){
               $support->closeTicket($_POST["closeTicket"]);
            }


            $GLOBALS["template"][0] = "Main";
            $GLOBALS["template"][1] = "support_view";


            if(!empty($_POST["reply"])){
                $support->createTicketMessage($id,$_POST["description"],$_SESSION["userid"]);
            }

            $GLOBALS["tpl"]->assign("ticket",   $ticket);
            $GLOBALS["tpl"]->assign("messages",  $support->getMessagesByTicketId($id));

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_SESSION['postdata'] = $_POST;
                unset($_POST);
                header("Location: ".$GLOBALS["link"] );
            }

        }

        public function logout(){
            session_start();
            session_destroy();
            header("Location: /");
        }
}