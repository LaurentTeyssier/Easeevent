<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Role;
class Participant extends BddConnect{
    //attributs
    private ?int $id_participant;
    private ?string $firstname_participant;
    private ?string $name_participant;
    private ?string $email_participant;
    private ?string $phone_participant;
    private ?string $password_participant;
    private ?string $picture_participant;
    
    private Role $role;
    //constructeur
    public function __construct(){
        $this->role = new Role();
    }
    //Getters et Setters
    public function getId():?int{
        return $this->id_participant;
    }
    public function setId(?int $id){
        $this->id_participant = $id;
    }
    public function getFirstname():?string{
        return $this->firstname_participant;
    }
    public function setFirstname(?string $firstname){
        $this->firstname_participant = $firstname;
    }
    public function getName():?string{
        return $this->name_participant;
    }
    public function setName(?string $name){
        $this->name_participant = $name;
    }
    public function getEmail():?string{
        return $this->email_participant;
    }
    public function setEmail(?string $email){
        $this->email_participant = $email;
    }
    public function getPhone():?string{
        return $this->phone_participant;
    }
    public function setPhone(?string $phone){
        $this->phone_participant = $phone;
    }
    public function getPassword():?string{
        return $this->password_participant;
    }
    public function setPassword(?string $password){
        $this->password_participant = $password;
    }
    public function getPicture():?string{
        return $this->picture_participant;
    }
    public function setPicture(?string $picture){
        $this->picture_participant = $picture;
    }
  
    



    public function add(){
        try{
            $firstname = $this->getFirstname();
            $name = $this->getName();
            $email = $this->getEmail();
            $phone = $this->getPhone();
            $password = $this->getPassword();
            $picture = $this->getPicture();
            
            $req = $this->connexion()->prepare(
                "INSERT INTO participant(firstname_participant, name_participant, email_participant, phone_participant, password_participant, picture_participant)VALUES(?,?,?,?,?,?)"
            );
            $req->bindParam(1, $firstname, \PDO::PARAM_STR);
            $req->bindParam(2, $name, \PDO::PARAM_STR);
            $req->bindParam(3, $email, \PDO::PARAM_STR);
            $req->bindParam(4, $phone, \PDO::PARAM_STR);
            $req->bindParam(5, $password, \PDO::PARAM_STR);
            $req->bindParam(6, $picture, \PDO::PARAM_STR);
            
            $req->execute();

        }catch (\Exception $e){
            die('Error : '.$e->getMessage());

        }
    }

    public function findOneBy(){
        try {
            $email = $this->getEmail();
            $req = $this->connexion()->prepare(
                "SELECT id_participant, firstname_participant, name_participant, email_participant, phone_participant, password_participant, picture_participant FROM participant WHERE email_participant = ?");
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Participant::class);
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e){
            die('Error : '.$e->getMessage());
        }
    }
}
?> 