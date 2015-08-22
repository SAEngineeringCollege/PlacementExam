<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>S.A Engineering College Placement Test</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
			<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
			<link href="assets/css/flipclock.css" rel="stylesheet" media="screen">
		<link href="assets/css/style.css" rel="stylesheet" media="screen">

<?php
require 'config.php';


 if(!empty($_POST['register_number'])){
     $register_number=$_POST['register_number'];
		 $name=$_POST['name'];
		 $department=$_POST['department'];
		 $test_number=$_POST['test_number'];
		 $year=$_POST['year'];


	 $res= mysqli_query( $con,"select * from exam_attendee where register_number='$register_number' and name='$name' and department='$department' and test_number='$test_number' and year='$year'") or die(mysql_error());

     $count=mysqli_num_rows($res);

     if($count!=0){

    echo "<h3 class='already'>Opps It Seams You've Already Attended Quiz</h3>";
		 exit();

     }
    else if($count==0){

    // $insert_q = mysqli_query($con, "INSERT INTO exam_attendee (name,register_number,department,test_number,year) VALUES ( '$name','$register_number','$department','$test_number','$year')") or die(mysql_error());
     $_SESSION['register_number']= $register_number;

	}



 }

if(!empty($_SESSION['register_number'])){
?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js1/html5shiv.js"></script>
		<script src="assets/js1/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/flipclock.js"></script>
		<style>
			.container {
				margin-top: 110px;
			}
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}
			.hide{display: none;}
		</style>
	</head>
	<body>
	   <div class="header">
			 <h3>S.A Engineering College</h3>
		 	<h1 >Online Placement Exam</h1>
		<div class="clock-timer"></div>

		</div>

			<div class="container">

				<?php
				$number_question = 1;
				$row = mysqli_query( $con, "select * from exam_event ORDER BY type");
				$row2= $row;
				$rowcount = mysqli_num_rows( $row );
				$remainder = $rowcount/$number_question;
				$i = 0;
				$j = 1; $k = 1;
				?>


				<form class="form-horizontal" role="form" onsubmit="return confirm('Are you sure you want to finish the exam ?');" method="post" action="result.php">

					<?php while ( $result = mysqli_fetch_assoc($row) ) {


						 if ( $i == 0) echo "<div class='cont question_splitter' id='question_splitter_$j'>";?>
						<div id='question<?php echo $k;?>' >
						<p class='questions' id="qname<?php echo $j;?>"> <?php echo $k?>. <?php echo $result['question'];?> <span class="pull-right label label-primary"> <?php echo $result['type'];?></span></p>
							<?php if($result['program']=""): ?>
							<pre  class="prettyprint " ><?php echo $result['program'];?></pre>
						<?php endif; ?>

							<hr>
						<input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
						<label for="radio1_<?php echo $result['id'];?>" ><?php echo $result['op1'];?></label>
						<br/>
						<input type="radio" value="2" id='radio2_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
						<label for="radio2_<?php echo $result['id'];?>" ><?php echo $result['op2'];?></label>
						<br/>
						<input type="radio" value="3" id='radio3_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
						<label for="radio3_<?php echo $result['id'];?>" ><?php echo $result['op3'];?></label>

						<br/>
						<input type="radio" value="4" id='radio4_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
						<label for="radio4_<?php echo $result['id'];?>" ><?php echo $result['op4'];?></label>

						<br/>
						<input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
						<br/>
						</div>
						<?php
							 $i++;
							 if ( ( $remainder < 1 ) || ( $i == $number_question && $remainder == 1 ) ) {
							 	echo "<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
							 	echo "</div>";
							 }  elseif ( $rowcount > $number_question  ) {
							 	if ( $j == 1 && $i == $number_question ) {
									echo "<button class='previous btn btn-success pull-left btn-lg' type='button' disabled>Previous</button>";
									echo "<button id='".$j."' class='next btn btn-success pull-right btn-lg' type='button'>Next</button>";
									echo "</div>";
									$i = 0;
									$j++;
								} elseif ( $k == $rowcount ) {
									echo " <button id='".$j."' class='previous btn btn-lg btn-success  pull-left' type='button'>Previous</button>
												<button id='".$j."' class='btn btn-danger btn-lg pull-right' type='submit'>Finish</button>";
									echo "</div>";
									$i = 0;
									$j++;
								} elseif ( $j > 1 && $i == $number_question ) {
									echo "<button id='".$j."' class='previous btn btn-lg btn-success pull-left' type='button'>Previous</button>
							            <button id='".$j."' class='next btn btn-lg btn-success pull-right' type='button' >Next</button>";
									echo "</div>";
									$i = 0;
									$j++;
								}

							 }
							  $k++;


					     } ?>




				</form>

</div>
<div class="col-md-12">

<center>

				 <nav>
  <ul class="pagination  pagination-sm">

		<?php
		$k = 1;
			$row = mysqli_query( $con, "select * from exam_event ORDER BY type");
		while ( $result = mysqli_fetch_assoc($row) ) { ?>
		<li>
			<a href="#" aria-label="Previous" class="go_to <?= $result['type']; ?>"  data-question_id="<?= $k; ?>">
				<span aria-hidden="true"><?= $k; ?></span>
			</a>
		</li>
	<?php	$k++;
	 }
		?>




  </ul>
</nav>

</center>


</div>

<?php

if(isset($_POST[1])){
   $keys=array_keys($_POST);
   $order=join(",",$keys);

   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;

   $response=mysql_query("select id,ans from exam_event where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());
   $right_op=0;
   $wrong_op=0;
   $unoped=0;
   while($result=mysql_fetch_array($response)){
       if($result['ans']==$_POST[$result['id']]){
               $right_op++;
           }else if($_POST[$result['id']]==5){
               $unoped++;
           }
           else{
               $wrong_op++;
           }

   }


   echo "right_op : ". $right_op."<br>";
   echo "wrong_op : ". $wrong_op."<br>";
   echo "unoped : ". $unoped."<br>";
}
?>


		<script>
		$('.cont').addClass('hide');

		$('#question_splitter_1').removeClass('hide');

		$(document).on('click','.next',function(){
		    last=parseInt($(this).attr('id'));  console.log( last );
		    nex=last+1;
		    $('#question_splitter_'+last).addClass('hide');

		    $('#question_splitter_'+nex).removeClass('hide');
		});

		$(document).on('click','.previous',function(){
		    last=parseInt($(this).attr('id'));
		    pre=last-1;
		    $('#question_splitter_'+last).addClass('hide');

		    $('#question_splitter_'+pre).removeClass('hide');
		});
		$(document).on('click','.go_to',function(){
				newi=parseInt($(this).data('question_id'));
				$('.question_splitter').addClass('hide');

				$('#question_splitter_'+newi).removeClass('hide');
		});

         setTimeout(function() {
             $("form").submit();
          }, 1800000);

					var clock = $('.clock-timer').FlipClock({
});
clock.setTime(1800);
clock.setCountdown(true);
		</script>
	</body>
</html>
<?php }else{

 header( 'Location: http://localhost/placement/exam/index.php' ) ;

}
?>
