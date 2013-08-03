<div class="span3">
	<div class="input-append">	
		<form class="form-search" action="/index.php/main/search_location" method="POST">			
      		<input type="text" class="span3" id="placeText" name="placeText">	      	
	       	<button type="submit" class="btn">Search</button>      			
      	</form>
    </div><!-- /.input-append -->
    <table class="table table-hover">
<?php
	if (!empty($map_cache)) {		
		foreach($map_cache as $entry){
?>
			<tr><td>
			<?= $entry->address ?>
			</td><td>
			<button type="submit" class="btn">Select</button>
			</td></tr>
<?php
		}
	}
?>
	</table>
</div><!-- /.span3 -->
