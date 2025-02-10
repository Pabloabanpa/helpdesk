<template>
  <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <h2 class="text-xl font-semibold mb-4">Iniciar Sesión</h2>
    <form @submit.prevent="submit">
      <input v-model="form.email" type="email" placeholder="Correo" class="border p-2 mb-2 w-full" />
      <input v-model="form.password" type="password" placeholder="Contraseña" class="border p-2 mb-2 w-full" />
      <button type="submit" class="bg-blue-500 text-white px-4 py-2">Ingresar</button>
    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  email: '',
  password: '',
});

const submit = () => {
  form.post('/login');
};
</script>
