<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-success main-nav">
		<div class="container-fluid">
		<a class="navbar-brand col-xl-2 col-md-3 text-justify text-white" href="/tutorial/"><img class="img-fluid rounded-circle" width="75" height="auto" src="<?php echo $profilepic; ?>"> Learning Software</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item active">
					<a class="nav-link text-white" href="/tutorial/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="playlists.php">Playlists</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="info.php">Info over Website</a>
				</li>
				<?php if(isset($_SESSION["loggedin"])) {
				echo "<li class='nav-item'><a class='nav-link text-white' href='admin/dashboard.php'>Enquetes</a></li><li class='nav-item'><a class='nav-link text-white' href='admin/dashboard.php'>Dashboard</a></li>";
				}else{
					echo "<li class='nav-item'><a class='nav-link text-white' href='enquete.php'>Enquetes</a></li>";
				}?>
			</ul>
		<form method="POST" enctype="multipart/form-data" action="search.php" class="d-flex">
          <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
		  </form>
			</div>
		</div>
	</nav>