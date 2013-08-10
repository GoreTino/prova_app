<div class="container-fluid">
	<div class="accordion span3">
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
					<form class="form-search" action="/index.php/main/place_memo" method="POST">		
	     	   			<?= $selected_location['address'] ?>	     	   		
				       	<button type="submit" class="btn">Memo</button>      			
			      	</form>
				</a>
	   		</div>
	   		<div id="collapseOne" class="accordion-body collapse in">
		  		<div class="accordion-inner">
		       	Anim pariatur cliche...
		    	</div><!-- /.accordion-inner -->
		  	</div><!-- /.accordion-body collapse in -->
		</div><!-- /.accordion-group -->
	</div><!-- /.accordion -->
</div><!-- /.<div class="container-fluid"> -->