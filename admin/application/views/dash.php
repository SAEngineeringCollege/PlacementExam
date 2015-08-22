<html>

<head>
<?php $this->load->view('header');?>
</head>




<body>
<?php $this->load->view('navbar');?>
<div class="content-area">
<ul class="nav nav-tabs" role="tablist">
<?php $this->load->view('navtabs');?>

</ul>
</div>

<div class="content-area-02">
<div class="row">
<div class="col-md-2">
<div class="list-group">
<?php
$this->load->view('sidebar2');
?>
</div>
</div>
<h3><center>SAEC Placement Exam Dashboard</center></h3>
<div class="col-md-4"></div>
<div class="col-md-8 " >
	<div class="well col-md-6 chart-block" >

				<h4>Number of Students based on department </h4>

			<canvas id="myChart" width="200" height="200"></canvas>

	</div>
	<div class="well col-md-6 chart-block" >

				<h4>Number of Students based on department </h4>

			<canvas id="myChart2" width="200" height="200"></canvas>

	</div>

</div>
</div>
</div>
<!-- <?= print_r($department_score); ?> -->
</body>
<?php $this->load->view('scripts');?>
<script type="text/javascript">
var colors = ["#F7464A", "#46BFBD", "#FDB45C","#232830"];
var hcolors =["#FF5A5E", "#5AD3D1", "#FFC870","#616774"];
var data = [
	<?php
	$counter= 0;
	 foreach($department_score as $score): ?>
    {
        value:  "<?= $score['cnt']?>",
        color:colors[<?=$counter?>],
        highlight: hcolors[<?=$counter?>],
        label: "<?= $score['department']?>"
				<?php $counter = $counter + 1 ; ?>
    },
		<?php endforeach; ?>

]

var ctx = document.getElementById("myChart").getContext("2d");
var ctx2 = document.getElementById("myChart2").getContext("2d");
var myPieChart = new Chart(ctx).PolarArea(data);
var myPieChart2 = new Chart(ctx2).PolarArea(data);
</script>
</html>
