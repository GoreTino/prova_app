<div class="span12">
    <table class="table">
		<tr><td>
			<?= $selected_location['address'] ?>
		</td></tr>
		<tr><td>
			<form class="form-search" action="/index.php/main/location_memo" method="POST">			
      		<textarea rows="12" id="placeText" name="placeText"></textarea>	      	
	       	<button type="submit" class="btn">Edit</button>
	       	<button type="submit" class="btn">Save</button>       			
      	</form>
		</td></tr>
	</table>
</div><!-- /.span3 -->