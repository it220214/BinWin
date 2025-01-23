<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Benutzerliste abrufen
    $file = '../data/user.json';
    if (file_exists($file)) {
        $users = json_decode(file_get_contents($file), true);
        echo json_encode([
            "code" => 200,
            "answer" => $users // Benutzerliste direkt in der Antwort
        ]);
    } else {
        echo json_encode([
            "code" => 404,
            "answer" => "Benutzerdatei nicht gefunden" // Direkte Nachricht
        ]);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Neuen Benutzer hinzufügen
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['name'], $input['password'], $input['department'], $input['class'])) {
        $file = './user.json';
        $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
        
        $newUser = [
            "id" => uniqid(),
            "name" => $input['name'],
            "password" => $input['password'],
            "department" => $input['department'],
            "class" => $input['class']
        ];

        $users[] = $newUser;
        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

        echo json_encode([
            "code" => 200,
            "answer" => "Benutzer erfolgreich hinzugefügt" // Direkte Nachricht
        ]);
    } else {
        echo json_encode([
            "code" => 400,
            "answer" => "Ungültige Eingabe" // Direkte Nachricht
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        "code" => 405,
        "answer" => "Methode nicht erlaubt" // Direkte Nachricht
    ]);
}
?>
