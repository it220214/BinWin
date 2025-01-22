<?php
header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];
$file = '../data/user.json';

if (!file_exists($file)) {
    echo json_encode(["error" => "File not found"]);
    exit;
}

// Lade existierende Daten
$data = json_decode(file_get_contents($file), true);

if ($method === 'GET') {
    echo json_encode($data); // Sende alle Benutzer als JSON zurück
} elseif ($method === 'POST') {
    // Hole die POST-Daten
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['name'], $input['password'], $input['department'], $input['class'])) {
        $data[] = $input; // Füge den neuen Benutzer hinzu
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
        echo json_encode(["success" => "User added"]);
    } else {
        echo json_encode(["error" => "Invalid input"]);
    }
} else {
    echo json_encode(["error" => "Invalid request method"]);
}
?>
