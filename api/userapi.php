<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['name'], $input['password'], $input['department'], $input['class'])) {
        $newUser = [
            "id" => uniqid(),
            "name" => $input['name'],
            "password" => $input['password'],
            "department" => $input['department'],
            "class" => $input['class']
        ];

        $file = '../data/user.json';
        $data = json_decode(file_get_contents($file), true);
        $data[] = $newUser;
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

        echo json_encode(["code" => 200, "message" => "User added successfully"]);
    } else {
        echo json_encode(["code" => 400, "message" => "Invalid input"]);
    }
} else {
    echo json_encode(["code" => 405, "message" => "Method not allowed"]);
}
?>
