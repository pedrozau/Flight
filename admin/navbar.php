
<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >

		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=booked" class="nav-item nav-booked"><span class='icon-field'><i class="fa fa-book"></i></span> Marcações</a>
				<a href="index.php?page=flights" class="nav-item nav-flights"><span class='icon-field'><i class="fa fa-plane-departure"></i></span> Voos</a>
				<a href="index.php?page=paiment" class="nav-item nav-flights"><span class='icon-field'><i class="fa fa-plane-departure"></i></span>Pagamento</a>
				<a href="index.php?page=airport" class="nav-item nav-airport"><span class='icon-field'><i class="fa fa-map-marked-alt"></i></span> Aeroportos</a>
				<a href="index.php?page=airport" class="nav-item nav-airport"><span class='icon-field'><i class="fa fa-building"></i></span> Linhas aereas</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Usuários</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cog"></i></span> Definições</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
