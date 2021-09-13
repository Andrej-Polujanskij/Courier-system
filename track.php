<?php
	include 'includes/header.php' 
?>

<h1>Tikrinti siunta</h1>

<div class="">
	<label for="parcel_search">
		Iveskyte siuntos numeri
	</label>
	<input type="search" id="parcel_search" name="parcel_search">
	<div class="">
		<button id="parcel_search_btn" type="submit">Ieskoti</button>
	</div>
</div>

<div class="bad-request">
	Siuntos su tokiu numeriu nera
</div>

<div class="good-request">
	<div class="flex">

		<div class="">
			<div class="">Siuntejas:</div>
			<div class="good-request__sender"></div>
			<div class="">Paemimo miestas</div>
			<div class="good-request__city--from"></div>
		</div>

		<div class="">
			<div class="">Gavejas:</div>
			<div class="good-request__recipient"></div>
			<div class="">Paemimo miestas</div>
			<div class="good-request__city--to"></div>
		</div>
	</div>

	<div class="">
		<div class="">Busena</div>
		<div class="good-request__status"></div>
	</div>

</div>





<div class="flex">
    <a href="./index.php">Namo</a> |
    <a href="./new_parcel.php">Nauja siunta</a>
  </div>

<?php
	include 'includes/footer.php' 
?>