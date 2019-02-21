<template>
    <div class="container">
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
            <div class="form-group">

                <label for="sub_category">Sub Category</label>
                <select class="form-control" name="sub_category_options" id="sub_category" v-model="sub_id" @select="onchange($event.target.value)">
                    <option value="" disabled selected>Select Sub Category</option>
                    <option  v-for="sub_category_option in sub_category_options" v-bind:value="sub_category_option.cat_id">
                        {{ sub_category_option.sub_name }}

                    <!--<option  v-for="result in results" v-bind:value="result.id">-->
                        <!--{{ result.sub_name }}-->
                    </option>
                </select>

                <span>Selected: {{ sub_id }}</span>
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

            }
        },


        created: function(){
            this.loadCategories();
       //     this.loadSubCategories();

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