<?php
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Crypto\Random\Random;
use BitWasp\Bitcoin\Key\Factory\PrivateKeyFactory;
use BitWasp\Bitcoin\Network\NetworkFactory;
use CloudflareBypass\RequestMethod\CFCurl;

class BTC_SpiderPayment{

    public $testnet = false;
    public $blockchainAPI = "https://chain.so/api/v2/get_address_balance/BTC/";

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function generateBitcoinAddress()
    {
        if ($this->testnet == true) {
            Bitcoin::setNetwork(NetworkFactory::bitcoinTestnet());
        }
        $network = BitWasp\Bitcoin\Bitcoin::getNetwork();
        $random = new Random();
        $privKeyFactory = new PrivateKeyFactory();
        $privateKey = $privKeyFactory->generateCompressed($random);
        $publicKey = $privateKey->getPublicKey();
        $address = new PayToPubKeyHashAddress($publicKey->getPubKeyHash());
        return array(
            "address" => $address->getAddress(),
            "privatekey" => $privateKey->toWif($network),
        );
    }


    public function checkAmount($address){

        if($this->testnet){
            $this->blockchainAPI = "https://chain.so/api/v2/get_address_balance/BTCTEST/";
        }
        $curl_cf_wrapper = new CFCurl(array(
            'max_retries'   => 5,                   // How many times to try and get clearance?
            'cache'         => false,               // Enable caching?
            'cache_path'    => __DIR__ . '/cache',  // Where to cache cookies? (Default: system tmp directory)
            'verbose'       => true                 // Enable verbose? (Good for debugging issues - doesn't effect cURL handle)
        ));

        // Get Example: 1
        $ch = curl_init($this->blockchainAPI.$address."/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36');
        $json = $curl_cf_wrapper->exec($ch); // Done! NOTE: HEAD requests not supported!
        curl_close($ch);

        if($json != false){
            $checked = json_decode($json,true);
            if(!empty($checked["data"]["confirmed_balance"])){
                return array("confirmed_balance" => $checked["data"]["confirmed_balance"], "unconfirmed_balance" => $checked["data"]["unconfirmed_balance"]);
            }

        }
        return false;
    }

    public function usdToBtc($usd)
    {
        return file_get_contents("https://blockchain.info/tobtc?currency=USD&value=" . $usd);
    }

}