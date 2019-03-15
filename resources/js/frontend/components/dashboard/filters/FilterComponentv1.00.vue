<template>
    <div class="card">
    <div class="card-header">
        <!--<raw-filter></raw-filter>-->
        <h3 class="card-title">Product Table</h3>
        <div class="card-tools">
            <button class="btn btn-success float-lg-right">Add new
                <i class="fas fa-user-plus"></i>


            </button>
        </div>
    </div>
<div class="card-text">
    <div class="columns">

        <div class="item">
            <div class="column is-one-fifth">
                <label for="category">Category</label>
                <!--<select class="form-control" name="category_options" id="category" v-model="cat_id" onchange.cat_id="loadSubCategories($event.target.value)">-->
                <select class="form-control" name="category_options" id="category" v-model="cat_id" v-on:change="loadSubCategories()" @applied="onCategoryApplied">
                    <option value="" disabled selected>Select Category</option>
                    <option v-for="category_option in category_options" v-bind:value="category_option.id"     :key="category_option.id">

                        {{ category_option.category }}
                    </option>
                </select>
                <!--v-if="cat_id.length > 0">-->
                <span> Selected: {{cat_id}}</span>

            </div>
        </div>
        <!--SELECT END-->

        <div class="item">
            <div class="column is-one-fifth">
                <label for="sub_category">Sub Category</label>
                <select class="form-control" name="sub_category_options" id="sub_category" v-model.lazy="sub_id" v-on:change="loadColors()">
                    <option value="" disabled selected>Select Sub Category</option>
                    <option  v-for="sub_category_option in sub_category_options" v-bind:value="sub_category_option.id">
                        {{ sub_category_option.sub_name }}

                    </option>
                </select>

                <span>Selected: {{ sub_id }}</span>
            </div>
        </div>

        <div class="item">
            <div class="column is-one-fifth">
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
        </div>

        <div class="item">
            <div class="column is-one-fifth">
                <label for="sizes">Size Options</label>
                <select class="form-control" name="size_options" id="sizes" v-model.lazy="size_id" v-on:change="">
                    <option value="" enable selected>Select Size</option>
                    <option  v-for="size_option in size_options" v-bind:value="size_option.id">


                        {{ size_option.size_name }}


                    </option>
                </select>

                <span>Selected: {{ size_id }}</span>
            </div>
        </div>

        <div class="item">
            <div class="column is-one-fifth">
                <label for="conditions">Conditions</label>
                <select class="form-control" name="conditions_options" id="conditions" v-model.lazy="condition_id" v-on:change="">
                    <option value="" disabled selected>Select Condition</option>
                    <option  v-for="condition in condition_options" v-bind:value="condition.id">
                        {{ condition.condition_name }}


                    </option>
                </select>

                <span>Selected: {{ condition_id }}</span>

            </div>

        </div>
        <!--<product-table-component></product-table-component>-->




    </div>
    </div>
        <!--<div class="card">-->
            <!--<products v-bind:cat_id="cat_id"></products>-->
        <!--<products v-bind:products="products"></products>-->
        <!--</div>-->
   </div>
</template>

<script>
import ProductsComponent from '../filters/ProductsComponent.vue'

    export default {
    components: { ProductsComponent },
        // props:['cat_id'],
        // props:['products'],
        data: function(){

            return {
products:[],
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
                condition_id:'',
                condition_options: [],
                 products: [],
            }
        },


        created: function(){
            // Event.$on('products',(products)=>{this.products=products;});
            this.loadCategories();
        //    this.loadSubCategories();
            this.loadConditions();

        },


        methods: {


            loadCategories() {
                this.loading = true;
                axios.get("api/categories")
                    .then(({data}) =>
                        (this.category_options = data));

            },
            onCategoryApplied() {
                // this.loading = true;
                // axios.get("api/categories")
                //     .then(({data}) =>
                //         (this.category_options = data));
alert('It was Applied!')
            },
            loadConditions() {
                this.loading = true;
                axios.get("api/conditions")
                    .then(({data}) =>
                        (this.condition_options = data));
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
                this.loading = true;
                axios.post(`api/sub_categories`,{category: category_id}).then(function (response) {
                    console.log(response);
                })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            loadSubCategories(){
                var category_id = this.cat_id;
                 //Event.$emit('CategorySelected',{category_id: this.cat_id});
                Event.$emit('CategorySelected',{kitty: this.cat_id});
                this.loading = true;
                axios.post(`api/sub_categories`,{category: category_id}).then(({ data })=> (this.sub_category_options = data));
              //   Event.$emit('cat_id',{category: category_id});
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
    .row {display:inline-table;
        grid-template-columns: auto auto auto auto auto;
    }
    .container{
        /*display:grid;*/
        /*grid-template-columns: auto;*/
        /*width:max-content;*/
        /*height:400px;*/
        /*margin: 100px auto 0;*/
        /*display:grid;*/
        /*grid-template-columns: auto auto auto auto;*/
        /*grid-gap: 1em;*/


    }
    .item{
        display:inline-block;
        width: 211px;
        /*margin: 100px auto 0;*/
     /*background-color: #909ba5;*/

    }
    .form-control{
        /*display:inline-block;*/
        width:200px;
        height:400px;
        background-color: #fffcdc;


    }
    .form-group{
        display: block;
        background-color: #00bf8f;
    }
    .sub_category{

    }
</style>