<template>
  <div class="box">
    <img src="" alt="">
    <div>
      <span>{{ content.title }}</span>
      <div>test</div>
      <div>
        <a href="">{{ content.label }}</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Box",
  props: ['content']
}
</script>

<style scoped>

</style>