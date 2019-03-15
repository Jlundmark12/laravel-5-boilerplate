
<template>


    <!--card header-->
    <form action="input">
<div class="container">
        <filters ></filters>

</div>
        <div class="container">
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
            <!--<tr v-for="product in products" :key="product.id" >-->


            <tr v-for="(product,index) in loadCategoryyProducts" :key="product.id" >

            <!--<tr v-else-if="conditionals.category_fitler = false" v-for="product in products" :key="product.id" >-->
                <td>{{product.id}}</td>
                <td>{{product.cat.category}}</td>
                <td>{{product.subcat.sub_name}}</td>
                <td>{{product.short_name.short_name}}</td>
                <td>{{product.size.size_name}}</td>
                <td>{{product.color.color_name}}</td>
                <td>{{product.condition.condition_name}}</td>
                <!--<td>{{product.inventory_id}}</td>-->
                <td>{{product.inventory_now.stock}}</td>
                <!--<td><input type="text" class="form-control user_input_value" v-model="kurt.kurt_count" v-bind:value="category_option.id"     :key="category_option.id"  ></td>-->


                <!--<td><input type="text" class="form-control user_input_value" id="kurt_input"   v-bind:kurt.kurt_count="product.id" v-model.lazy="product.kValue" v-on:input="updateCode(this.input.value)">  </td>-->
                <!--<td><input type="text" class="form-control user_input_value" v-bind:value="product.id" @input="updateQuantity($event.target.value)"      ></td>-->
                <!--<td><input type="text" class="form-control user_input_value" id="kurt_input"  v-model.lazy="product.kValue" v-on:input="updateCode({update:{kurt:product.kValue,id:product.id}})">  </td>  **good progress-->

                <!--<td><input ref="input" type="text" class="form-control user_input_value number"   name=input    v-model="loadCategoryyProducts[index].kurt_value" v-on:input="update(loadCategoryyProducts[index],input)"  >   </td>-->
                <td><input ref="input" type="text" class="form-control user_input_value number"   name=input    v-model="loadCategoryyProducts[index].kurt_value"  >   </td>
                <!--<td><input ref="input" type="text" class="form-control user_input_value number"   name=input    v-model="loadCategoryyProducts[index].kurt_value"  v-on:blur.capture="update(loadCategoryyProducts[index],input)" >   </td>-->
                <!--@input="e => value = e.target.value"-->
                <!--v-on:input="parse(event.target.value)"-->
                <!--v-on:input="updateCode(product, parse(event.target.value))"-->
                <!--v-model.lazy.number="product.kurt_count"-->
                <!--v-bind:value="format(value)"-->
                <!--<td><input type="text" class="form-control user_input_value" id="kurtInput" v-bind:input="kurtInput"   v-model.lazy="product.kurt_count" v-on:input="updateCode({data:product.id}, {data2:inp})">  </td>-->
                <!--v-model.lazy="product.kurt_count"-->
                <!--{$event.target.value}  v-on:input="updateCode(product.inventory_now.k)"-->
                <!--v-bind:value="product.id"-->
                 <!--<td><input type="text" class="form-control user_input_value"  v-model="kurtInputs" @input="updateQuantity(input.value)" > </td>-->
             <!--<td><input type="text" class="form-control user_input_value"  v-model="kurtInputs" v-on:input="console.log('what a slut')"> </td>-->
                <!--<td><input type="text" class="form-control user_input_value"  v-model="coupon.kvalue" v-on:change="updateCode(product.id)">  </td> This is start line 3/9/19 not working-->


                <!--="updateCategory($event.target.value)"-->
                <!--<td><input type="text" class="form-control user_input_value input" :value="input"   v-on:input=Event.$emit('kurtValue',{product_id: product.id,-->
                           <!--new_value: $event.target.value})  > </td>-->
                <!--Event.$emit('CategorySelected',{category: category_id,   sub_relationship_id: sub_relationship_id});-->

               <!--" v-on:input="updateQuantity({$event.target.value})"-->

                    <!--v-bind:value="product.id"-->
                <!--<td><input type="text" data-id-value="<?php echo $row['sku']; ?>" class="form-control user_input_value"/></td>-->

                <td>
                    <button  type="button" class="btn btn-primary" v-on:click.prevent="update(loadCategoryyProducts[index],index)">click</button>
                    <!--<a href="#">-->
                        <!--<i class="fa fa-edit blue"></i>-->
                    <!--</a>-->

                    <!--<a href="#">-->
                        <!--<i class="fa fa-trash" style="color: red;"></i>-->
                    <!--</a>-->
                </td>
            </tr>

            </tbody>
        </table>


        </div>
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

           props: ['value'],
        data: function(){
            return {
                    kurt: [],

                filters: {
                    cat_id:'',
                    sub_cat_id:'',
                    color_id:'',
                    size_id:'',
                    condition_id:'',
                },
                products: [{
                    id: '',
                    //category: [],
                    sub_category: '',
                    name: '',
                    size: '',
                    color: '',
                    inventory: '',
                    kurt: '',
                    message:'this is a great Message!'
                }],

                     coupon:
                    [{
                        productId: '',
                        kvalue: '',


                    } ],
                //     message:'this is a great Message!'
                // }
               // ],
                all_products: [{
                    id: '',
                    //category: [],
                    sub_category: '',
                    name: '',
                    size: '',
                    color: '',
                    inventory: '',
                    kurt: '',
                    message:'this is a great Message!'
                }],
                filtered_products: [{
                    id: '',
                    //category: [],
                    sub_category: '',
                    name: '',
                    size: '',
                    color: '',
                    inventory: '',
                    kurt: '',
                    message:'this is a great Message!'
                }],

                conditionals: {
                    category_fitler:true,
                    sub_cat_id:'',
                    color_id:'',
                    size_id:'',
                    condition_id:'',
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

                  //  Event.$on('CategorySelected',()=>{ alert(this.components ) });
            // Event.$on('CategorySelected',(event)=>{ console.log(this.filters.cat_id=event.category_id) }); //working good!
            //Event.$on('CategorySelected',(event)=>{ this.filters.cat_id=event.category_id });
            Event.$on('submit',()=> this.updateCode() );
            Event.$on('CategorySelected',(event)=>{ console.log(this.filters.cat_id=event.category, this.filters.sub_cat_id=event.sub_relationship_id) }); //working good!
            //Event.$on('SubSelected',(event)=>{ console.log(this.filters.sub_cat_id=event.sub_relationship_id }); //before trying to send in array of cat and sub
            Event.$on('SubSelected',(event)=>{ console.log(this.filters.sub_cat_id=event.sub_relationship_id ) }); //working good!
            Event.$on('ColorSelected',(event)=>{ console.log(this.filters.cat_id=event.category, this.filters.sub_cat_id=event.sub_relationship_id,this.filters.color_id=event.color_id,this.filters.size_id=event.size_id) });
            Event.$on('SizeSelected',(event)=>{ console.log(this.filters.cat_id=event.category, this.filters.sub_cat_id=event.sub_relationship_id,this.filters.size_id=event.size_id ,this.filters.color_id=event.color_id,this.filters.size_id=event.size_id ) });
            // Event.$on('ConditionSelected',(event)=>{ console.log( this.filters.cat_id=event.category,this.filters.sub_cat_id=event.sub_relationship_id,this.filters.color_id=event.color_id,this.filters.size_id=event.size_id,this.filters.condition_id=event.condition_id) });
            Event.$on('ConditionSelected',(event)=>{ console.log( this.filters.condition_id=event.condition_id) });
        },
         computed: {
             loadCategoryyProducts: function () {
                 var vm = this, products = vm.all_products
                 return _.filter(products, function (query) {
                 //start
                     if (vm.filters.condition_id ) {




                         // console.log(query);
                         var product = query.condition_id == vm.filters.condition_id ;
                     }
                    else if (vm.filters.size_id ) {

                         var product = query.size_id == vm.filters.size_id & query.color_id==vm.filters.color_id;
                         //return (product) blocked out before too
                     }else if
                     (vm.filters.color_id ) {

                         var product = query.color_id == vm.filters.color_id;
                         //return (product) blocked out before too
                     }else if
                          (vm.filters.sub_cat_id ) {

                       var product = query.sub_relationship_id == vm.filters.sub_cat_id;
                       //return (product) blocked out before too
                   }else if (vm.filters.cat_id ) {





                 var product = query.category_id == vm.filters.cat_id;
                 }
                     // this.kurt.push(product_id: vm.product.id, kValue:vm.input.v );
                   // wm.product.push(product.kurt_input);
         return (product)
                 })

},



             loadSubProducts: function () {

                 var vm = this, products = vm.all_products
                 return _.filter(products, function (query) {

                     var jackson = query.sub_relationship_id == vm.filters.sub_cat_id;
                     this.filters.sub_cat_id=event.sub_relationship_id
                     return (jackson)

                     return (()=>{vm.filtered_products.data={jackson}})
                 })

             },


             inventoryIsGreat(){
                 return `${this.product.inventory_now.k} +'is great`;
             },

        title (){

       //  return this.


                 // if (this.product.kurt_count) {
            //     return this.loadCategoryyProducts.product.id + '' + this.product.kurt_count
            // }
            // else {
            // return    this.loadCategoryyProducts.product.kurt_count=''
            // }
        },

        },

        methods: {
            update( input,index) {
                if (input.kurt_value) {
                    console.log(index);
                    //   this.$emit('input', { ...this.value, [key]: value })

                    this.kurt.push({
                        quantity_update: input.kurt_value,
                        product_id: input.id,
                        product_name: input.short_name.short_name,
                        sku: input.sku
                    });
                    // return  this.loadCategoryyProducts[index].kurt_value='';
                    //this.loadCategoryyProducts.splice(index, 1);
                    this.$delete(this.all_products, index)
                    //  return this.loadCategoryyProducts.splice(index,1);this works good to delete from computed array
                    // this.loadCategoryyProducts=this.loadCategoryyProducts[index].filter(function(item){
                    // return input.id != item.id;
                    //  })
                    //  return set(setloadCategoryyProducts,form.index,'')
                    //console.log( input.kurt_value,input.id,input.short_name.short_name );
                    return console.log(input);
                }   },

            UpdateParent($Event) {

                 //filters.cat_id=event.category_id;
                alert(this.cat_id)
            },
            loadProducts() {
                axios.get("api/products").then(({data}) => (this.all_products = data));
//                 var val = [];
//                for (product in all_products){
// console.log("Little Mother Fucking Bitch")
//                    //val.push({product,kurt_count:''})
//                }

                // then((response)=>console.log(response).then({data}) => (this.all_products = data));
                // this.all_products.map((product)=>{
                //    product.push({kurt_value:''})
                // });



                // Event.$emit('Products',{products: [this.products]});
                },


updateCode(){
//this.kurt={product_id:loadCategoryyProducts["index"].product_id};
console.log('hello dbag')
    //this.kurt.push([{ value: kurt.value, id: this.product.id }]);
    //Event.$on('input',()=>{ console.log(value) });
    //let kurt= [{
//
//        // vm
//      product_id:product.id,
//     new_count:product2,
// }];

 //    this.loadCategoryyProducts[index].push()
    //console.log(product.kurt_count);
// let kurt= [{
//
//        // vm
//      product_id:product.id,
//     new_count:product2,
// }];
    //this.kurt=[{product_id:id}];
   //  console.log(product2);
   // console.log(kurt)
    // console.log('Get a fucking life: '+data)
    // var vm = this, kurt_product_id = vm.value

 //return   this.loadCategoryyProducts.id=this.kurt.product_id

               //return kurt.kurt_product_id=value.product_id;
    //console.log('will this ever work fucker?')
//console.log(data)

},


   // {
// //this.kurt.kurt_count=  {in};
//                 console.log('Entered Value :'+ value);
//
//             console.log('cock sucker '+ $this);
//             //this.$emit('input', kurtInput );
//     //var kurtInput= this.sub_id;
//    //var product_id = vm.product.id;
//    // vm.coupon.product_id=product_id;
//     //Event.$emit('KurtInput',{category: category_id,   sub_relationship_id: sub_relationship_id});
    //}


            updateQuantity:function() {
                //this.kurt.push(product_id: vm.product.id, kValue:vm.input.v );
                //console.log('piss rod')
                var kurty= [{product_id: vm.product.id, kValue:vm.input}];
                return kurty,
                this.$emit('input',event)
            },
        //     var cross=this.$emit('input',value);
        //     console.log(cross);
        // },
        updated() {
        }

 },



};
</script>

<style scoped>

</style>