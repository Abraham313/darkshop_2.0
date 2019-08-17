<?php


class FileServer{


    public function create($file,$remoutename,$uploadserver,$apikey){
        //**Note :CURLFile class will work if you have PHP version >= 5**

        $data = array(
            'file' => new CURLFile($file['tmp_name'],$file['type'],$file['name']),
            'destination' => 'upload',
            'calling_method' => 'upload_file',
            'file_name' => $remoutename,
            'apiKey' => $apikey
        );


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uploadserver);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60000);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $msg = FALSE;
        } else {
            $msg = $response;
        }

        curl_close($ch);
        return $msg;
    }
}