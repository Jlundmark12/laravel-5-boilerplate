
<template>


    <!--card header-->
    <form action="">


        <table class="table-responsive table-striped table-hover table-bordered">

            <thead>
            <!--<div  class="row">-->
            <tr>
                <th class="cols-1">ID</th>
                <th class="cols-1">Category</th>
                <th class="col-m" style="width: 10%">SubCat</th>
                <th class="col-lg" style="width: 100%">Name</th>
                <th class="col">Size</th>
                <th class="col">Color</th>
                <th class="col">Condition</th>
                <th class="col">Inventory</th>
                <th class="col">Kurt's Count</th>
                <th>Edit</th>
            </tr>
            <!--</div>-->
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.id">

                <td>{{product.id}}</td>
                <td>{{product.cat.category}}</td>
                <td>{{product.subcat.sub_name}}</td>
                <td>{{product.short_name.short_name}}</td>
                <td>{{product.size.size_name}}</td>
                <td>{{product.color.color_name}}</td>
                <td>{{product.condition.condition_name}}</td>
                <!--<td>{{product.inventory_id}}</td>-->
                <td>{{product.inventory_now.stock}}</td>
                <td><input type="text" class="form-control user_input_value"></td>
                <!--<td><input type="text" data-id-value="<?php echo $row['sku']; ?>" class="form-control user_input_value"/></td>-->

                <td>
                    <a href="#">
                        <i class="fa fa-edit blue"></i>
                    </a>

                    <a href="#">
                        <i class="fa fa-trash" style="color: red;"></i>
                    </a>
                </td>
            </tr>

            </tbody>
        </table>

    </form>
</template>

<script>

import RawPFilter from './RawPFilter.vue';
//Vue.component('raw-filter', require('./components/dashboard/RawPFilter.vue'));

    export default {
        // props:['category'],
        data: function(){
            return {
                products: {
                    id: '',
                    category: [],
                    sub_category: '',
                    name: '',
                    size: '',
                    color: '',
                    inventory: '',
                    kurt: '',
                    message:'this is a great Message!'
                },

            }



        },
computed(){

},


        created() {
            Event.$on('CategorySelected',(category_id)=>{     this.loadProducts(); });


        },
        methods: {
            loadProducts() {
                axios.get("api/products").then(({data}) => (this.products = data));
            },

        },
// components: {
//           'RawPFilter': 'raw-filter',
//     message:''
// }
    };
</script>

<style scoped>

</style>