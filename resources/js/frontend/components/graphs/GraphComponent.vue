<template>
    <div>
        <apexchart width="500" type="bar" :options="chartOptions" :series="series"></apexchart>
    </div>
</template>


<script>

export default {
data: function() {
return {
chartOptions: {
chart: {
id: 'vuechart-example'
},
xaxis: [{
    categories: {},
}]
},
series: [{
name: '',
// data: [30, 40, 45, 50, 49, 60, 70, 91]
 data: [],
  //  categories: {},
}]
}


},
    created: function () {
        this.loadChartData();
      //  this.loadMonths();
    },
    methods: {
        loadChartData() {
          //  var vm = this
            axios.get("api/sales")
                .then(({data}) =>
                    (this.chartOptions.xaxis= data.month_name)

                 //   (vm.categories= data.months)
                );
        },
            loadMonths() {
                var vm = this
                axios.get("api/sales")
                    .then(({data}) =>
                        (vm.chartOptions.xaxis.categories= data.months)

                    );

        },

    }

};
</script>