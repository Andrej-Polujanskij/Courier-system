<?php
include 'includes/header.php'
?>



<div class="aside">
	<?php
	include 'includes/back_btn.php'
	?>

	<nav>
		<ul class="menu">
			<li>
				<a href="./new_parcel.php">Nauja siuntą</a>
			</li>
			<li>
				<a href="./index.php">Namo</a>
			</li>
		</ul>
	</nav>
</div>

<div class="dashboard">
	<div class="dashboard-user-complete">

		<h1>Tikrinti siunta</h1>
		<hr>

		<div class="track-form">
			<label class="form-label" for="parcel_search">
				Iveskyte siuntos numeri
			</label>
			<input type="search" class="form-control" id="parcel_search" name="parcel_search">
			<div class="mt-3">
				<button class="btn btn-main" id="parcel_search_btn" type="submit">Ieskoti</button>
			</div>
		</div>

		<div class="bad-request">
			<div class="alert alert-danger d-flex align-items-center" role="alert">
				<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
						<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
					</symbol>
					<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
						<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
					</symbol>
					<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
					</symbol>
				</svg>
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
					<use xlink:href="#exclamation-triangle-fill" />
				</svg>
				<div>

					Siuntos su tokiu numeriu nera
				</div>
			</div>
		</div>

		<div class="good-request">
			<table cellspacing="0" cellpadding="0" class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Siuntejas:</th>
						<th scope="col">Gavejas:</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="good-request__sender"></td>
						<td class="good-request__recipient"></td>
					</tr>
					<tr>
						<td>Issiuntimo miestas</td>
						<td>Pristatimo mietas</td>
					</tr>
					<tr>
						<td class="good-request__city--from"></td>
						<td class="good-request__city--to"></td>
					</tr>
					<tr>
						<td colspan="2">Busena</td>
					</tr>
					<tr>
						<td colspan="2" class="good-request__status"></td>
					</tr>
				</tbody>
			</table>




		</div>




		<div class="track-img">
			<img src="./assets/img/track.png" alt="track">
		</div>

	</div>
</div>




<?php
include 'includes/footer.php'
?>