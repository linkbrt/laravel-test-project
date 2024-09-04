<template>
    <div class="app">
      <header>
        <h1>Заявка на получение консультации</h1>
        <div class="auth-buttons">
          <RouterLink to="/login">Вход</RouterLink>
          <RouterLink to="/registration">Регистрация</RouterLink>
        </div>
      </header>
  
      <form @submit.prevent="submitForm" class="form">
        <div class="form-group">
          <label for="firstName">Имя:</label>
          <input type="text" v-model="form.firstName" id="firstName" required />
        </div>
  
        <div class="form-group">
          <label for="lastName">Фамилия:</label>
          <input type="text" v-model="form.lastName" id="lastName" required />
        </div>
  
        <div class="form-group">
          <label for="phone">Номер телефона:</label>
          <input type="tel" v-model="form.phone" id="phone" required />
        </div>
  
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" v-model="form.email" id="email" required />
        </div>
  
        <div class="form-group">
          <label for="message">Текст обращения:</label>
          <textarea v-model="form.message" id="message" required></textarea>
        </div>
  
        <button type="submit">Отправить</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          firstName: '',
          lastName: '',
          phone: '',
          email: '',
          message: ''
        }
      };
    },
    methods: {
      submitForm() {
        // Логика для отправки данных формы на сервер
        console.log('Форма отправлена:', this.form);
        alert('Спасибо за ваше обращение!');
        // Очистка формы после отправки
        this.form.firstName = '';
        this.form.lastName = '';
        this.form.phone = '';
        this.form.email = '';
        this.form.message = '';
      },
      login() {
        // Логика для входа пользователя
        alert('Перенаправление на страницу входа.');
      },
      register() {
        // Логика для регистрации пользователя
        alert('Перенаправление на страницу регистрации.');
      }
    }
  };
</script>
