<div class="panel panel-info">

	<div class="panel-heading">
	
		<h2> <small><?= $this->Html->link(h($paper->paperId), ['action' => 'view', $paper->id]) ?></small> | <?= $paper->client->name ?></h2>
		
	</div>
	
	<div class="panel-body">
	
		<span class="price"><b>Data: <?= $this->Time->format($paper->date, 'dd-MM-YYYY', 'invalid') ?></b></span> |	

		Creat la: <?php echo $this->timeDiffToDays($paper->date); ?>

		<span class=<?php echo $paper->status->name; ?>><?= h($paper->status->name) ?></span><br>

		<span class="price"><b>Note2:</b> <?= h($paper->notes1) ?></span> <br>	

		<span class="price"><b>Note2:</b> <?= h($paper->notes2) ?></span> <br>	

	</div>
	
	<div class="panel-footer">
	
		<span class="price"><b>Total:</b> <?= $this->Number->format($paper->total) ?> <?= $paper->has('currency') ? $this->Html->link($paper->currency->name, ['controller' => 'Currencies', 'action' => 'view', $paper->currency->id]) : '' ?></span>
	
	</div>
	
</div>