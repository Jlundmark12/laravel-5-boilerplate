<template>


    <div class="container">


</div>

</template>

<script>
    export default {

        data: function(){


            return {


                    month_options:[],




                    money_data:[],


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
      //      this.loadMonths();
            this.loadSales();
        },


        methods: {
            loadCategories() {
                axios.get("api/categories")
                    .then(({data}) =>
                        (this.category_options = data));
            },

            loadSales() {
                axios.get("api/sales")
                    .then(({data}) =>
                        (this.money_data = data));
            },
            //
            loadMonths() {
                axios.get("api/calendar")
                    .then(({data}) =>
                        (this.calendar.month_options = data));
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