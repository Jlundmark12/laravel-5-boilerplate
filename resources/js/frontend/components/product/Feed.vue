<template>
   <h1>Feed</h1>
    <products-products></products-products>
</template>

<script>
    import Products from './product/Products.vue'
    export default {
        components: { FilterComponent },



        // created() {
        //     this.loadProducts();
        // },
        //
        // methods: {
        //     loadProducts() {
        //         axios.get("api/products").then(({data}) => (this.products = data));
        //     },
        // },
    }
</script>

<style scoped>

</style>