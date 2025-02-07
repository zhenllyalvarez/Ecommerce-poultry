<?php

include ($_SERVER['DOCUMENT_ROOT']) . "/simple_ecommerce/App/Controller/UserController/UserController.php";

header('Content-Type: application/json'); // Ensure JSON response

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$email || !$password) {
            echo json_encode(['status' => 'error', 'code' => 401, 'message' => 'Invalid input']);
            exit;
        }

        $userController = new UserController();
        $result = $userController->Login($email, $password);

        if ($result === 200) {
            echo json_encode(['status' => 'success', 'message' => 'Login Successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'code' => 500, 'message' => 'Error ang login erp!']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'code' => 403, 'message' => 'sheesh', 'error' => $e->getMessage()]);
    }
}
