<div class="span3">
	<div class="input-append">	
		<form class="form-search" action="/index.php/main/search_location" method="POST">			
      		<input type="text" class="span3" id="placeText" name="placeText">	      	
	       	<button type="submit" class="btn">Search</button>      			
      	</form>
    </div><!-- /.input-append -->
    <div>
	    <table class="table table-hover">
<?php
		if (!empty($map_cache)) {		
			foreach($map_cache as $entry){
?>
				<tr><td>
					<?= $entry->address ?>
				</td><td>
				<form action="/index.php/main/select_location" method="POST">
					<input type="hidden" id="location[address]" name="location[address]" value=<?=$entry->address?>>
					<input type="hidden" id="location[latitude]" name="location[latitude]" value=<?=$entry->latitude?>>
					<input type="hidden" id="location[longitude]" name="location[longitude]" value=<?=$entry->longitude?>>
					<button type="submit" class="btn">Select</button>
				</form>
				</td></tr>
<?php
			}
		}
?>
		</table>
	</div>
</div><!-- /.span3 -->
