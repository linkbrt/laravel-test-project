<template>
    <div class="app">
        <header>
            <h1>Вход в систему</h1>
        </header>

        <form @submit.prevent="submitForm" class="form">
            <div class="form-group">
                <label for="username">Логин</label>
                <input type="username" v-model="form.username" id="username" required />
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" autocomplete="current-password" v-model="form.password" id="password" required />
            </div>

            <div class="form-group">
                <div class="error" v-if="errorMessage">{{ errorMessage }}</div>
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
                password: '',
            }
        };
    },
    methods: {
        async submitForm() {
            // Логика для отправки данных формы на сервер
            try {
                const response = await axios.post('/login', {
                    email: this.email,
                    password: this.password,
                });
                console.log(response.data);
                alert('Вы успешно вошли в систему');
            } catch (error) {
                this.errorMessage = 'Ошибка входа: неверные учетные данные.';
            };

            // Очистка формы после отправки
            this.form.username = '';
            this.form.password = '';
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