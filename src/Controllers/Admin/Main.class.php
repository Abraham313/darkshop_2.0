<?php


class Admin_main{

public function __construct()
{
    $user = new User();
    if(!$user->isAdmin()){
        header("Location: /dashboard");
        die();
    }
}

    public function dashboard(){

    //select count(create_date) as payments, create_date as date from payments_btc where create_date  between (CURRENT_TIMESTAMP() - INTERVAL 31 DAY) and (CURDATE() - INTERVAL 1 DAY) group by create_date

        if(!empty($_POST["suspend"])){

            $statement = $GLOBALS["pdo"]->prepare("SELECT * FROM `botshop_orders` WHERE id = ?");
            $statement->execute(array($_POST["suspend"]));
            $suspendInfo = $statement->fetch();
            if($suspendInfo["status"] == "active"){
                $statement = $GLOBALS["pdo"]->prepare("UPDATE botshop_orders SET status = ? WHERE id = ?");
                $statement->execute(array("suspended",$_POST["suspend"]));
            }else{
                $statement = $GLOBALS["pdo"]->prepare("UPDATE botshop_orders SET status = ? WHERE id = ?");
                $statement->execute(array("active",$_POST["suspend"]));
            }

        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['postdata'] = $_POST;
            unset($_POST);
            header("Location: ".$GLOBALS["link"] );
        }


        $statement = $GLOBALS["pdo"]->prepare("select payments_btc.*, payments_btc.create_date as `date`, users.username, users.amount_in_usd  from payments_btc
                                                LEFT JOIN users ON users.id = payments_btc.user_id where payments_btc.payed = 2 OR payments_btc.payed = 1");
        $statement->execute(array());
        $payments_today = $statement->fetchAll();


        $statement = $GLOBALS["pdo"]->prepare("SELECT botshop_orders.*, users.username from botshop_orders LEFT JOIN users On users.id = botshop_orders.user_id");
        $statement->execute(array());
        $allOrders = $statement->fetchAll();


        $statement = $GLOBALS["pdo"]->prepare(" SELECT *, CURRENT_TIMESTAMP() as Servertime FROM `cronjob_log` WHERE id = 1");
        $statement->execute(array());
        $cronjob_log = $statement->fetch();


        $GLOBALS["tpl"]->assign("payments_today",   $payments_today);
        $GLOBALS["tpl"]->assign("allOrders",   $allOrders);
        $GLOBALS["tpl"]->assign("cronjob_log", $cronjob_log );

    }


    public function fileserver(){

        if(!empty($_POST["update_fileserver_api"])){
            $statement = $GLOBALS["pdo"]->prepare("UPDATE fileserver SET api_key = ?, url = ? WHERE id = ?");
            $statement->execute(array($_POST["api_key"], $_POST["api_url"],1));
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['postdata'] = $_POST;
            unset($_POST);
            header("Location: ".$GLOBALS["link"] );
        }

        $statement = $GLOBALS["pdo"]->prepare("SELECT * FROM `fileserver` WHERE id = ?");
        $statement->execute(array(1));
        $fileServerInfo = $statement->fetch();


        $GLOBALS["tpl"]->assign("apiInfo",  $fileServerInfo);
    }

    public function support(){

        $support = new Support();


        $GLOBALS["tpl"]->assign("allTickets",   $support->getAllTickets());
    }

    public function botshop(){

        if(!empty($_POST["update_darkrat_api"])){
            $statement = $GLOBALS["pdo"]->prepare("UPDATE loader_api SET api_key = ?, api_url = ?, min_loads = ?, min_loads_target = ? WHERE id = ?");
            $statement->execute(array($_POST["api_key"], $_POST["api_url"], $_POST["min_loads"],  $_POST["min_loads_target"],1));
        }
        if(!empty($_POST["update_smoke_api"])){
            $statement = $GLOBALS["pdo"]->prepare("UPDATE loader_api SET api_key = ?, api_url = ? WHERE id = ?");
            $statement->execute(array($_POST["api_key"], $_POST["api_url"],2));
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['postdata'] = $_POST;
            unset($_POST);
            header("Location: ".$GLOBALS["link"] );
        }


        $statement = $GLOBALS["pdo"]->prepare("SELECT * FROM `loader_api` WHERE id = ?");
        $statement->execute(array(1));
        $apiInfo = $statement->fetch();

        $statement = $GLOBALS["pdo"]->prepare("SELECT * FROM `loader_api` WHERE id = ?");
        $statement->execute(array(2));
        $apiInfoSmoke = $statement->fetch();



        $GLOBALS["tpl"]->assign("apiInfoSmoke",  $apiInfoSmoke);
        $GLOBALS["tpl"]->assign("apiInfo",  $apiInfo);
    }


    public function users(){
        $userLib = new User();
        $GLOBALS["tpl"]->assign("allUser",  $userLib->getAllUser());
    }

    public function users_edit($id){
        $GLOBALS["template"][0] = "Admin_main";
        $GLOBALS["template"][1] = "users_edit";


        $userLib = new User();


        if(!empty($_POST["amount_in_usd"])){
            $userLib->setAmount($_POST["amount_in_usd"],$id);
        }

        $GLOBALS["tpl"]->assign("user",  $userLib->getUserByID($id));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['postdata'] = $_POST;
            unset($_POST);
            header("Location: ".$GLOBALS["link"] );
        }

    //die(var_dump($userLib->getUserByID($id)));

    }

}