<?php

	include("config.php");
	include("class/SiteResultsProvider.php");

	if(isset($_GET["term"])) {
		$term = $_GET["term"];
	} else {
		exit("type something");
	}

	$type = isset($_GET["type"]) ? $_GET["type"] : "sites";
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;

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
								<input class="searchbox" type="text" name="term" value="<?= $term; ?>">
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

			<div class="mainResultsSection">
				<?php
				$resultsProvider = new SiteResultsProvider($con);
				$pageSize = 20;


				$numResults = $resultsProvider->getNumResults($term);

				echo "<p class ='resultsCount'> $numResults results found</p>";

				echo $resultsProvider->getResultsHtml($page,$pageSize,$term);
				?>
			</div> <!--mainResultsSectionクラスの終了タグ -->

			<div class="paginationContainer">

				<div class="pageButtons">

					<div class="pageNumberContainer">
						<img src="assets/logo/pageStart.png">
					</div>

					<?php

					$pagesToShow = 10;
					$numPages = ceil($numResults / $pageSize);
					$pagesLeft = min($pagesToShow, $numPages);

					$currentPage = $page - floor($pagesToShow / 2);

					if($currentPage < 1){
						$currentPage = 1;
					}

					if($currentPage + $pagesLeft >$numPages + 1){
						$currentPage = $numPages + 1 - $pagesLeft;
					}

					while($pagesLeft != 0 && $currentPage <= $numPages){
						if($currentPage == $page){
							echo "<div class='pageNumberContainer'>
											<img src='assets/logo/pageSelected.png'>
											<span class='pageNumber'>$currentPage</span>
									</div>";
						} else{
							echo "<div class='pageNumberContainer'>
									<a href='search.php?term=$term&type=$type&page=$currentPage'>
										<img src='assets/logo/page.png'>
										<span class='pageNumber'>$currentPage</span>
									</a>
							</div>";
						}

						$currentPage++;
						$pagesLeft--;
					}
					 ?>



					<div class="pageNumberContainer">
						<img src="assets/logo/pageEnd.png">
					</div>

			</div>




			</div> <!--paginationクラスの終了タグ -->


		</div> <!-- divクラスwrapperの終了タグ -->
</body>
</html>
