<?php
require_once 'Event.php';

class EventTableGateway {

    private $connect;
    
    public function __construct($c) {
        $this->connect = $c;
    }
    
    public function getEvents() {
        
        $sqlQuery = "SELECT * FROM events";
        
        $statement = $this->connect->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve event details");
        }
        
        return $statement;
    }

  
    
    public function getEventsByLocation($location) {
        $sqlQuery = "SELECT * FROM events WHERE location = :location";
        
        $params = array(
            "location" => $location
        );
        $statement = $this->connect->prepare($sqlQuery);
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve event details");
        }
        
        return $statement;
    }
    
    public function getEventById($id) {
        $sqlQuery = "SELECT * FROM events WHERE eventID = :id";
        
        $statement = $this->connect->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve event details");
        }
        
        return $statement;
    }
    
    public function insert($p) {
        $sql = "INSERT INTO events (title, description, date, field, type, location, link, img) " .
                "VALUES (:title, :description, :date, :field, :type, :location, :link, :img)";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "title"       => $p->getTitle(),
            "description" => $p->getDescription(),
            "date"        => $p->getDate(),
            "field"       => $p->getField(),
            "type"        => $p->getType(),
            "location"    => $p->getLocation(),
            "link"        => $p->getLink(),
            "img"         => $p->getImg()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert event");
        }
        
        $id = $this->connect->lastInsertId();
        
        return $id;
    }

    public function update($p) {
        $sql = "UPDATE events SET " .
                "title = :title, " . 
                "description = :description, " .                
                "date = :date, " .
                "field = :field, " .
                "type = :type, " .
                "location = :location, " .
                "link = :link, " .
                "img = :img " .
                "WHERE eventID = :id";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "title"       => $p->getTitle(),
            "description" => $p->getDescription(),
            "date"        => $p->getDate(),
            "field"       => $p->getField(),
            "type"        => $p->getType(),
            "location"    => $p->getLocation(),
            "link"        => $p->getLink(),
            "img"         => $p->getImg(),
            "id"          => $p->getId()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not update event details");
        }
    }
    
    public function delete($id) {
        $sql = "DELETE FROM events WHERE eventID = :id";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "id" => $id
        );
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete event");
        }
    }
}
?>
