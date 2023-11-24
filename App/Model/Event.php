<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Participant;

class Event extends BddConnect{
    //attributs
    private ?int $id_event;
    private ?string $title_event;
    private ?string $place_event;
    private ?string $begin_date_event;
    private ?string $end_date_event;
    private ?string $description_event;
    private ?Participant $id_participant;


    
    
    //constructeur
   public function __construct() {
    $this->id_participant = New Participant();
   }
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
    public function getManager():?Participant{
        return $this->id_participant;
    }
    public function setManager(?Participant $manager){
        if($manager instanceof Participant){
        $this->id_participant = $manager;
        }elseif(is_int($manager)){
            $participant = new Participant();
            $participant-> setId($manager);
            $this->id_participant = $participant;
        }else{
            $this->id_participant = null;
        }
    }
    
  
    



    public function add(){
        try{
            $title = $this->getTitle();
            $place = $this->getPlace();
            $begin_date = $this->getBeginDate();
            $end_date = $this->getEndDate();
            $description = $this->getDescription();
            $manager = $this->getManager()->getId();
            
            $req = $this->connexion()->prepare(
                "INSERT INTO event(title_event, place_event, begin_date_event, end_date_event, description_event, id_participant)VALUES(?,?,?,?,?,?)"
            );
            $req->bindParam(1, $title, \PDO::PARAM_STR);
            $req->bindParam(2, $place, \PDO::PARAM_STR);
            $req->bindParam(3, $begin_date, \PDO::PARAM_STR);
            $req->bindParam(4, $end_date, \PDO::PARAM_STR);
            $req->bindParam(5, $description, \PDO::PARAM_STR);
            $req->bindParam(6, $manager, \PDO::PARAM_INT);
            
            $req->execute();

        }catch (\Exception $e){
            die('Error : '.$e->getMessage());

        }
    }

    public function findOneBy(){
        try {
            $title = $this->getTitle();
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

    // public function findAll(){
    //     try{
            
    //         $manager = $_SESSION['id'];
             
    //         $req= $this->connexion()->prepare(
    //         'SELECT id_event, title_event, place_event, begin_date_event, end_date_event, description_event, id_participant FROM event WHERE id_participant = ?');
    //         $req->bindParam(1, $manager, \PDO::PARAM_INT);
    //         $req->execute();
    //         return $req->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Event::class);
    //     }catch(\Exception $e){
    //         die('Error : '.$e->getMessage());
    //     }
    // }

    public function findAll() {
        try {
            $managerId = $_SESSION['id']; // Assuming id_participant is an integer
    
            $req = $this->connexion()->prepare(
                'SELECT id_event, title_event, place_event, begin_date_event, end_date_event, description_event, id_participant FROM event WHERE id_participant = ?'
            );
            $req->bindParam(1, $managerId, \PDO::PARAM_INT);
            $req->execute();
    
            $eventsData = $req->fetchAll(\PDO::FETCH_ASSOC);
    
            $events = [];
            foreach ($eventsData as $data) {
                $event = new Event();
                $event->setId($data['id_event']);
                $event->setTitle($data['title_event']);
                $event->setPlace($data['place_event']);
                $event->setBeginDate($data['begin_date_event']);
                $event->setEndDate($data['end_date_event']);
                $event->setDescription($data['description_event']);
    
                // Assuming id_participant is an integer
                $participant = new Participant();
                $participant->setId($data['id_participant']);
                $event->setManager($participant);
    
                $events[] = $event;
            }
    
            return $events;
        } catch (\Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }
}
?> 