<template>
  <div class="d-flex min-vh-100">
    <!-- Left: Image Section (50%) -->
    <div
      class="d-none d-md-flex col-md-6 align-items-center justify-content-center text-white image-section"
    >
      <h1 class="fw-bold display-4 text-center px-4">Welcome to V-TEC</h1>
    </div>

    <!-- Right: Form Section (50%) -->
    <div class="col-md-6 d-flex align-items-center justify-content-center bg-white p-4">
      <div class="w-100" style="max-width: 500px">
        <!-- Logo -->
        <router-link
          class="logo navbar-brand fs-2 fw-bold text-primary mb-4 text-center d-block"
          to="/"
        >
          V-TEC
        </router-link>

        <!-- Tabs -->
        <div class="nav nav-pills nav-fill mb-4">
          <button
            class="nav-link"
            :class="{ active: currentForm === 'login' }"
            @click="currentForm = 'login'"
          >
            Login
          </button>
          <button
            class="nav-link"
            :class="{ active: currentForm === 'signup' }"
            @click="currentForm = 'signup'"
          >
            Signup
          </button>
          <button
            class="nav-link"
            :class="{ active: currentForm === 'recovery' }"
            @click="currentForm = 'recovery'"
          >
            Recover
          </button>
        </div>

        <!-- Login Form -->
        <form v-if="currentForm === 'login'" @submit.prevent="showAlert('Login successful!')">
          <h3 class="mb-3 fw-bold">Login</h3>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" required />
          </div>
          <div class="mb-3 position-relative">
            <input
              :type="showPassword.login ? 'text' : 'password'"
              class="form-control"
              placeholder="Password"
              required
            />
            <button
              type="button"
              class="btn btn-sm btn-light position-absolute top-0 end-0 mt-1 me-2"
              @click="togglePassword('login')"
            >
              👁️
            </button>
          </div>
          <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
          <button type="button" class="btn btn-outline-danger w-100" @click="loginWithGoogle">
            Login with Google
          </button>
        </form>

        <!-- Signup Form -->
        <form v-if="currentForm === 'signup'" @submit.prevent="showAlert('Signup successful!')">
          <h3 class="mb-3 fw-bold">Signup</h3>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Name" required />
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" required />
          </div>
          <div class="mb-3">
            <input
              type="password"
              class="form-control"
              placeholder="Password"
              required
              minlength="6"
            />
          </div>
          <button type="submit" class="btn btn-success w-100">Signup</button>
        </form>

        <!-- Recovery Form -->
        <form v-if="currentForm === 'recovery'" @submit.prevent="showAlert('Recovery email sent!')">
          <h3 class="mb-3 fw-bold">Recover Password</h3>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" required />
          </div>
          <button type="submit" class="btn btn-warning text-white w-100">Send Recovery Link</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const currentForm = ref('signup')
const showPassword = ref({ login: false })

function togglePassword(field) {
  showPassword.value[field] = !showPassword.value[field]
}

function showAlert(message) {
  alert(message)
}

function loginWithGoogle() {
  window.open('https://accounts.google.com/v3/signin/identifier?flowName=GlifWebSignIn', '_blank')
}
</script>

<style scoped>
.image-section {
  background-image: url('https://images.unsplash.com/reserve/LJIZlzHgQ7WPSh5KVTCB_Typewriter.jpg?q=80&w=1992&auto=format&fit=crop');
  background-size: cover;
  background-position: center;
}

.nav-link {
  cursor: pointer;
  font-weight: 500;
}

.nav-link.active {
  background-color: #0d6efd;
  color: white;
}

button.btn-sm {
  border: none;
  background: transparent;
}

* {
  transition: 0.3s ease;
}
</style>
