<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    parse_str(parse_url($_SERVER['REQUEST_URI'])['query'],$query);
    if (isset($query['id'])) {
        $id = $query['id'];
        $pdo = Database::getInstances();
        $sql = "SELECT * FROM random_numbers where id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $fetchedResult = $stmt->fetch(\PDO::FETCH_ASSOC);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($fetchedResult);
    }
}
