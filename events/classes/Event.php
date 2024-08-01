<?php
class Event {
    private $title;
    private $description;    
    private $date;
    private $field;
    private $type;
    private $location;

    private $link;

    private $img;
    
    public function __construct($id, $title, $description, $date, $field, $type, $location, $link, $img) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->field = $field;
        $this->type = $type;
        $this->location = $location;
        $this->link = $link;

        $this->img = $img;

    }
    
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getDate() { return $this->date; }
    public function getField() { return $this->field; }
    public function getType() { return $this->type; }
    public function getLocation() { return $this->location; }

    public function getLink() { return $this->link; }

    public function getImage() { return $this->img; }

}
?>