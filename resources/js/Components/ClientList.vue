<template>
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
    <tr>
      <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Raison sociale
      </th>
      <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Description
      </th>
      <th scope="col"
          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Projets
      </th>
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Editer</span>
      </th>
    </tr>
    </thead>
    <tbody>
    <!-- Odd row -->
    <tr v-for="item in items">
      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        {{ item.description }}
      </td>
      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ item.company_name }}
      </td>
      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ item.projects }}
      </td>
      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
        <a href="#" class="text-indigo-600 hover:text-indigo-900">Editer</a>
      </td>
    </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: 'ClientList',
  props: ['items'],
}
</script>
