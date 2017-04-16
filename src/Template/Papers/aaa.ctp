<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
	
		
    <link rel="icon" href="favicon.ico">
    <title>Deconturi | Papers</title>
	
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/decont/css/bootstrap.css"/>	<!-- Custom styles for this template -->	
	<link rel="stylesheet" href="/decont/css/style.css"/>
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
		  <a class="navbar-brand" href="index.html">Deconturi</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		  <ul class="nav navbar-nav">
		  
			<li><a href="http://www.railforce.ro/decont">Papers</a></li>		
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Date <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="http://www.railforce.ro/decont/clients">Clienti</a></li>
				<li><a href="http://www.railforce.ro/decont/providers">Furnizori</a></li>

				<li class="divider"></li>
				<li><a href="http://www.railforce.ro/decont/categories">Categorii</a></li>
				<li><a href="http://www.railforce.ro/decont/units">Unitati masura</a></li>
				<li><a href="http://www.railforce.ro/decont/types">Tipuri decont</a></li>

				<li class="divider"></li>
				<li><a href="http://www.railforce.ro/decont/users">Utilizatori</a></li>
			  </ul>
			</li>
			
			<li class="active"><a href="http://www.railforce.ro/decont/papers">Deconturi</a></li>
			
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
			<li><a href="http://www.railforce.ro/decont/users/login">Intrare</a></li>
			<li><a href="http://www.railforce.ro/decont/users/logout">Iesire</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	
	<section>
		<div class="container">
			<div class="row">
	<div class="col-md-9">
		<h1><i class="glyphicon glyphicon-plus"></i> Adaugare decont</h1>
<form method="post" accept-charset="utf-8" action="/decont/papers/add"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<div class="input select"><label for="client-id">Client</label><select name="client_id" class="form-control" id="client-id"><option value="1" selected="selected">TEST SRL</option><option value="2">TEST 222 SRL</option></select></div>			</div>
			<div class="form-group">
				<div class="input date required"><label>Data decont</label><select name="date[year]"><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017" selected="selected">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option></select><select name="date[month]"><option value="01">January</option><option value="02">February</option><option value="03" selected="selected">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select><select name="date[day]"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24" selected="selected">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div>			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<div class="input select"><label for="provider-id">Furnizor</label><select name="provider_id" class="form-control" id="provider-id"><option value="1" selected="selected">SC RAIL FORCE SRL</option></select></div>			</div>
			<div class="form-group">
				<div class="input text required"><label for="paperid">Numar decont</label><input type="text" name="paperId" class="form-control" placeholder="Numar decont" required="required" maxlength="50" id="paperid" value="121"/></div>			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
				<div class="input text required"><label for="purchaseorder">Numar comanda</label><input type="text" name="purchaseOrder" class="form-control" placeholder="Numar comanda" required="required" maxlength="50" id="purchaseorder" value="222"/></div>			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<div class="input select"><label for="currency-id">Moneda</label><select name="currency_id" class="form-control" placeholder="Moneda" id="currency-id"><option value="1" selected="selected">Lei</option><option value="2">Euro</option><option value="3">Dolari</option></select></div>			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-xs-8">
			<div style="float: right;margin-right: 20px;"><a href="#" onclick="In.add_line_item(); return false;"><img src="img/plus.jpg"></a></div>

			<table class="table total-table" align="right">
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>Sub total</strong>
				</td>
				<td class="totals">
					  <div id="subtotal">15354.74</div>
				</td>
			</tr>
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>TVA</strong>
				</td>
				<td class="totals">
					<div id="tax">2917.40</div>
				</td>
			</tr>  
			<tr>
				<td width="80%">&nbsp;</td>
				<td>
					<strong>Total</strong>
				</td>
				<td class="totals">
					<div id="total">18272.14</div>
				</td>
			</tr>
			</table>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-4">

			<div class="form-group">
				<div class="input date required"><label>Data executie</label><select name="date[year]"><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017" selected="selected">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option></select><select name="date[month]"><option value="01">January</option><option value="02">February</option><option value="03" selected="selected">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select><select name="date[day]"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24" selected="selected">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div>			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<div class="input select"><label for="categories-ids">Categorie</label><input type="hidden" name="categories[_ids]" value=""/><select name="categories[_ids][]" multiple="multiple" class="form-control" id="categories-ids"><option value="1" selected="selected">test</option><option value="2" selected="selected">test2</option></select></div>			</div>
		</div>
	</div>

			
	<div class="row">
		<div class="col-xs-8">
			<div class="form-group">
				<div class="input text required"><label for="notes1">Note 1</label><input type="text" name="notes1" class="form-control" required="required" maxlength="250" id="notes1" value="note 11111"/></div>				<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
			</div>
			<div class="form-group">
				<div class="input text required"><label for="notes2">Note 2</label><input type="text" name="notes2" class="form-control" required="required" maxlength="250" id="notes2" value="diverse note 2222"/></div>				<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
			</div>
		</div>
	</div>


				<button type="submit">Submit</button>				</form>					




	</div>

	<div class="col-md-3">	
	
		<div class="panel-footer clearfix">
			<div class="pull-left">
				<a href="http://www.railforce.ro/decont/papers/add" class="btn btn-info">Decont nou</a>			</div>
		</div>

		<div class="panel-footer clearfix">
			<div class="pull-left">
				<h3>Total deconturi</h3>
				<p>Total = 677657.23 Lei</p>
				<p>Numar deconturi = 338</p>
				<p>De incasat = 100424.42 Lei</p>
			</div>
		</div>
		<div class="panel-footer clearfix">
			<div class="pull-left">
				<h3>Total deconturi pe categorii</h3>
				<p>Transport marfa = 677657.23 Lei</p>
				<p>Manevra = 338</p>
				<p>Altele = 100424.42 Lei</p>
			</div>
		</div>

	</div>
			
			</div>
		</div><!-- /.container -->
	</section>

	<footer>
		<p>Copyright 2017. Toate drepturile rezervate</p>
	</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="/decont/js/jquery.js"></script>	<script src="/decont/js/bootstrap.js"></script>
  </body>
</html>
