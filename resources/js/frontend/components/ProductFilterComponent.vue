<template>
    <div class="container">
        <select v-model="categories" @select="updateCategory($event.target.value)">
            <option v-for="category in categories" v-bind:value="value">
                {{ category.category }}
            </option>
        </select>
        <!--<span>Selected: {{ selected }}</span>-->

    </div>
</template>

<script>
    export default {
        props: ['categories'],
        data() {

            return {
                categories: ''
            }
        },

        methods: {
            loadCategories(){
                axios.get("api/categories").then(({ data })=> (this.categories = data));
            },

            updateCategory(category){
                //select current category
                this.$emit('select', category);
            }
        },
        created(){
            this.loadCategories();
        },
        computed:{

        }
   };
</script>

<style scoped>

</style>