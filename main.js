
  const { createApp } = Vue;
  const apiUrl = 'server.php';

  createApp({
    data() {
      return {
        todoList: [],
        todoItem: {
                    'text': '',
                    'done': false,
                    'id' : '',
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
                this.todoItem.id = '';
                this.todoItem.text = '';
            });
        },
        deleteTodo(id) {
            const data = {
                idToDelete: id
            };

            axios.post(apiUrl, data, 
            {
                headers: {'Content-Type': 'multipart/form-data'}
            }
            ).then(response => {
                this.todoList = response.data;
            });
        }
    },
    mounted() {
        this.readList();
    }
  }).mount('#app')