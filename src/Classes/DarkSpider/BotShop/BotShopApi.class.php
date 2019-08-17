<?php


class BotShopApi{


        public function getOrderByUser($id){
            $orders = [];
            $sql = "SELECT * FROM botshop_orders WHERE user_id = ".$id;
            foreach ($GLOBALS["pdo"]->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $listItem) {

                $orders[] = $listItem;
            }
            return $orders;
        }

        public function getPriceList(){
            $prices = [];
            $sql = "SELECT * FROM botshop_pricelist";
            foreach ($GLOBALS["pdo"]->query($sql)->fetchAll(PDO::FETCH_ASSOC) as $listItem) {
                unset($listItem["id"]);
                unset($listItem["created_at"]);
                $prices[] = $listItem;
            }
            return json_encode($prices);
        }

}