<div id="memoModal" class="modal show" tabindex="-1" role="dialog" aria-labelledby="memoModalLabel" aria-hidden="true">
	<div ble class="modal-header">	
		 <a href="/index.php/main/select_location" role="button" class="close" data-toggle="modal">&times;</a>
		<h3> Test </h3>
	</div> <!-- /.modal-header -->
	<div class="modal-body">
		<form class="form-search" action="/index.php/main/place_memo" method="POST">
			<textarea rows="12" id="placeMemo" name="placeMemo">
			</textarea>   
				<script>
				CKEDITOR.replace( 'placeMemo' );
				</script>			
		</form>
	</div> <!-- /.modal-body -->
	<div class="modal-footer">
		<a href="#" class="btn btn-success">Save changes</a>		
		<a href="/index.php/main/select_location" role="button" class="btn" data-toggle="modal">Close</a>
	</div>
</div> <!-- /.modal show-->