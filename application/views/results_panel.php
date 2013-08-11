<div class="container-fluid">
	<div class="accordion span3">
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
					<?= $selected_location['address'] ?>	 
				</a>
					<form class="form-search" action="/index.php/main/place_memo" method="POST">     	   		
				       	<button type="submit" class="btn btn-mini">Memo</button>				      
			      	</form>			      	
	   		</div>
	   		<div id="collapseOne" class="accordion-body collapse in">
		  		<div class="accordion-inner">
		       	Anim pariatur cliche...
		    	</div><!-- /.accordion-inner -->
		  	</div><!-- /.accordion-body collapse in -->
		</div><!-- /.accordion-group -->
	</div><!-- /.accordion -->
</div><!-- /.<div class="container-fluid"> -->