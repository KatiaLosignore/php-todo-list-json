<?php

    if (file_exists('database.json')) {
        $json_data = file_get_contents('database.json');
        $todoList = json_decode($json_data, true);    
    } else {
        $todoList = [];
    }
    


    if (isset($_POST['item'])) {
        $todoList[] = [
            'text' => $_POST['item']['text'],
            'done' => $_POST['item']['done'] === "true"? true : false
        ];
        
        $myString = json_encode($todoList);
        file_put_contents('database.json', $myString);
    
    }

    
    header('Content-Type: application/json');

    echo json_encode($todoList);