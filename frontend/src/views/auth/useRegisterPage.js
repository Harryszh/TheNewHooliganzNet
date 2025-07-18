import { ref, computed } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const router = useRouter()

export const formData = ref({
  username: '',
  password: '',
  confirmPassword: '',
  acceptTerms: false
})

export const showSuccess = ref(false)

export const isFormValid = computed(() => {
  return (
    formData.value.username &&
    formData.value.password &&
    formData.value.confirmPassword &&
    formData.value.acceptTerms &&
    formData.value.password === formData.value.confirmPassword
  )
})

export async function submitRegistration() {
  if (!isFormValid.value) {
    alert('Bitte alle Felder korrekt ausfüllen!')
    return
  }

  try {
    const response = await axios.post('http://localhost:8000/api/register', {
      name: formData.value.username,
      password: formData.value.password,
      password_confirmation: formData.value.confirmPassword
    })

    console.log('✅ Registrierung erfolgreich:', response.data)
    showSuccess.value = true

    setTimeout(() => {
      showSuccess.value = false
      router.push('/login')
    }, 3000)

    formData.value = {
      username: '',
      password: '',
      confirmPassword: '',
      acceptTerms: false
    }
  } catch (error) {
    console.error('❌ Fehler:', error.response?.data || error)
    alert(error.response?.data?.message || 'Registrierung fehlgeschlagen.')
  }
}
