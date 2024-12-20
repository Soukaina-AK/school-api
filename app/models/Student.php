<?php
include_once __DIR__ . '/../../config/database.php';

class Student{
    private $conn;
    
    // constructor : new connection to db
    public function __construct(){
        $this->conn = (new Database())->connect();
    }

    // show all students
    public function getAll(){
        $query = "SELECT * FROM students";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // create a student
    public function create($data){
        $query = "INSERT INTO students (name, email, class_id) VALUES (:name, :email, :class_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'class_id' => $data['class_id']
        ]);
    }

    // update a student
    public function update($id,$data){
        $query = "UPDATE students SET name=:name, email=:email, class_id=:class_id WHERE student_id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'email' => $data["email"],
            'class_id' => $data["class_id"]
        ]);
    }

    // delete a student
    public function delete($id){
        $query = "DELETE FROM students WHERE student_id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
    }
}
?>