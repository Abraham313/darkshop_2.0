<?php

class Plans{

    static public function getPlan($id){
        if(!empty($id)){
            $statement = $GLOBALS["pdo"]->prepare("SELECT * FROM plans WHERE id = ?");
            $statement->execute(array($id));
            return $statement->fetch();
        }
        return false;
    }

    static public function getALLPlans(){
        $statement = $GLOBALS["pdo"]->prepare("SELECT * FROM plans order by price");
        $statement->execute();
        return  $statement->fetchAll();
    }

}