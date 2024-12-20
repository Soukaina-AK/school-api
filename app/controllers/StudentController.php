<?php
include_once __DIR__ . '/../models/Student.php';

class StudentController {
    private $studentModel;

    public function __construct(){
        $this->studentModel = new Student();
    }

    public function getAllStudents(){
        $students = $this->studentModel->getAll();
        echo json_encode($students);
    }

    public function createStudent(){
        $data = json_decode(file_get_contents("php://input"), true);
        $this->studentModel->create($data);
        echo json_encode(['message' => 'Student created successfully']);
    }

    public function updateStudent($id){
        $data = json_decode(file_get_contents('php://input'), true);
        $this->studentModel->update($id, $data);
        echo json_encode(['message' => 'Student updated successfully']);
    }

    public function deleteStudent($id){
        $this->studentModel->delete($id);
        echo json_encode(['message' => 'Student deleted successfully']);
    }
}
?>