<template>
    <app-layout>
        <template #header>
            <h2 class="font-bold text-white leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="border-dashed-wrapper">
                <div class="bg-white overflow-hidden border-dashed">
                  <span class="font-semibold text-xl">Statistiques</span>
                  <div class="wrapper">
                    <div class="box">
                      <div class="box_wrapper">
                        <div class="box_img">
                          <img src="https://www.pauline-aelion.fr/img_other/users.png" alt="user">
                        </div>
                        <div class="box_content">
                          <span class="font-semibold text-gray-700">Nombre de clients</span>
                          <div class="box_number font-bold">{{ clients.length }}</div>
                        </div>
                      </div>

                      <div class="box_link">
                        <a :href="route('client.index')" :active="route().current('client.index')">Voir tous les clients</a>
                      </div>
                    </div>
                    <div class="box">
                      <div class="box_wrapper">
                        <div class="box_img">
                          <img src="https://www.pauline-aelion.fr/img_other/click.png" alt="click">
                        </div>
                        <div>
                          <span class="font-semibold text-gray-700">Nombre de projets</span>
                          <div class="box_number font-bold">{{ projects.length }}</div>
                        </div>
                      </div>
                      <div class="box_link">
                        <a :href="route('project.index')" :active="route().current('project.index')">Voir tous les projets</a>
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

<style>
h2 {
  font-size: 35px;
}

.border-dashed-wrapper {
  margin: 20px;
  border: 35px solid white;
  border-radius: 10px;
}

.border-dashed {
  padding: 20px;
  border: 5px dashed #e6e7eb;
}

.wrapper {
  display: flex;
  padding-top: 10px;
}

.box_wrapper {
  display: flex;
}

.box{
  width: 50%;
  margin: 10px;
  padding-top: 30px;
  padding-right: 20px;
  padding-left: 20px;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
  box-shadow: 0 5px 5px lightgrey;
}


.box_img {
  height: 65px;
  width: 65px;
  margin-right: 20px;
  padding: 16px;
  background-color: #6467f1;
  border-radius: 8px;
}

img {
  height: 30px;
}

.box_number {
  font-size: 25px;
}

.box_link {
  height: 45px;
  margin-top: 30px;
  margin-left: -20px;
  margin-right: -20px;
  padding-top: 10px;
  padding-left: 20px;
  background-color: #f3f4f6;
}

.box_link a {
  color: #675fe9;
}
</style>
