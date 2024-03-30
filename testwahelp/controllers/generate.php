<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $pdo = Database::getInstances();
    try {
        $rnd = rand();
        $query = "INSERT INTO  random_numbers (value) VALUES (:rnd)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':rnd' => $rnd]);

        $sqlRetrieve = "SELECT * FROM random_numbers ORDER BY id DESC LIMIT 1";
        $stmtRetrieve = $pdo->prepare($sqlRetrieve);
        $stmtRetrieve->execute();
        $fetchedResult = $stmtRetrieve->fetch(\PDO::FETCH_ASSOC);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($fetchedResult);

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
