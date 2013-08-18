<div class="col-md-3">
	<div class="panel-group" id="accordion">
	    <div class="panel-heading">
    		<h4 class="panel-title">
        	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          		<?= $selected_location['address']?>	 
     	    </a>
     		<form class="form-search" action="/index.php/main/place_memo" method="POST">  	   		
				<button type="button" class="btn btn-default btn-sm pull-right">Memo</button>				      
			</form>
			</h4>
  		</div><!-- /.panel-heading -->
	    <div id="collapseOne" class="panel-collapse collapse in">
     		<div class="panel-body">
		       	Anim pariatur cliche...
		    </div><!-- /.panel-body -->
		</div><!-- /.panel-collapse collapse in -->
	</div><!-- /.panel-group -->
</div><!-- /.col-md-2 -->