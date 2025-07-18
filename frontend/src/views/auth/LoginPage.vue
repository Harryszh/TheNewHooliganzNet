<template>
    <div class="login-page">
      <h1>Login</h1>
      <form @submit.prevent="submitLogin">
        <div class="form-group">
          <label for="username">Benutzername</label>
          <input 
            type="text" 
            id="username" 
            v-model="username" 
            placeholder="Benutzername eingeben"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">Passwort</label>
          <input 
            type="password" 
            id="password" 
            v-model="password" 
            placeholder="Passwort eingeben"
            required
          />
        </div>
        <button type="submit">Einloggen</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LoginPage',
    data() {
      return {
        username: '',
        password: ''
      };
    },
    methods: {
      submitLogin() {
        if (this.username && this.password) {
          console.log('Benutzername:', this.username);
          console.log('Passwort:', this.password);
          // Hier könnte deine Login-Logik stehen
        } else {
          alert('Bitte alle Felder ausfüllen!');
        }
      }
    }
  }
  </script>
  
  <style scoped>
  .login-page {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    border-radius: 8px;
  }
  
  h1 {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .form-group {
    margin-bottom: 15px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
  }
  
  input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  button {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  </style>
  