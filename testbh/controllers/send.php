<?php


// фиктивная функция для рассылки сообщений
function send_message($id){
    return $id;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM test_list where state = false";
    $pdo = Database::getInstances();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $fetchedResult = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    /**
     *
     * в данном случае рассылка одна
     *
     */
    foreach($fetchedResult as $row){
        if(!$row['state']){
            send_message($row['id'], $row['name']);
            // записываем в базу true
            $sql = "UPDATE test_list SET state=true where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $row['id']]);
        }
    }
}
