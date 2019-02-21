<template>
    <div class="container">
        <div class="col-sm-6 col-offset-sm-3">
            <!--SELECT START-->
        <div class="form-group">

            <label for="category">Category</label>
        <select class="form-control" name="category_options" id="category" v-model="cat_id" @select="updateCategory($event.target.value)">
            <option value="" disabled selected>Select Category</option>
            <option v-for="category_option in category_options" v-bind:value="category_option.id">
                {{ category_option.category }}
            </option>
        </select>


        </div>
            <!--SELECT END-->
            <div class="form-group">

                <label for="sub_category">Sub Category</label>
                <select class="form-control" name="sub_category_options" id="sub_category" v-model="sub_category" @select="updateCategory($event.target.value)">
                    <option value="" disabled selected>Select Sub Category</option>
                    <option v-for="sub_category_option in sub_category_options" v-bind:value="sub_category_option.id">
                        {{ sub_category_option.sub_name }}
                    </option>
                </select>


            </div>


        </div>
    </div>
</template>

<script>
    export default {
        // props: ['categories'],
        data(){
            return {

                cat_id:'',
                category_options: [],
                sub_category:'',
                sub_category_options: {}
            }
        },

        methods: {
            loadCategories(){
                axios.get("api/categories").then(({ data })=> (this.category_options = data));
            },

            onCategorySelect(){

            },
            loadSubCategories(){
                axios.post("api/sub_categories",{cat: 'this.cat_id'}).then(({ data })=> (this.sub_category_options = data));
            },
           // updateCategory(category){
           //
           //     this.$emit('selected', category);
           // },

            // init: function () {
            //     var self = this;
            //     self.category_options = [{
            //
            //     }]
            // }
        },
        created(){
            this.loadCategories();
            this.loadSubCategories();
        },
        computed:{

        }
   };
</script>

<style scoped>

</style>