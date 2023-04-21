
  const { createApp } = Vue;
  const apiUrl = 'http://localhost/php-todo-list-json/server.php';

  createApp({
    data() {
      return {
        todoList: [],
        todoItem: {
                    'text': '',
                    'done': false
                  }
      }
    },
    methods: {
        readList() {
            axios.get(apiUrl)
            .then(response => {
                this.todoList = response.data;
            })
        },
        addTodo() {
            const data = {
                item: this.todoItem
            };

            axios.post(apiUrl, data, 
            {
                headers: {'Content-Type': 'multipart/form-data'}
            }
            ).then(response => {
                this.todoList = response.data;
                this.todoItem.text = '';
            });
        }
    },
    mounted() {
        this.readList();
    }
  }).mount('#app')