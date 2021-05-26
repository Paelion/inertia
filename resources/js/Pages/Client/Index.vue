<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Client
      </h2>
      <jet-button @click="newClient" :href="route('client.create')" :active="route().current('client.create')" class="mt-5">
        Créer un client
      </jet-button>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <ClientList :items="clients"/>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import ClientList from '@/Components/ClientList'
import JetButton from "@/Jetstream/Button";
import Button from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button";

export default {
  props: ['clients'],
  components: {
    Button,
    AppLayout,
    ClientList,
    JetButton
  },
  methods: {
    newClient(){
      this.$inertia.visit(this.route('client.create'));
    }
  }
}
</script>
