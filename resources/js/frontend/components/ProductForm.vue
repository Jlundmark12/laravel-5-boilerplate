<template>
    <div class="col-md-8 mt-4">
    <div class="card card-default">
        <div class="card-header">
            <i class="fas fa-code"></i> Product Form
        </div>
        <div class="card-body">
            <form action="./api/products" method="POST" @submit.prevent="addProduct()">
                <div class="form-group">
                    <input type="text" name="title" v-model="title" placeholder="Product title" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add Product" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return {
                title:''
            }
        },
        mounted() {
            console.log('Component mounted.')

        },

        methods:{
            addProduct(){
                axios.post('./api/categories',{title:'this.title'});

                alert('Adding Product');
            }
        }
    }
</script>
