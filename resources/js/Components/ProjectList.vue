<template>
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
    <tr>
      <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Titre
      </th>
      <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Client
      </th>
      <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Description
      </th>
      <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Tickets
      </th>
    </tr>
    </thead>
    <tbody>
    <!-- Odd row -->
    <tr v-for="item in items">
      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        {{ item.title.substr(0, 20) }}
      </td>
      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ item.client }}
      </td>
      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ item.description.substr(0, 15) }}
      </td>
      <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500" v-if="item.status === '1'">
        <span class="projet-finish">Terminé</span>
      </td>
      <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500" v-else-if="item.status === '2'">
        <span class="projet-live">En cours</span>
      </td>
      <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500" v-else>
        <span class="projet-cancel">Annulé</span>
      </td>
      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a @click="edit(item)" class="text-indigo-600 hover:text-indigo-900">Editer</a>
      </td>
    </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: 'ProjectList',
  props: ['items'],
  methods: {
    edit(item){
      this.$inertia.visit(this.route('project.edit', [item.id]));
    }
  }
}
</script>

<style>
.projet-finish,
.projet-live,
.projet-cancel {
  border-radius: 5px;
  padding: 8px;
}
.projet-finish {
  background-color: #d1fae6;
  color: #086046;
}

.projet-live {
  background-color: #fef3c7;
  color: #92400f;
}

.projet-cancel {
  background-color: #f0d6d6;
  color: #b25050;
}
</style>
