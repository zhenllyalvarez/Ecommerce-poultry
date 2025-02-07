<?php

include($_SERVER['DOCUMENT_ROOT'] . "/simple_ecommerce/App/Controller/UserController/UserController.php");

header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'] ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : null;
        $password = $_POST['password'];

        if (!$name || !$email || !$password) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
            exit;
        }

        $userController = new UserController();
        $result = $userController->register($name, $email, $password);
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Register Successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => isset($result['message']) ? $result['message'] : 'Unknown error.']);
        }
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());

        // Return a JSON error response
        echo json_encode(['status' => 'error', 'message' => 'An internal error occurred. Please try again later.']);
    }
}
