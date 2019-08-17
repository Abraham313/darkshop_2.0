<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$GLOBALS["currentAlerts"] = "";
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
        "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
    $_SERVER['REQUEST_URI'];

if (!isset($_SESSION)) {
    session_start();
}


require_once __DIR__ . '/config.php';
require_once __DIR__ . '/src/Classes/DarkSpider/Alerts.class.php';
require_once __DIR__ . '/src/Classes/Bramus/Router/Router.php';
require  __DIR__ . '/src/Classes/Smarty/Smarty.class.php';


require_once __DIR__ . '/src/Classes/DarkSpider/database_wrapper.php';
require_once __DIR__ . '/src/Classes/DarkSpider/darkrat_api.class.php';
require_once __DIR__ . '/src/Classes/DarkSpider/BitcoinDriver/vendor/autoload.php';
require_once __DIR__ . '/src/Classes/DarkSpider/BitcoinDriver/BitcoinDriver.php';

require_once __DIR__ . '/src/Classes/DarkSpider/Support.class.php';
require_once __DIR__ . '/src/Classes/DarkSpider/plans.class.php';
require_once __DIR__ . '/src/Classes/DarkSpider/user.class.php';
require_once __DIR__ . '/src/Classes/DarkSpider/BotShop/FileServer.class.php';
require_once __DIR__ . '/src/Classes/DarkSpider/BotShop/BotShopApi.class.php';

require  __DIR__ . '/src/Controllers/Admin/Main.class.php';


require  __DIR__ . '/src/Controllers/Public/Main.class.php';
require  __DIR__ . '/src/Controllers/Public/BotShop.class.php';

$tpl = new Smarty;
$router = new \Bramus\Router\Router();




$router->all('/', 'Main@index');

$router->all('/admin', 'Admin_main@dashboard');
$router->all('/admin/support', 'Admin_main@support');
$router->all('/admin/botshop', 'Admin_main@botshop');
$router->all('/admin/users', 'Admin_main@users');
$router->all('/admin/fileserver', 'Admin_main@fileserver');
$router->all('/admin/users/edit/(\d+)/', 'Admin_main@users_edit');



$router->all('/register', 'Main@register');
$router->all('/login', 'Main@login');
$router->all('/logout', 'Main@logout');
$router->all('/dashboard', 'Main@dashboard');
$router->all('/support', 'Main@support');
$router->all('/settings', 'Main@settings');
$router->all('/support/new', 'Main@support_create');
$router->all('/support/ticket/(\d+)/', 'Main@support_view' );


$router->all('/bot_loads',  'BotShop@bot_loads');
$router->all('/bot_loads/statistics/(\w+)',  'BotShop@manage');




$template = explode("@",$router->fn);
$router->run(function() use ($tpl) {
    $tpl->setTemplateDir(__DIR__."/templates/v1/");
    $templateDir = $GLOBALS["template"][0]."/".$GLOBALS["template"][1].".tpl";
    $GLOBALS["tpl"]->assign("includeDir", "/templates/v1/");
    $isAdmin = false;
    $userHandler = new User();
    $support = new Support();
    if($userHandler->isLoggedIn()){
        $GLOBALS["tpl"]->assign("user",  $userHandler->getUser());
        $GLOBALS["tpl"]->assign("tickets",  $support->getUserTicketCounts($_SESSION["userid"]));
        $isAdmin = $userHandler->isAdmin();
    }
    $GLOBALS["tpl"]->assign("isAdmin", $isAdmin);
    $GLOBALS["tpl"]->assign("currentAlerts", $GLOBALS["currentAlerts"]);


    $tpl->display($templateDir);
});



