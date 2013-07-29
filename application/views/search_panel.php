<div class="span3">
	<div class="col-lg-6">
		<div class="input-group">
			<form action="/index.php/main/search_location" method="POST">
      			<input type="text" id="placeText" name="placeText" class="form-control" />
	      		<span class="input-group-btn">
	        	<button type="submit" class="btn btn-default" >Go!</button>
      			</span>
      		</form>
    	</div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
    <table class="table table-hover">
<?php
	//foreach($locations as $entry){
?>
		<?= $current; ?>
<?php
	//}
?>
	</table>
</div><!-- /.span3 -->
