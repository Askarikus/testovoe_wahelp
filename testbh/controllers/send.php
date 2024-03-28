<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    /**
     *
     * в данном случае
     * first_mailing первая рассылка
     * second_mailing - вторая
     *
     */
    $mailings = ["firstMailing", "secondMailing"];
    foreach ($mailings as $mailing) {
        $sql = "SELECT * FROM test_list";
        $pdo = Database::getInstances();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fetchedResult = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach($fetchedResult as $row){
            if($row['state'] === NULL){
                $sql = "UPDATE test_list SET state=json_build_object('$mailing', 'true')::jsonb where id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':id' => $row['id']]);
                continue;
            }
            $sql = "UPDATE test_list SET state=state || json_build_object('$mailing', 'true')::jsonb where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $row['id']]);
        }
    }
}
