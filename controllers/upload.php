<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file_path = $_FILES['file']['tmp_name'];
    
    if (file_exists($file_path)){
        $array = file($file_path);
        // echo '<pre>';  
        // var_dump($array);      
        // echo '</pre>';
        
        $sql = "INSERT INTO test_list (id, name, state) VALUES (?, ?, ?)";
        
        foreach ($array as $row) {            
            $csv = str_getcsv($row);
            $input_row = [(int)$csv[0], $csv[1], 0];
            $stmt = $pdo->prepare($sql);
            $stmt->execute($input_row);
        }
    }
        
}