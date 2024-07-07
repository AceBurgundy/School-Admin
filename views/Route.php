<?php

class Route {
    protected static $routes = [];
    public static $conn;

    public static function connectDB() {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'rmmcdatabase';

        self::$conn = new mysqli($host, $username, $password, $database);

        if (self::$conn->connect_error) {
            die("Connection failed: " . self::$conn->connect_error);
        }
    }

    public static function disconnectDB() {
        try {
            if (self::$conn && self::$conn->ping()) {
                self::$conn->close();
            }
        } catch (Exception $error) {
            // Handle any errors or log them as needed
            error_log('Error disconnecting from database. One reason is you mightve closed the connection in a route: ' . $error->getMessage());
        }
    }

    public static function echoJSON($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public static function respondSuccess($message) {
        self::echoJSON(['status' => 'success', 'message' => $message]);
    }

    public static function respondError($message) {
        self::echoJSON(['status' => 'error', 'message' => $message]);
    }

    public function get($path, $callback) {
        self::$routes['GET'][$path] = $callback;
    }

    public function post($path, $callback) {
        self::$routes['POST'][$path] = $callback;
    }

    public static function handleRequest() {
        self::connectDB();

        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Get the last segment of the path
        $path = basename($path);

        if (isset(self::$routes[$requestMethod][$path])) {
            if ($requestMethod === 'POST') {
                $data = json_decode(file_get_contents('php://input'), true);
                call_user_func(self::$routes[$requestMethod][$path], $data);
            } else {
                call_user_func(self::$routes[$requestMethod][$path]);
            }
        } else {
            self::respondError($path);
        }

        self::disconnectDB();
    }
}
