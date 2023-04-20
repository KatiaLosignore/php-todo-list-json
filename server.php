<?php

    $todoList = [
        [
            'text' => 'Fare gli esercizi',
            'done' => true,
        ],
        [
            'text' => 'Fare la spesa',
            'done'=> false,
        ],
        [
            'text' => 'Fare il bucato',
            'done' => false,
        ],
        [
            'text' => 'Andare a correre',
            'done'=> true,

        ],
        [  
            'text' => 'Leggere un libro',
            'done' => true, 

        ],
         [  
            'text' => 'Andare a camminare',
            'done' => false, 

         ],
         
                              
    ];

    if (isset($_POST['item'])) {
        $todoList[] = $_POST['item'];
    
    }

    header('Content-Type: application/json');
    echo json_encode($todoList);