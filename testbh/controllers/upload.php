<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file_path = $_FILES['file']['tmp_name'];

    if (file_exists($file_path)){
        /**
         * Т.к. загрузок очень много идет, то есть в одну таблицу, лучше использовать массовую загрузку, то есть когда в INSET INTO записывается несколько VALUES через запятую
         */

        $array = file($file_path);
        $row_length = 3;
        $nmbRows = count($array);
        $length = $nmbRows * $row_length;
        // строит строку вида (?,?,?), (?,?,?),(?,?,?),.....
        $args = implode(',', array_map(
            function ($el) {
                return '(' . implode(',', $el) . ')';
            },
            array_chunk(array_fill(0, $length, '?'), $row_length)
        ));
        // этот блок выстраивает параметры в ряд, разворачивая в последовательность number, name, state, number, name, state,.....
        $params = array();
        foreach ($array as $row) {
            $csv = str_getcsv($row);
            $input_row = [(int)$csv[0], $csv[1], 0];
            foreach ($input_row as $value) {
                $params[] = $value;
            }
        }
        // таким образом все добавляется одним sql запросом
        $pdo = Database::getInstances();
        try {
            $query = "INSERT INTO  test_list (id, name, state) VALUES " . $args;
            $stmt = $pdo->prepare($query);
            $stmt->execute($params);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }

}
