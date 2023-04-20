
  const { createApp } = Vue

  createApp({
    data() {
      return {
        todoList: [],
        todoItem: ''
      }
    },
    methods: {
        readList() {
            axios.get('server.php')
            .then(res => {
                this.todoList = res.data;
            })
        },
        addTodo() {
            const data = {
                item: {text: this.todoItem, done: false}
            };

            axios.post('server.php', data, 
            {
                headers: { 'Content-Type': 'multipart/form-data'}
            }
            ).then(res => {
                this.todoList = res.data;
                this.todoItem = '';
            });
        }
    },
    mounted() {
        this.readList();
    }
  }).mount('#app')