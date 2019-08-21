<?php

class Support{


    public function getAllTicketsByUserID($id){
        $statement = $GLOBALS["pdo"]->prepare("SELECT * FROM tickets WHERE user_id = :id");
        $statement->execute(array('id' => $id));
        $return = array();
        while($order = $statement->fetch()) {
            $return[] = $order;
        }
        return $return;
    }

    public function getAllTickets(){
        $statement = $GLOBALS["pdo"]->prepare("SELECT tickets.*, users.username FROM tickets LEFT JOIN users ON users.id = tickets.user_id");
        $statement->execute(array());
        $return = array();
        while($order = $statement->fetch()) {
            $return[] = $order;
        }
        return $return;
    }


    public function getAllTicketsForSupport(){
        $statement = $GLOBALS["pdo"]->prepare("SELECT tickets.*, users.username FROM tickets LEFT JOIN users ON users.id = tickets.user_id WHERE tickets.status != 'closed'");
        $statement->execute(array());
        $return = array();
        while($order = $statement->fetch()) {
            $return[] = $order;
        }
        return $return;
    }

    public function getTicketByID($id){
        $statement = $GLOBALS["pdo"]->prepare("SELECT * FROM tickets WHERE id = :id");
        $statement->execute(array('id' => $id));
        return $statement->fetch();
    }



    public function getUserTicketCounts($id){
        $statement = $GLOBALS["pdo"]->prepare('SELECT 
                                                SUM(IF(STRCMP(status,"new") = 0,1,0)) as new,
                                                SUM(IF(STRCMP(status,"waiting_for_user") = 0,1,0)) as waiting_user,
                                                SUM(IF(STRCMP(status,"waiting_for_admin") = 0,1,0)) as waiting_admin,
                                                SUM(IF(STRCMP(status,"closed") = 0,1,0)) as closed
                                                FROM tickets WHERE user_id = :id');
        $statement->execute(array('id' => $id));
        return $statement->fetch();
    }

    public function closeTicket($id){
        $statement = $GLOBALS["pdo"]->prepare("UPDATE tickets SET status = ? WHERE id = ?");
        $statement->execute(array("closed",$id));
    }

    public function createTicketMessage($id,$description,$user_id){
        $ticket = $this->getTicketByID($id);

        if($ticket["user_id"] == $user_id){
            $statement = $GLOBALS["pdo"]->prepare("UPDATE tickets SET status = ? WHERE id = ?");
            $statement->execute(array("waiting_for_admin",$id));
        }else{
            $statement = $GLOBALS["pdo"]->prepare("UPDATE tickets SET status = ? WHERE id = ?");
            $statement->execute(array("waiting_for_user",$id));
        }

        $statement = $GLOBALS["pdo"]->prepare("INSERT INTO ticket_messages (user_id, ticket_id, description) VALUES (?, ?, ?)");
        return $statement->execute(array($user_id, $id,$description));
    }

    public function getMessagesByTicketId($id){
        $statement = $GLOBALS["pdo"]->prepare("SELECT ticket_messages.*, users.username FROM ticket_messages LEFT JOIN users ON ticket_messages.user_id = users.id WHERE ticket_id = :id ");
        $statement->execute(array('id' => $id));
        $return = array();
        while($order = $statement->fetch()) {
            $return[] = $order;
        }
        return $return;
    }

    public function createTicket($user_id,$title,$description){
        $statement = $GLOBALS["pdo"]->prepare("INSERT INTO tickets (user_id, title, description) VALUES (?, ?, ?)");
        return $statement->execute(array($user_id, $title,$description));
    }


}