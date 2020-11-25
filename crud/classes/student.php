<?php

include 'Database.php';

class Student{

    private $table = "test_tbl";
    private $name;
    private $roll;
    private $registration;

    function setName($name){
        $this->name = $name;
    }

    function setRoll($roll){
        $this->roll = $roll;
    }

    function setRegistration($regi){
        $this->registration = $regi;
    }

    function insert(){
        $sql = "INSERT INTO $this->table(name, roll, regi_no) VALUES(:name, :roll, :regi)";
        $stmt = Database::prepare($sql);
        $stmt->bindparam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindparam(':roll', $this->roll, PDO::PARAM_INT);
        $stmt->bindparam(':regi', $this->registration, PDO::PARAM_INT);
        return $stmt->execute();

    }


    function update($id){
        $sql = "UPDATE $this->table SET name=:name, roll=:roll, regi_no=:regi WHERE id=:id";
        $stmt = Database::prepare($sql);
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        $stmt->bindparam(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindparam(':roll', $this->roll, PDO::PARAM_INT);
        $stmt->bindparam(':regi', $this->registration, PDO::PARAM_INT);
        return $stmt->execute();

    }

    function readAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = Database::prepare($sql);
        $stmt->execute();
       return $stmt->fetchAll();
    }

    function readByid($id){
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = Database::prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
       return $stmt->fetch();
    }

    function delete($id){
        $sql = "DELETE FROM $this->table where id=:id";
        $stmt = Database::prepare($sql);
        $stmt->bindparam(':id', $id);
        return $stmt->execute();
}
    
    

}

