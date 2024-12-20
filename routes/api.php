<?php
include '../app/controllers/StudentController.php' ;

// uri & method
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$method = $_SERVER["REQUEST_METHOD"];

if (empty($data['name']) || empty($data['email']) || empty($data['class_id'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid data']);
    return;
}

if ($uri === '/api/students' && $method === 'GET'){
    (new StudentController())->getAllStudents();
} elseif ($uri === '/api/students' && $method === 'POST'){
    (new StudentController())->createStudent();
} elseif (preg_match('/\/api\/students\/(\d+)/', $uri, $matches) && $method === 'PUT'){
    $id = $matches[1];
    (new StudentController())->updateStudent($id);
} elseif (preg_match('/\/api\/students\/(\d+)/', $uri, $matches) && $method === 'DELETE'){
    $id = $matches[1];
    (new StudentController())->deleteStudent($id);
}else {
    http_response_code(404);
    echo json_encode(['message' => 'Endpoint not found']);
}
?>