
<div class="panel-footer clearfix">
	<div class="pull-left">
<!--	<a href="<?php echo $this->Url->build(['controller' => 'Papers', 'action' => 'add']); ?>" class="btn btn-primary" id="view_order_link">Add</a>-->
	<h3>Total deconturi</h3>
	
	<button class="btn btn-primary" type="button">
	  Draft <span class="badge"><?php echo $stats['draft']; ?></span>
	</button>
<br>
	<button class="btn btn-success" type="button">
	  Open <span class="badge"><?php echo $stats['open'];  ?></span>
	</button>
<br>
	<button class="btn btn-danger" type="button">
	  TOTAL <span class="badge"><?php echo $stats['all'];  ?></span>
	</button>

</div>
</div>