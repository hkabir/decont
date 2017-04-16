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
	
    <link rel="icon" href="favicon.ico">
    <title>Deconturi | <?= h($this->fetch('title')); ?></title>
	
    <!-- Bootstrap core CSS -->
	<?= $this->Html->css('bootstrap.css') ?>
	<!-- Custom styles for this template -->	
	<?= $this->Html->css('style.css') ?>

  </head>

  <body>
	
	<section>
		<div class="container">
			<div class="row">