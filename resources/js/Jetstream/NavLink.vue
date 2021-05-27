<template>
    <inertia-link :href="href" :class="classes">
        <slot></slot>
    </inertia-link>
</template>

<script>
    export default {
        props: ['href', 'active'],

        computed: {
            classes() {
                return this.active
                            ? 'inline-flex wrap-box px-3 pt-1.5 border-b-1 bg-gray-900 text-sm font-semibold leading-5 text-white transition '
                            : 'inline-flex wrap-box px-1 pt-1 border-b-2 bg-gray-800 border-transparent text-sm font-semibold leading-5 text-white hover:text-white hover:bg-gray-900 transition'
            }
        }
    }
</script>

<style>
.wrap-box {
  height: 30px;
  margin-top: 18px;
  border-radius: 5px;
}
</style>
