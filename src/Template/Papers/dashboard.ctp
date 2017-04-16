<h1>Panou</h1>

<h2>Deconturi in asteptare</h2>

<?php //pr($draftPapers); ?>

<?php  foreach ($draftPapers as $paper): ?>

	<?php echo $this->element('paper', ['paper' => $paper]); ?>

<?php endforeach; ?>

<h2>Deconturi deschise</h2>
<?php  foreach ($openPapers as $paper): ?>

	<?php echo $this->element('paper', ['paper' => $paper]); ?>

<?php endforeach; ?>


<?php //h($paper->user_id); ?> | 
<?php //h($paper->status_id); ?> | 
<?php // h($paper->date); ?><hr>
<?php //$featuredVideo = $draftPapers->first(); ?>
<?php //pr($featuredVideo); ?>