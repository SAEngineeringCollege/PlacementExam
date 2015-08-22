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
<div class="col-md-10">
	<div class="row">
<div class="col-md-6"><h3>Question</h3></div>
<div class="col-md-6 " >
	<button id="btnExport" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-export"></span> Export to excel</button> &nbsp;
	<button id="btnExport" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Add a question</button>
</div>
</div>
<table class="table table-hover tablesorter" id="table">
	<thead>
		<tr>
	<th>ID</th>
		<th>Question</th>

	<th>1st Option</th>
	<th>2nd Option</th>
	<th>3rd Option</th>
	<th>4th Option</th>
<th>Answer</th>
<th>Points</th>
<th>Options</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($questions as $question): ?>

		<tr>
		<td class="id"><?php echo $question->id;?></td>

		<td class="question"><?php echo $question->question;?></br><?php if($question->program!='') {?><pre  class="prettyprint " ><?php  echo $question->program;}?></pre></td>

		<td class="op1"><?php echo $question->op1;?></td>

		<td class="op2"><?php echo $question->op2;?></td>
		<td class="op3"><?php echo $question->op3;?></td>
		<td class="op4"><?php echo $question->op4;?></td>
<td><?php echo $question->ans;?></td>
<td><?php echo $question->pts;?></td>

<td><?php echo anchor('dash/wipeQuestion/'.$question->id, 'Delete', 'title="Delete"'); ?></td>

		</tr>
	<?php endforeach ?>
	</tbody>
	</table>
</div>
</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add A Question</h4>
      </div>
      <div class="modal-body">

	  <div class="form-group">
    <label for="question">Question</label>
    <textarea class="form-control" id="question" name="question" placeholder="Enter A Question" required></textarea>
  </div>
    <div class="form-group">
    <label for="question">Program (If Any)</label>
    <textarea class="form-control" id="program" name="program" placeholder="Enter The Program" required></textarea>
  </div>




  <div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label for="exampleInputPassword1">1st Option </label>
    <input type="text" class="form-control" id="op1" placeholder="1st Option " required>

    </div><!-- /form-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="form-group">
       <label for="exampleInputPassword1">2nd Option </label>
    <input type="text" class="form-control" id="op2" placeholder="2nd Option " required>
    </div><!-- /form-group -->
  </div><!-- /.col-lg-6 -->
    <div class="col-lg-6">
    <div class="form-group">
       <label for="exampleInputPassword1">3rd Option </label>
    <input type="text" class="form-control" id="op3" required placeholder="3rd Option ">
    </div><!-- /form-group -->
  </div><!-- /.col-lg-6 -->
    <div class="col-lg-6">
    <div class="form-group">
       <label for="exampleInputPassword1">4th Option </label>
    <input type="text" class="form-control" id="op4" required placeholder="4th Option">
    </div><!-- /form-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

    <div class="row">
  <div class="col-lg-6">
 <div class="form-group">

       <label for="exampleInputPassword1">Answer </label>

       <select id="ans" class="form-control">
       <option value="1">1st Option</option>
       <option value="2">2nd Option</option>
       <option value="3">3rd Option</option>
       <option value="4">4th Option</option>
       </select>

    </div><!-- /form-group -->

</div>
 <div class="col-lg-6">
 <div class="form-group">
       <label for="exampleInputPassword1">Points </label>
       <select id="pts" class="form-control">
       <option value="10">10 Points</option>
       <option value="20">20 Points</option>
       <option value="30">30 Points</option>

       </select>

    </div><!-- /form-group -->

</div>


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="add-btn" class="btn btn-primary">Add Question</button>
      </div>
    </div>
  </div>


</div>


</body>
<?php $this->load->view('scripts');?>

<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>


<script>
	    $("#add-btn").click(function(event){

        var question=$("#question").val();
				var program=$("#program").val();
        var op1=$("#op1").val();

      var op2= $("#op2").val();

      var op3= $("#op3").val();

      var op4= $("#op4").val();

      var ans= $("#ans").val();

      var pts= $("#pts").val();


 //$('#result,#name,#email,#message').empty();


      $('#question,#op1,#op2,#op3,#op4,#ans,#pts').css( "border","1px solid #fff" );

      if(question==''){
         $('#question').css( "border","1px solid red" );
      }


      if(op1==''){
        $('#op1').css( "border","1px solid red" );
      }
      if(op2==''){
        $('#op2').css( "border","1px solid red" );
      }
       if(op3==''){
        $('#op3').css( "border","1px solid red" );
      }
       if(op4==''){
        $('#op4').css( "border","1px solid red" );
      }
       if(ans==''){
        $('#ans').css( "border","1px solid red" );
      }
       if(pts==''){
        $('#pts').css( "border","1px solid red" );
      }


      if(question!='' && op1!='' && op2!='' && op3!='' && op4!='' && ans!='' && pts!='' )

          $.post( "<?php echo base_url();?>index.php/dash/updateQuestion/new",{ question:question,program:program ,op1: op1, op2:op2, op3:op3, op4:op4, ans:ans, pts:pts}, function(data) {
              location.reload();
             }
          );

      });</script>

</html>
