<?php
namespace App\Model;
use App\Utils\BddConnect;

class Event extends BddConnect{
    //attributs
    private ?int $id_event;
    private ?string $title_event;
    private ?string $place_event;
    private ?string $begin_date_event;
    private ?string $end_date_event;
    private ?string $description_event;
    
    
    
    //constructeur
   
    //Getters et Setters
    public function getId():?int{
        return $this->id_event;
    }
    public function setId(?int $id){
        $this->id_event = $id;
    }
    public function getTitle():?string{
        return $this->title_event;
    }
    public function setTitle(?string $title){
        $this->title_event = $title;
    }
    public function getPlace():?string{
        return $this->place_event;
    }
    public function setPlace(?string $place){
        $this->place_event = $place;
    }
    public function getBeginDate():?string{
        return $this->begin_date_event;
    }
    public function setBeginDate(?string $begin_date){
        $this->begin_date_event = $begin_date;
    }
    public function getEndDate():?string{
        return $this->end_date_event;
    }
    public function setEndDate(?string $end_date){
        $this->end_date_event = $end_date;
    }
    public function getDescription():?string{
        return $this->description_event;
    }
    public function setDescription(?string $description){
        $this->description_event = $description;
    }
    
  
    



    public function add(){
        try{
            $title = $this->title_event;
            $place = $this->place_event;
            $begin_date = $this->begin_date_event;
            $end_date = $this->end_date_event;
            $description = $this->description_event;
            
            $req = $this->connexion()->prepare(
                "INSERT INTO event(title_event, place_event, begin_date_event, end_date_event, description_event)VALUES(?,?,?,?,?)"
            );
            $req->bindParam(1, $title, \PDO::PARAM_STR);
            $req->bindParam(2, $place, \PDO::PARAM_STR);
            $req->bindParam(3, $begin_date, \PDO::PARAM_STR);
            $req->bindParam(4, $end_date, \PDO::PARAM_STR);
            $req->bindParam(5, $description, \PDO::PARAM_STR);
            
            $req->execute();

        }catch (\Exception $e){
            die('Error : '.$e->getMessage());

        }
    }

    public function findOneBy(){
        try {
            $title = $this->title_event;
            $req = $this->connexion()->prepare(
                "SELECT id_event, title_event, place_event, begin_date_event, end_date_event, description_event FROM event WHERE title_event = ?");
            $req->bindParam(1, $title, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Event::class);
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e){
            die('Error : '.$e->getMessage());
        }
    }
}
?> 