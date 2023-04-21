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
                'done' => $_POST['item']['done'] === "true"? true : false,
                'id' => $_POST['item']['id'] = format_uuidv4(random_bytes(16)),
            ];


            $myString = json_encode($todoList);
            file_put_contents('database.json', $myString);
    }

    if (isset($_POST['idToDelete'])) {

            $data = file_get_contents('database.json');
            $json_arr = json_decode($data, true);

            $i=0;
            foreach($json_arr as $element) {

               foreach($element as $task) {
               
               if($task === $_POST['idToDelete']){
                   unset($json_arr[$i]);
                  $myArr = json_encode(array_values($json_arr));
                  file_put_contents('database.json', $myArr);
               }
            }
            $i++;
        }
    
    }

    //Funzione per creare un ID univoco
    function format_uuidv4($data)
    {
      assert(strlen($data) == 16);
    
      $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
      $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        
      return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }



    header('Content-Type: application/json');

    echo json_encode($todoList);