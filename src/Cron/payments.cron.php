<?php



require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../Classes/DarkSpider/database_wrapper.php';
require_once __DIR__ . '/../Classes/DarkSpider/user.class.php';
require_once __DIR__ . '/../Classes/DarkSpider/BitcoinDriver/vendor/autoload.php';
require_once __DIR__ . '/../Classes/DarkSpider/BitcoinDriver/BitcoinDriver.php';



$statement = $pdo->prepare("SELECT * FROM payments_btc WHERE (payed = 0 OR payed = 1) AND create_date >= DATE_SUB(NOW(), INTERVAL 2 DAY)");
$statement->execute();
while($order = $statement->fetch()) {

    $bitcoinDriver = new BTC_SpiderPayment();
    if($GLOBALS["config"]["payments"]["testnet"]){
        $bitcoinDriver->testnet = true;
    }

    $amounts = $bitcoinDriver->checkAmount($order["public_key"]);

    if($amounts != false){
        if(!empty($amounts["confirmed_balance"]) || !empty($amounts["unconfirmed_balance"])){
            if(floatval($amounts["confirmed_balance"]) >= floatval($order["min_btc"])){

                $statement = $pdo->prepare("UPDATE payments_btc SET payed = ? WHERE id = ?");
                $statement->execute(array(2, $order["id"]));

                $userLib = new User();
                $user =  $userLib->getUserByID( $order["user_id"]);
                $statement = $pdo->prepare("UPDATE users SET amount_btc = ?, amount_in_usd = ? WHERE id = ?");
                $statement->execute(array(floatval($amounts["confirmed_balance"]) + floatval($user["amount_btc"]), number_format($order["balance_usd"]+$user["amount_in_usd"],2) ,$order["user_id"]));

            }else{
                if(floatval($amounts["unconfirmed_balance"]) >= floatval($order["min_btc"])){
                    $statement = $pdo->prepare("UPDATE payments_btc SET payed = ? WHERE id = ?");
                    $statement->execute(array(1, $order["id"]));
                }
            }

        }
    }


    sleep(2);
//var_dump($order);
}

$statement = $pdo->prepare("UPDATE cronjob_log SET execution_date = CURRENT_TIMESTAMP() WHERE id = ?");
$statement->execute(array( 1));