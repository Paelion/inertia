<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="box_wrapper">
                    <span>Statistiques</span>
                    <div class="box">
                      <img src="" alt="">
                      <div>
                        <span>Nombre de clients</span>
                        <div>{{ clients.length }}</div>
                        <div>
                          <a href="">Voir tous les clients</a>
                        </div>
                      </div>
                    </div>
                    <div class="box">
                      <img src="" alt="">
                      <div>
                        <span>Nombre de projets</span>
                        <div>{{ projects.length }}</div>
                        <div>
                          <a href="">Voir tous les projets</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Statistic from "@/Components/Statistic";

    export default {
        components: {
          Statistic,
          AppLayout
        },
      props: ['clients', 'projects']
    }
</script>
