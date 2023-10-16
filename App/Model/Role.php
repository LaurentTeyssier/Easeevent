<?php
namespace App\Model;
use App\Utils\BddConnect;
class role extends BddConnect{
    //Attributs
    private ?int $id_role;
    private ?string $name_role;
    //constructeur
    //Getters et Setters
    public function getId():?int{
        return $this->id_role;
    }
    public function setId(?int $id){
        $this->id_role = $id;
    }
    public function getName():?string{
        return $this->name_role;
    }
    public function setName(?string $name){
        $this->name_role = $name;
    }

    public function add(){
        try{
            $name = $this->name_role;
            $req = $this->connexion()->prepare(
                "INSERT INTO role(name_role)VALUES(?)"
            );
            $req->bindParam(1, $name, \PDO::PARAM_STR);
            $req->execute();

        }catch (\Exception $e){
            die('Error : '.$e->getMessage());

        }
    }
    public function findOneBy(){
        try {
            $name = $this->name_role;
            $req = $this->connexion()->prepare(
                "SELECT name_role FROM role WHERE name_role = ?");
            $req->bindParam(1, $name, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Role::class);
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e){
            die('Error : '.$e->getMessage());
        }
    }
}
?>