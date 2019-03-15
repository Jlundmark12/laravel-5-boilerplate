
<template>


    <!--card header-->
    <form action="">

        <!--<filters></filters>-->
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

import FilterComponent from '../filters/FilterComponent.vue'


    export default {
        components: { FilterComponent },
        props:{
            products:{
                type: Array,
                default:[]
            }
        },
        //   props:
        //       ['cat_id',
        // 'sub_cat_id',
        // 'color_id',
        // 'size_id',
        // 'condition_id'
        //        ],
        data: function(){
            return {
                filters: {
                    cat_id:'',
                    sub_cat_id:'',
                    color_id:'',
                    size_id:'',
                    condition_id:'',
                },
                products: {
                    id: '',
                    //category: [],
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
//computed:{
  //cat_id:'',
//},


        created() {
             // Event.$on('CategorySelected',(cat_id)=>{ this.category_id; });
          //  Event.$on('CategorySelected',()=>{ this.filters.cat_id=cat_id; });

           // Event.$on('CategorySelected',()=>{ alert(this.cat_id) });
            this.loadProducts();
          //  Event.$on('CategorySelected',()=>{ this.UpdateParent() });
          //   Event.$on('CategorySelected',()=>{ this.loadCategoryProducts(this.cat_id) });

        },
         computed:{
        //     loadCategoryProducts() {
        //         //     this.cat_id=category_id;
        //         //alert('my category is'+ {cat_id})
        //
        //         if ( cat_id != null ) {
        //             this.cat_id=this.filters.sub_cat_id
        //
        //         }
        //
        //         return 'defaultCat_id';
        //
        //     },

         },
        methods: {

            loadCategoryProducts() {
//                 let self = this;
// alert(`${self.cat_id}`);
                //self.cat_id;
                //     this.cat_id=category_id;
               // alert(${self.props.cat_id});
                alert(data);
            },
            UpdateParent() {

                   // this.filters.cat_id=filter.cat_id;
                alert('CategorySelected')
            },
            loadProducts() {
                axios.get("api/products").then(({data}) => (this.products = data));
                // Event.$emit('Products',{products: [this.products]});
                }

        },
// components: {
//           'RawPFilter': 'raw-filter',
//     message:''
// }
    };
</script>

<style scoped>

</style>