<template>
  <div class="box_wrapper">
    <span>Statistiques</span>
    <Box
        :key="content.title"
        v-for="content in contents"
        :content="content"/>
  </div>
</template>

<script>
import Box from "@/Components/Box";
export default {
  name: "Statistic",
  components: {
    Box
  },
  data() {
    return {
      contents: [
        {
          image: '',
          title: 'Nombre de clients',
          number: '',
          label: 'Voir tous les clients'
        },
        {
          image: '',
          title: 'Nombre de projets',
          number: '',
          label: 'Voir tous les projets'
        }
      ]
    }
  },
}
</script>

<style scoped>

</style>