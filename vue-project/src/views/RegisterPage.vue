<template>
    <div class="app">
        <header>
            <h1>Регистрация в системе</h1>
        </header>

        <form @submit.prevent="submitForm" class="form">

            <div class="form-group">
                <label for="username">Логин</label>
                <input type="username" v-model="form.username" id="username" required />
            </div>

            <div class="form-group">
                <label for="username">Почта</label>
                <input type="email" v-model="form.email" id="email" required />
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input @input="checkPasswords" autocomplete="new-password" type="password" v-model="form.password1" id="password" required />
            </div>

            <div class="form-group">
                <label for="password">Повторите пароль</label>
                <input @input="checkPasswords" autocomplete="new-password" type="password" v-model="form.password2" id="password" required />
            </div>

            <div class="form-group">
                <div class="error" v-if="error">Пароли не совпадают</div>
            </div>

            <button type="submit">Войти</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                username: '',
                email: '',
                password1: '',
                password2: '',
            },
            error: false,
        };
    },
    methods: {
        submitForm() {
            // Логика для отправки данных формы на сервер
            console.log('Форма отправлена:', this.form);
            alert('Спасибо за ваше обращение!');
            // Очистка формы после отправки
            this.form.username = '';
            this.form.email = '';
            this.form.password1 = '';
            this.form.password2 = '';
            this.error = false;
        },
        login() {
            // Логика для входа пользователя
            alert('Перенаправление на страницу входа.');
        },
        register() {
            // Логика для регистрации пользователя
            alert('Перенаправление на страницу регистрации.');
        },
        checkPasswords() {
            this.error = this.form.password1 !== this.form.password2;
        }
    }
};
</script>