<div class="modal hide fade">
    <div ble class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3><?= $selected_location['address'] ?></h3>
		<button type="close" class="btn">Edit</button>
		<button type="submit" class="btn">Save</button>
	</div>
	<div class="modal-body">
		<form class="form-search" action="/index.php/main/location_memo" method="POST">
			<textarea rows="12" id="placeMemo" name="placeMemo">
      		</textarea>   
     		<script>
      	      CKEDITOR.replace( 'placeMemo' );
       		</script>
			<a href="#" class="btn">Close</a>
  	 		<a href="#" class="btn btn-primary">Save changes</a>
  	 	</form>
  </div>
</div>
