<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-success main-nav">
		<div class="container">
			<ul class="nav mx-auto">
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
	</nav>