<template>
    <div class="container">
        <!--<div class="row">-->
        <div class="col-sm-6 col-offset-sm-3">

            <!--SELECT START-->
            <div class="form-group">

                <label for="category">Category</label>
                <!--<select class="form-control" name="category_options" id="category" v-model="cat_id" onchange.cat_id="loadSubCategories($event.target.value)">-->
                <select class="form-control" name="category_options" id="category" v-model="cat_id" v-on:change="loadSubCategories()">
                    <option value="" disabled selected>Select Category</option>
                    <option v-for="category_option in category_options" v-bind:value="category_option.id">
                        {{ category_option.category }}
                    </option>
                </select>
                <!--v-if="cat_id.length > 0">-->
                <span> Selected: {{cat_id}}</span>

            </div>
            <!--SELECT END-->


            <label for="sub_category">Sub Category</label>
            <select class="form-control" name="sub_category_options" id="sub_category" v-model.lazy="sub_id" v-on:change="loadColors()">
                <option value="" disabled selected>Select Sub Category</option>
                <option  v-for="sub_category_option in sub_category_options" v-bind:value="sub_category_option.id">
                    {{ sub_category_option.sub_name }}

                </option>
            </select>

            <span>Selected: {{ sub_id }}</span>


            <div class="form-group">

                <label for="colors">Color Options</label>
                <select class="form-control" name="color_options" id="colors" v-model.lazy="color_id" v-on:change="loadSizes()">
                    <option value="" disabled selected>Select Color</option>
                    <option  v-for="color_option in color_options" v-bind:value="color_option.id">
                        {{ color_option.color_name }}

                        <!--<option  v-for="result in results" v-bind:value="result.id">-->
                        <!--{{ result.sub_name }}-->
                    </option>
                </select>

                <span>Selected: {{ color_id }}</span>
            </div>
            <div class="form-group">

                <label for="sizes">Size Options</label>
                <select class="form-control" name="size_options" id="sizes" v-model.lazy="size_id" v-on:change="">
                    <option value="" disabled selected>Select Size</option>
                    <option  v-for="size_option in size_options" v-bind:value="size_option.id">
                        {{ size_option.size_name }}

                        <!--<option  v-for="result in results" v-bind:value="result.id">-->
                        <!--{{ result.sub_name }}-->
                    </option>
                </select>

                <span>Selected: {{ size_id }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['category'],
        data: function(){


            return {

                cat_id:'',
                category_options: [],
                sub_id:'',
                sub_category:'',
                sub_category_options: [],
                color_id:'',
                color:'',
                color_options: [],
                size_id:'',
                size:'',
                size_options: [],
            }
        },


        created: function(){
            this.loadCategories();
            this.loadSubCategories();

        },


        methods: {
            loadCategories() {
                axios.get("api/categories")
                    .then(({data}) =>
                        (this.category_options = data));
            },

            //   loadSubCategories() {
            //this.cat_id.axios.get("api/sub_categories", this.cat_id).then(({data}) => (this.sub_category_options = data));
            //       axios.get("api/sub_categories").then(({data}) => (this.sub_category_options = data));
            //           loadSubCategories(){
            //               var category_id = this.cat_id;
            //               axios.post(`api/sub_categories`,category_id).then(({ data })=> (this.sub_category_options = data));
            //           },

            loadSubCategoriesOld(){
                var category_id = this.cat_id;
                axios.post(`api/sub_categories`,{category: category_id}).then(function (response) {
                    console.log(response);
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loadSubCategories(){
                var category_id = this.cat_id;
                axios.post(`api/sub_categories`,{category: category_id}).then(({ data })=> (this.sub_category_options = data));
            },

            loadColors(){
                var category_id = this.cat_id;
                var sub_relationship_id= this.sub_id;
                axios.post(`api/color_options`,{
                    category_id: category_id,
                    sub_relationship_id: sub_relationship_id
                }).then(({ data })=> (this.color_options = data));
            },
            loadSizes(){
                var category_id = this.cat_id;
                var sub_relationship_id= this.sub_id;
                axios.post(`api/size_options`,{
                    category_id: category_id,
                    sub_relationship_id: sub_relationship_id
                }).then(({ data })=> (this.size_options = data));
            },
        },


        //   },



        onchange: function() {
            console.log(this.cat_id)
            alert(this.cat_id)
        }


    }



</script>

<style scoped>

</style>