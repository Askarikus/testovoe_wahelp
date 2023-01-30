<?php


// фиктивная функция для рассылки сообщений
function send_message($id, $name){
    return $id;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM test_list";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $r = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    /**
     * 
     * продумать если у несколько рассылок 
     * 
     */

    // dd($r);
    foreach($r as $row){
        if(!$row['state']){
            send_message($row['id'], $row['name']);
            // записываем в базу true
            $sql = "UPDATE test_list SET state=true where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $row['id']]);
        }
    }
}