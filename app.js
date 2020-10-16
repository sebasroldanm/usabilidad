const app = Vue.createApp({
    data() {
      return {
        currentUserInput: '',
        message: '¡Vue es genial!',
      };
    },
    methods: {
      saveInput(event) {
        this.currentUserInput = event.target.value;
      },
      setText() {
        // this.message = this.currentUserInput;
        this.message = this.$refs.userText.value;
        // console.dir(this.$refs.userText);
      },
    },

    beforeCreate() {
      console.log('breforeCreate');
    },

    created() {
      console.log('created()');
    },

    beforeMount() {
      console.log('brefore Mount');
    },

    mounted() {
      console.log('mounted');
    },

    beforeUpdate() {
      console.log('breforeUpdate');
      // alert('beforeUpdate')
    },

    updated() {
      console.log('update');
      // alert('updated')
    },

    beforeUnmount() {
      console.log('beforeUnmount');
    },

    unmonted() {
      console.log('unmonted');
    }
  });
  
  app.mount('#app');


  const app2 = Vue.createApp({
    template: `
      <p>{{ comidaFav }}</p>
      `,
    data() {
      return {
        comidaFav: 'Pizza'
      }
    }
  });
  
  app2.mount('#app2')