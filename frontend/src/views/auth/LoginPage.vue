<template>
  <div class="flex items-center justify-center h-screen bg-gradient-to-br from-gray-100 to-blue-200">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
      <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">🔐 Login</h1>

      <form @submit.prevent="handleLogin">
        <div class="mb-4">
          <label class="block text-sm mb-1">Benutzername</label>
          <input
            v-model="name"
            type="text"
            class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
            required
          />
        </div>

        <div class="mb-6">
          <label class="block text-sm mb-1">Passwort</label>
          <input
            v-model="password"
            type="password"
            class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
            required
          />
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700"
        >
          Login
        </button>

        <p v-if="error" class="text-red-500 mt-4 text-center text-sm">{{ error }}</p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const router = useRouter()
const name = ref('')
const password = ref('')
const error = ref('')

const handleLogin = async () => {
  try {
    const response = await axios.post('http://localhost:8000/api/login', {
      name: name.value,
      password: password.value
    })

    const token = response.data.token
    localStorage.setItem('token', token)

    // Nach dem Login zur Startseite weiterleiten
    router.push('/home')
  } catch (err) { 
    error.value = 'Login fehlgeschlagen. Bitte überprüfe deine Eingaben.'
  }
}
</script>
