<?php

	if(isset($_GET["term"])) {
		$term = $_GET["term"];
	} else {
		exit("type something");
	}

	$type = isset($_GET["type"]) ? $_GET["type"] : "sites";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to doodle</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>

<body>
		<div class="wrapper">

			<div class="header">

				<div class="headerContent">

					<div class="logoContainer">
						<a href="index.php">
							<img class="logo" src="assets/logo/google.png">
						</a>
					</div>

					<div class="searchContainer">
						<form action="search.php" method="GET">

							<div class="searchBarContainer">
								<input class="searchbox" type="text" name="term">
								<button class="searchButton">
									<img class="search" src="assets/logo/search.png">
								</button>
							</div>
						</form>
					</div>
				</div>

				<div class="tabsContainer">
					<ul class="tabList">

						<li class="<?= $type =='sites' ? 'active' : ''; ?>">
							<a href='<?= "search.php?term=$term&type=sites"; ?>'>
								sites
							</a>
						</li>

						<li class="<?= $type =='images' ? 'active' : ''; ?>">
							<a href='<?= "search.php?term=$term&type=images"; ?>'>
								images
							</a>
						</li>

					</ul>
				</div>

			</div> <!-- divクラスheaderの終了タグ -->
		</div> <!-- divクラスwrapperの終了タグ -->
</body>
</html>
