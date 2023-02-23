<!--load chart library-->
<script src="<?php echo base_url('asserts/bower_components/charts/code/highcharts.js');?>"></script>
<script src="<?php echo base_url('asserts/bower_components/charts/code/exporting.js');?>"></script>

<!--create contatiner div-->
<div id ="container"></div>

<!--start script for chart-->
<script type = "text/javascript">

//chart load in container
Highcharts.chart('container', {
//chart type
chart: {
    type: 'line'
},
//chart title
title: {
    text: '2022 - January to October'
},

//data in x-axis
xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct']
},

//data in y-axis
yAxis: {
    title: {
        text: 'Average'
    }
},

//style options
plotOptions: {
    line: {
        dataLabels: {
            enabled: true
        },
        enableMouseTracking: true
    }
},

//load data to tyhe chart
series: [{
    name: 'Sales',
    data: [18.0, 15, 14.5, 14.5, 21.5, 21.5, 25.2, 23.5, 22.1, 23.4]
}, {
    name: 'Expenditure',
    data: [12.9, 10.2, 12.7, 11.9,10.5, 15.2, 17.0, 19.6, 20.0, 18.1]
}]
});

//end of the script
</script>