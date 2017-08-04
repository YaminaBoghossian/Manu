<?php

include_once './Messages.php';

class DataChat {
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ajaxchatsql', 'manu', 'manucool');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function createMessage(Messages $msg):bool{
         $queryInsert = $this->db->prepare('INSERT INTO message(text,timestamp)VALUES (:text,:timestamp)');
    
        $queryInsert->bindValue('text', $msg->getText(), PDO::PARAM_STR);
        $queryInsert->bindValue('timestamp', $msg->getTimestamp(), PDO::PARAM_STR);
        if ($queryInsert->execute()) {
            $msg->setId(intval($this->db->lastInsertId()));
            return true;
        }
        return false;
    }
        
        
   
            
    
     public function getAllMessages() : array {
        $query = $this->db->query('SELECT * FROM message');
        $messages = [];
        while ($ligne = $query->fetch()) {
            $message = new Messages($ligne['text'], $ligne['timestamp'], $ligne['id']);
            $messages[] = $message;
        }
        return $messages;
    }
    
    
    
}