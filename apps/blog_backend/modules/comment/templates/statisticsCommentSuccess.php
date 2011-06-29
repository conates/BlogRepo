<?php use_stylesheet('/mpRealityAdminPlugin/css/admin.css') ?>


<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type='text/javascript'>
    google.load('visualization', '1', {'packages':['annotatedtimeline']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Date');
        data.addColumn('number', 'Número de comentarios');

        data.addRows([

<?php foreach ($statisticsComment as $comment) { ?>
                [new Date(<?php echo date('Y', strtotime($comment['fecha'])) ?>, <?php echo date('m', strtotime($comment['fecha'])) ?> ,<?php echo date('d', strtotime($comment['fecha'])) ?>), <?php echo $comment['cantidad_comentario'] ?>],
<?php } ?>
        ]);

        var chart = new google.visualization.AnnotatedTimeLine(document.getElementById('chart_div'));
        chart.draw(data, {displayAnnotations: true});
    }
    alert(val1);
</script>

<?php foreach ($statisticsComment as $comment) { ?>
 <?php echo $comment['slug'] ?>
<? } ?>
<div id='chart_div' style='width: 900px; height: 400px; margin: 0 auto;'></div>