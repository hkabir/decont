<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
	
	<?php
		echo $this->fetch('meta');
		echo $this->fetch('script');
	?>
	<?php echo $this->Html->script('jquery'); ?>
    <?php echo $this->fetch('scriptTop') ?>
    
    <link rel="icon" href="favicon.ico">
    <title>Deconturi | <?= h($this->fetch('title')); ?></title>
	
    <!-- Bootstrap core CSS -->
	<?= $this->Html->css('bootstrap.css') ?>
	<!-- Custom styles for this template -->	
	<?= $this->Html->css('style.css') ?>

  </head>

  <body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>

		  <?php echo $this->Html->link('Aplicatie deconturi',['controller' => 'Papers', 'action' => 'dashboard', '_full' => true], ['class' => 'navbar-brand']); ?>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		  <ul class="nav navbar-nav">
		  
			<li><?php echo $this->Html->link('Panou',['controller' => 'Papers', 'action' => 'dashboard', '_full' => true]); ?></li>		
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Date <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->link('Clienti',['controller' => 'Clients', 'action' => 'index', '_full' => true]); ?></li>
				<li><?php echo $this->Html->link('Furnizori',['controller' => 'Providers', 'action' => 'index', '_full' => true]); ?></li>

				<li class="divider"></li>
				<li><?php //echo $this->Html->link('Categorii',['controller' => 'Categories', 'action' => 'index', '_full' => true]); ?></li>
				<li><?php echo $this->Html->link('Unitati masura',['controller' => 'Units', 'action' => 'index', '_full' => true]); ?></li>
				<li><?php echo $this->Html->link('Tipuri decont',['controller' => 'Types', 'action' => 'index', '_full' => true]); ?></li>

				<li class="divider"></li>
				<li><?php echo $this->Html->link('Utilizatori',['controller' => 'Users', 'action' => 'index', '_full' => true]); ?></li>
			  </ul>
			</li>
			
			<li class="active"><?php echo $this->Html->link('Deconturi',['controller' => 'Papers', 'action' => 'index',0, '_full' => true]); ?></li>
			
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rapoarte <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="raport1.html">Raport 1</a></li>
				<li><a href="raport2.html">Raport 2</a></li>
				<li><a href="raport3.html">Raport 3</a></li>
				<li class="divider"></li>
				<li><a href="#">Separated link</a></li>
				<li class="divider"></li>
				<li><a href="#">One more separated link</a></li>
			  </ul>
			</li>
		  </ul>
		  <form class="navbar-form navbar-left" role="search">
			<div class="form-group">
			  <input class="form-control" placeholder="Search" type="text">
			</div>
			<button type="submit" class="btn btn-default">Cauta</button>
		  </form>
		  <ul class="nav navbar-nav navbar-right">
			<li><?php echo $this->Html->link('Intrare',['controller' => 'Users', 'action' => 'login', '_full' => true]); ?></li>
			<li><?php echo $this->Html->link('Iesire',['controller' => 'Users', 'action' => 'logout', '_full' => true]); ?></li>
		  </ul>
		</div>
	  </div>
	</nav>
	
	<section>
		<div class="container">
			<div class="row">