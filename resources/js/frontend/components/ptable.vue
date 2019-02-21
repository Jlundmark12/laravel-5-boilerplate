<template>
    <div class="container">
    <div class="row mt-12">
<div class="col-md-12">
    <div class="card">

        <div class="card-header">
        <h3 class="card-title">Product Table</h3>

            <div class="card-tools">
                <button class="btn btn-success float-lg-right">Add new
                    <i class="fas fa-user-plus"></i>


                </button>
            </div>
            <!--card header-->
        </div>
        <form action="">
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>SubCat</th>
                <th>Name</th>
                <th>Size</th>
                <th>Color</th>
                <th>Condition</th>
                <th>Inventory</th>
                <th style="width: 118px;">Kurt's Count</th>
                <th>Edit</th>
            </tr>
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

    </div>
        </form>
    </div>
    </div>
    </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                products: {
                     id:'',
                    category:'',
                    sub_category:'',
                    name:'',
                    size:'',
                    color:'',
                    inventory:'',
                    kurt:''
                },

            }
        },
    methods: {
            loadProducts(){
                axios.get("api/products").then(({ data })=> (this.products = data));
            },
    },
created(){
    this.loadProducts();
        }
    }
</script>

<style scoped>

</style>