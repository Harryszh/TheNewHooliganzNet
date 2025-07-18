<template>
  <div class="register-container">
    <div class="register-box">
      <h2>🧢 Registrieren</h2>
      <form @submit.prevent="submitRegistration">
        <div class="form-group">
          <input type="text" v-model="formData.username" placeholder="Benutzername" required />
        </div>
        <div class="form-group">
          <input type="password" v-model="formData.password" placeholder="Passwort" required />
        </div>
        <div class="form-group">
          <input type="password" v-model="formData.confirmPassword" placeholder="Passwort bestätigen" required />
        </div>
        <div class="checkbox-group">
          <label>
            <input type="checkbox" v-model="formData.acceptTerms" required />
            Ich akzeptiere die AGB
          </label>
        </div>
        <button type="submit" :disabled="!isFormValid">
          Registrieren
        </button>
      </form>

      <div v-if="showSuccess" class="notification success">
        ✅ Registrierung erfolgreich gespeichert!
      </div>

      <div class="login-link">
        <p>Bereits ein Konto?
          <router-link to="/login">Hier einloggen</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import {
  formData,
  isFormValid,
  showSuccess,
  submitRegistration
} from './useRegisterPage.js'
</script>

<style scoped>
/* Dein Style bleibt wie vorher */
.register-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: url('@/assets/images/Login.png') center/cover no-repeat;
}
/* ... (restliche Styles unverändert) */
</style>
