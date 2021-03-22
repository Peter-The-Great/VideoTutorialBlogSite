<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-success main-nav">
		<div class="container-fluid">
		<a class="navbar-brand text-white" href="/tutorial/"><img class="img-fluid rounded-circle" width="75" height="auto" src="uploads/simg/logo.svg"> Learning Software</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-5">
				<li class="nav-item active">
					<a class="nav-link text-white" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="playlist.php">Playlists</a>
				</li>
				<?php if(!isset($_SESSION["loggedin"])) {
				echo "<li class='nav-item'><a class='nav-link text-white' href='admin/'>Login</a></li>";
				} ?>
			</ul>
			</div>
		</div>
	</nav>