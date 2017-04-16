<div class="paper">	

	<span class="_paperid"></span>	

	<span class="<?php echo $paper->status->name; ?>_paperid"><?= $this->Html->link(h($paper->paperId), ['action' => 'view', $paper->id]) ?></span>	


	<span class="price"><b>Data: <?= $this->Time->format($paper->date, 'dd-MM-YYYY', 'invalid') ?></b></span> |	

	<span class="client-name">Creat de <?= $paper->has('user') ? $this->Html->link($paper->user->firstName.' '.$paper->user->lastName, ['controller' => 'Users', 'action' => 'view', $paper->user->id]) : '' ?></span> | Creat la: <?php echo $this->timeDiffToDays($paper->date); ?>

	<span class="client-name"><?= $paper->has('client') ? $this->Html->link($paper->client->name, ['controller' => 'Clients', 'action' => 'view', $paper->client->id]) : '' ?></span><br>	

<!--	<span class="drafts"><?php //echo $this->Html->link($paper->status->name, ['controller' => 'Statuses', 'action' => 'view', $paper->status->id]); ?></span><br>  -->
	
	<span class=<?php echo $paper->status->name; ?>><?= h($paper->status->name) ?></span><br>

	<span class="price"><b>Note2:</b> <?= h($paper->notes1) ?></span> <br>	

	<span class="price"><b>Note2:</b> <?= h($paper->notes2) ?></span> <br>	

	<span class="price"><b>Total:</b> <?= $this->Number->format($paper->total) ?> <?= $paper->has('currency') ? $this->Html->link($paper->currency->name, ['controller' => 'Currencies', 'action' => 'view', $paper->currency->id]) : '' ?></span>

	</div>	

<hr>