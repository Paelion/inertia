<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Project
      </h2>
      <jet-button @click="newClient" :href="route('project.create')" :active="route().current('project.create')" class="mt-5">
        Créer un projet
      </jet-button>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <ProjectList :items="projects"/>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import ProjectList from '@/Components/ProjectList'
import JetButton from "@/Jetstream/Button";
import Button from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button";

export default {
  props: ['projects'],
  components: {
    Button,
    AppLayout,
    ProjectList,
    JetButton
  },
  methods: {
    newClient(){
      this.$inertia.visit(this.route('project.create'));
    }
  }
}
</script>
