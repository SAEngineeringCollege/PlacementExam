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
	<?php $this->load->view('sidebar');?>

</div>
<div class="col-md-10">
	<div class="row">
<div class="col-md-6"><h3><?= $department; ?></h3></div>
<div class="col-md-6 " >
</div>
</div>
<div class="well col-md-3">
<h1><?= $second_year_count ?></h1>
<span>2nd Year Students</span>
</div>

<div class="well col-md-3 ">
<h1><?= $third_year_count ?></h1>
<span>3rd Year Students</span>
</div>

<div class="well col-md-3">
<h1><?= $fourth_year_count ?></h1>
<span>4th Year Students</span>
</div>

</div>
</div>
</div>
</body>
<?php $this->load->view('scripts');?>
</html>
