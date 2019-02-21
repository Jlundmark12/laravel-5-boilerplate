<template>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-code"></i> Jackson Example Vue Component
        </div>
        <div class="card-body">
            I'm an example of Jackson's product-table-component Vue component!
        </div>
<div class="container">
    <!--<button click="counter += 1">Add 1 </button>-->
    <button v-on:click="counter += 1">Add 1</button>
    <p>The btton was pressed {{counter}} Times</p>
</div>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                counter: 0
            }
        },
        mounted() {
            console.log('Jackson Lundmark.')
        },
    }
</script>