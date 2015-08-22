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
	<button id="btnExport" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-export"></span> Export to excel</button>
</div>
</div>
<table class="table table-hover tablesorter" id="table">
	<thead>
		<tr>
	<th>ID</th>
		<th>Name</th>

	<th>Register Number</th>
	<th>Department</th>
	<th>Total Points</th>
	<th>Total Answers</th>

	</tr>
	</thead>
	<tbody>
	<?php foreach($attendees as $attendee): ?>

		<tr>
		<td><?php echo $attendee->id;?></td>
		<td><?php echo $attendee->name;?></td>
		<td><?php echo $attendee->register_number;?></td>
		<td><?php echo $attendee->department;?></td>
		<td><?php echo $attendee->tot_pts;?></td>
		<td><?php echo $attendee->tot_ans;?></td>




		</tr>
	<?php endforeach ?>
	</tbody>
	</table>
</div>
</div>
</div>
</body>
<?php $this->load->view('scripts');?>
</html>
