<?php
require_once 'db.php';
header('Content-Type: application/json');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$method = $_SERVER['REQUEST_METHOD'];

try {
    switch ($method) {

        case 'GET':
            $stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
            echo json_encode($stmt->fetchAll());
            break;

        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data || empty($data['name']) || empty($data['surname'])) {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "Missing required fields"]);
                break;
            }

            $sql = "INSERT INTO students (name, surname, middlename, address, contact_number)
                    VALUES (:name, :surname, :middlename, :address, :contact)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name'       => $data['name'],
                ':surname'    => $data['surname'],
                ':middlename' => $data['middlename'] ?? '',
                ':address'    => $data['address']    ?? '',
                ':contact'    => $data['contact']    ?? ''
            ]);

            echo json_encode([
                "status" => "success",
                "id"     => $pdo->lastInsertId()
            ]);
            break;

        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);

            if (!$data || empty($data['id'])) {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "Missing ID or data"]);
                break;
            }

            $sql = "UPDATE students 
                    SET name=?, surname=?, middlename=?, address=?, contact_number=? 
                    WHERE id=?";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $data['name']       ?? '',
                $data['surname']    ?? '',
                $data['middlename'] ?? '',
                $data['address']    ?? '',
                $data['contact']    ?? '',
                $data['id']
            ]);

            if ($stmt->rowCount() === 0) {
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "Student not found"]);
            } else {
                echo json_encode(["status" => "updated"]);
            }
            break;

        case 'DELETE':
            parse_str($_SERVER['QUERY_STRING'], $params);

            if (empty($params['id'])) {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "Missing ID"]);
                break;
            }

            $stmt = $pdo->prepare("DELETE FROM students WHERE id=?");
            $stmt->execute([$params['id']]);

            if ($stmt->rowCount() === 0) {
                http_response_code(404);
                echo json_encode(["status" => "error", "message" => "Student not found"]);
            } else {
                echo json_encode(["status" => "deleted"]);
            }
            break;

        default:
            http_response_code(405);
            echo json_encode(["status" => "error", "message" => "Method not allowed"]);
            break;
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "status"  => "error",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
