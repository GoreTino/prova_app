<div id="memoModal" class="modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div ble class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<<h3><?= $selected_location['address'] ?></h3>
</div> <!-- /.modal-header -->
<div class="modal-body">
	<form class="form-search" action="/index.php/main/place_memo" method="POST">
		<textarea rows="12" id="placeMemo" name="placeMemo">
		</textarea>   
			<script>
			CKEDITOR.replace( 'placeMemo' );
			</script>
		<a href="#" class="btn btn-primary">Save changes</a>
	</form>
</div> <!-- /.modal-body -->
</div>