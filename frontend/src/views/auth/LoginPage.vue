<template>
  <div class="login-container">
    <h2>🔐 Login</h2>

    <form @submit.prevent="handleLogin">
      <input type="text" v-model="username" placeholder="Benutzername" />
      <input type="password" v-model="password" placeholder="Passwort" />
      <button type="submit">Einloggen</button>
    </form>

    <!-- ✅ Link zur Registrierung -->
    <p class="register-text">
      Noch keinen Account?
      <router-link to="/register" class="register-link">
        Jetzt registrieren
      </router-link>
    </p>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const username = ref('')
const password = ref('')

function handleLogin() {
  console.log('Login:', username.value, password.value)
}
</script>

<style scoped>
.register-text {
  margin-top: 1rem;
  font-size: 0.9rem;
}

.register-link {
  color: #007bff;
  text-decoration: underline;
  cursor: pointer;
}
</style>