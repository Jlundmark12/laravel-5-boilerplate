<template>
  <div id="chart">

  <apexchart width="1000" type="bar" :options="chartOptions" :series="series"></apexchart>
  </div>
</template>

<script>


    export default {
        data: function () {
            return {
                 series:
                     {
                   names: [],
                   // years: [],
                   sales: []
                }
                ,


                chartOptions: {
                    chart: {
                        stacked: true,
                        toolbar: {
                            show: true
                        },
                        zoom: {
                            enabled: true
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetX: -10,
                                offsetY: 0
                            }
                        }
                    }],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                        },
                    },

                    xaxis: {
                        type: 'datetime',
                        categories: [],
                    },
                    legend: {
                        position: 'right',
                        offsetY: 40
                    },
                    fill: {
                        opacity: 1
                    }
                }
            }
        },
        created: function () {
            // this.loadMonths();
            // this.loadYears();
            // this.loadSales();

            this.loadChartData();
        },
    //
    // (this.series.thumbs = data.sale)
    // (this.series.years = data.year)
        methods: {
            loadChartData() {
                var vm = this
                axios.get("api/sales")
                    .then(({data}) =>
                        (vm.series.names = data.months)
                        (vm.series.sales = data.sale)

                    );


            },
            loadMonths() {
                var vm = this
                axios.get("api/sales")
                    .then(({data}) =>
                        (vm.series.months = data.months)


                    );


            },
             loadYears() {
                 var vm = this
                 axios.get("api/sales")
                     .then(({data}) =>
                         (vm.data.years = data.year)


                     );


             },
            loadValues() {
                var vm = this
                axios.get("api/sales")
                    .then(({data}) =>
                        (vm.data.thumbs = data.sale)


                    );

         },
        },

    }
  </script>