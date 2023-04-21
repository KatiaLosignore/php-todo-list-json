<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <title>PHP ToDo List JSON</title>
    </head>
    <body class="bg-primary">
        <div id="app">
            <div class="container justify-content-center align-items-center col-4 mt-5">
                <h1>Todo List</h1>
                <hr class="text-white border border-2">
                <ul class="list-group border border-1 rounded">
                    <li v-for="(todo, i) in todoList" :key="i" :class="{'text-decoration-line-through' : todo['done']}" class="list-group-item d-flex justify-content-between align-items-center"> {{ todo['text'] }}
                        <button type="button" class="border border-secondary" @click="deleteTodo(todo.id)"><i class="bi bi-trash3-fill"></i></button>
                    </li>
                </ul>
                <form @submit.prevent="addTodo">
                    <div class="input-group mt-1">
                        <input v-model.trim="todoItem.text" type="text" class="form-control">
                        <button class="btn btn-secondary">Aggiungi Todo</button>

                    </div>
                </form>
            </div>

        </div>
        
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.6/axios.min.js" integrity="sha512-06NZg89vaTNvnFgFTqi/dJKFadQ6FIglD6Yg1HHWAUtVFFoXli9BZL4q4EO1UTKpOfCfW5ws2Z6gw49Swsilsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src='main.js'></script>
    </body>
</html>