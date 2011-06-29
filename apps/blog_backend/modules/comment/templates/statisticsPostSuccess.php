<?php use_stylesheet('/mpRealityAdminPlugin/css/admin.css') ?>


<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type='text/javascript'>
    google.load('visualization', '1', {'packages':['annotatedtimeline']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Date');
        data.addColumn('number', 'Número de vistas');

        data.addRows([

<?php foreach ($statisticsPost as $post) { ?>
                [new Date(<?php echo date('Y', strtotime($post['fecha'])); ?>, <?php echo date('m', strtotime($post['fecha'])); ?> ,<?php echo date('d', strtotime($post['fecha'])); ?>), <?php echo $post['cantidad_visita']; ?>],
<?php } ?>
        ]);

        var chart = new google.visualization.AnnotatedTimeLine(document.getElementById('chart_div'));
        chart.draw(data, {displayAnnotations: true});
    }

</script>

<div id='chart_div' style='width: 900px; height: 400px; margin: 0 auto;'></div>