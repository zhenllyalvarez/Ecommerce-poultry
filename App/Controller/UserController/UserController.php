<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/simple_ecommerce/App/Database/Database.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/simple_ecommerce/App/Model/UserModel/UserAuth.php");
class UserController
{
    public function register($name, $email, $password)
    {
        try {
            $db = new Database();
            if ($db->getStatus()) {
                $um = new UserAuth();
                $stmt = $db->getConnection()->prepare($um->createUser());
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $created_at = date("Y-m-d H:i:s");
                $stmt->execute([$name, $email, $hash_password, $created_at]);
                if ($stmt->rowCount() > 0) {
                    return ["status" => "success", "code" => 200, "message" => "User registered successfully."];
                } else {
                    return ["status" => "error", "code" => 401, "message" => "Failed to register user."];
                }
            } else {
                return ["status" => "error", "code" => 500, "message" => "Database connection failed."];
            }
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return ["status" => "error", "code" => 500, "message" => "An internal error occurred. Please try again later."];
        }
    }

    public function Login($email, $password)
    {
        try {
            $db = new Database();
            if ($db->getStatus()) {
                $um = new UserAuth();
                $stmt = $db->getConnection()->prepare($um->Login());
                // $stmt->bindParam("1", $email, PDO::PARAM_STR);
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user && password_verify($password, $user['password'])) {
                    setcookie('isLoggedIn', '1', time() + 86400, "/");
                    $_SESSION['user'] = $user['id'];
                    return 200;
                } else {
                    return 401;
                };
            } else {
                return 500;
            }
        } catch (PDOException $e) {
            return "error" . $e->getMessage();
        }
    }
}
