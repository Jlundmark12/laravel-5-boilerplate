
<template>


    <!--card header-->
    <form action="">
<div class="container">
        <filters v-bind:cat_id="cat_id"></filters>

</div>

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
                <td>{{product.category_id}}-{{product.cat.category}}</td>
                <td>{{product.sub_relationship_id}}-{{product.subcat.sub_name}}</td>
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
        // props: {
        //     products: {
        //         type: Array,
        //         default: []
        //     },
        //     categoryid: {
        //         ['cat_id']
        //
        //     },
        //
        // },
           props:
              ['cat_id'
        // 'sub_cat_id',
        // 'color_id',
        // 'size_id',
        /// 'condition_id'
                ],
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

                product: {

                },

            }



        },
filters:{
        // ago(products){
             //return
        // }
},


        created() {
                //Event.$on('CategorySelected',(event)=>{ alert(event.category_id) }); //working good!
            //Event.$on('CategorySelected',(event)=>{ alert(this.filters.cat_id=event.category_id) }); //working REALLY good!
          // Event.$on('CategorySelected',()=>{ this.filters.cat_id=cat_id; });


            this.loadProducts();

            //Event.$on('CategorySelected',(event)=>{ UpdateParent(event.category_id) });
             Event.$on('CategorySelected',(event)=>{ this.loadCategoryyProducts(this.filters.cat_id=event.category_id) });
                  //  Event.$on('CategorySelected',()=>{ alert(this.components ) });
//
        },
         computed: {
             loadCategoryyProducts() {

                 var vm = this, products = vm.products
                 return _.filter(products, function (query) {
                     var product = query.category_id == vm.filters.cat_id;
                  return    product
                     //console.log({product})
                 })
             }
         },
                 //return this.products.filter(product =>product.category_id==this.filters.cat_id);
// this.products(function (product) {
//     return this.product == this.filters.cat_id
// })


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
                 // },


        methods: {

            loadCategoryProducts() {
               // this.filters.cat_id=this.event.category_id;
//                 let self = this;
// alert(`${self.cat_id}`);
                //self.cat_id;
                //     this.cat_id=category_id;
               // alert(${self.props.cat_id});
                alert(this.filters.cat_id);
            },
            UpdateParent($Event) {

                 //filters.cat_id=event.category_id;
                alert(this.cat_id)
            },
            loadProducts() {
                axios.get("api/products").then(({data}) => (this.products = data));
                // Event.$emit('Products',{products: [this.products]});
                }

        },
        updated() {
        }
// components: {
//           'RawPFilter': 'raw-filter',
//     message:''
// }
    };
</script>

<style scoped>

</style>