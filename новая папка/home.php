<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
	$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}
  
  function closeDBConnection(mysqli $conn): void {
	$conn->close();
  }
  
function getAndPrintPostsFromDB1(mysqli $conn): void {
	$sql = "SELECT * FROM post WHERE featured = 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  while($post = $result->fetch_assoc()) {
		include 'post_preview.php';
	}
	} else {
	  echo "0 results";
	}
  }
  
  function getAndPrintPostsFromDB2(mysqli $conn): void {
	$sql = "SELECT * FROM post WHERE featured = 0";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  while($post = $result->fetch_assoc()) {
		include 'recent-post_preview.php';
	}
	} else {
	  echo "0 results";
	}
  }  

$posts = [
 [
	'id' => 1,
	'title' => 'The Road Ahead',
	'subtitle' => 'The road ahead might be paved - it might not be.',
	'img_modifier' => 'http://localhost:8001/images/polar.jpg',
	'alt_value'	=> 'polarlights',
	'author' => 'Mat Vogels',
	'author_img' => 'http://localhost:8001/images/man1.jpg',
	"featured-posts__man-name" => "featured-posts__man1-name",
	'date' => '1443139200',
	'button__class' => 'featured-posts__adventure1',
 ],
 [
	'id' => 2,
	'title' => 'From Top Down',
    'subtitle' => 'Once a year, go someplace you’ve never been before.',
	'img_modifier' => 'http://localhost:8001/images/lights.jpg',
	'alt_value'	=> 'polarlights',	
	'author' => 'William Wong',
	'author_img' => 'http://localhost:8001/images/man2.jpg',
	"featured-posts__man-name" => "featured-posts__man2-name",
	'date' => '1443139200',
	'button__class' => 'featured-posts__adventure2',
	'button' => 'adventure',
 ],
 
];

$recent_posts = [
[
	"id" => 3,
	'title' => 'Still Standing Tall',
	'subtitle' => 'Life begins at the end of your comfort zone.',
	'img_modifier' => 'http://localhost:8001/images/balloons.jpg',
	'alt_value'	=> 'balloons',
	'author' => 'William Wong',
	'author_img' => 'http://localhost:8001/images/man2.jpg',
	"recent-posts__man-name" => "recent__man2-name",
	'date' => '1443139200',
],
[
	"id" => 4,
	'title' => 'Sunny Side Up',
	'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
	'img_modifier' => 'http://localhost:8001/images/bridge.jpg',
	'alt_value'	=> 'bridge',
	'author' => 'Mat Vogels',
	'author_img' => 'http://localhost:8001/images/man1.jpg',
	"recent-posts__man-name" => "recent__man1-name",
	'date' => '1443139200',
],
[
	"id" => 5,
	'title' => 'Water Falls',
	'subtitle' => 'We travel not to escape life, but for life not to escape us.',
	'img_modifier' => 'http://localhost:8001/images/waterfall.jpg',
	'alt_value'	=> 'waterfall',
	'author' => 'Mat Vogels',
	'author_img' => 'http://localhost:8001/images/man1.jpg',
	"recent-posts__man-name" => "recent__man1-name",
	'date' => '1443139200',
],
[
	"id" => 6,
	'title' => 'Through the Mist',
	'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
	'img_modifier' => 'http://localhost:8001/images/sea.jpg',
	'alt_value'	=> 'sea',
	'author' => 'William Wong',
	'author_img' => 'http://localhost:8001/images/man2.jpg',
	"recent-posts__man-name" => "recent__man2-name",
	'date' => '1443139200',
],
[
	"id" => 7,
	'title' => 'Awaken Early',
	'subtitle' => 'Not all those who wander are lost.',
	'img_modifier' => 'http://localhost:8001/images/fog.jpg',
	'alt_value'	=> 'fog',
	'author' => 'Mat Vogels',
	'author_img' => 'http://localhost:8001/images/man1.jpg',
	"recent-posts__man-name" => "recent__man1-name",
	'date' => '1443139200',
],
[
	"id" => 8,
	'title' => 'Try it Always',
	'subtitle' => 'The world is a book, and those who do not travel read only one page.',
	'img_modifier' => 'http://localhost:8001/images/rainbow.jpg',
	'alt_value'	=> 'rainbow',
	'author' => 'Mat Vogels',
	'author_img' => 'http://localhost:8001/images/man1.jpg',
	"recent-posts__man-name" => "recent__man1-name",
	'date' => '1443139200',
],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles/style.css">
	<title>Escape</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="background"></div>
    <header>
		<div class="header__inner">
			<div class="logo">
				<a href="#">
					<img src="http://localhost:8001/images/Escape.svg" alt="Logo">
				</a>
			</div>
			<div class="nav">
				<ul class="header__menu">
					<li><a class="home" href="#">home</a></li>
					<li><a class="categories" href="#main__nav">categories</a></li>
					<li><a class="about" href="#">about</a></li>
					<li><a class="contact" href="#">contact</a></li>
				</ul> 
			</div>
		</div>
	</header>
	<main>
		<div class="banner">
			<h1 class="title">
				Let's do it together.
			</h1>
			<h2 class="subtitle">
				We travel the world in search of stories. Come along for the ride.
			</h2>
			<div class="button">
				<a class="button__text" href="#recent">View Latest Posts</a>
			</div>
		</div>
		<div id="main__nav">
			<ul class="main-navigation-menu">
				<li><a class="menu-box" href="#">Nature</a></li>
				<li><a class="menu-box" href="#">Photography</a></li>
				<li><a class="menu-box" href="#">Relaxation</a></li>
				<li><a class="menu-box" href="#">Vacation</a></li>
				<li><a class="menu-box" href="#">Travel</a></li>
				<li><a class="menu-box" href="#">Adventure</a></li>
			</ul> 
		</div>
		<div class="main__background">
			<div class="featured">
				<div class="headline">
					<h3 class="featured-posts">
						Featured Posts
					</h3>
					<div class="line"></div>
				</div>
				<ul class="featured-pics">
				<?php 
				// foreach ($posts as $post) {
				// 	include 'post_preview.php';
				// }		
				$conn = createDBConnection();
				getAndPrintPostsFromDB1($conn);
				closeDBConnection($conn);

				?>	
				</ul>
			</div>
			<div id="recent">
				<div class="headline">
					<h3 class="recent__title">Most Recent</h3>
					<div class="line"></div>
				</div>
				<ul class="recent__pics">
					<?php 
					// foreach ($recent_posts as $recent_post) {
					// 	include 'recent-post_preview.php';
					// }
					$conn = createDBConnection();
					getAndPrintPostsFromDB2($conn);
					closeDBConnection($conn);
					?>
				</ul>
			</div>
		</div>	
	</main>
	<footer>
		<div class="footer__inner">
			<div class="logo">
				<a href="#">
					<img src="http://localhost:8001/images/Escape_bottom.svg" alt="Logo">					
				</a>
			</div>
			<div class="nav_bottom">
				<ul class="footer__menu">
					<li><a class="home_bottom" href="#">home</a></li>
					<li><a class="categories_bottom" href="#main__nav">categories</a></li>
					<li><a class="about_bottom" href="#">about</a></li>
					<li><a class="contact_bottom" href="#">contact</a></li>
				</ul>	
			</div>
		</div>
	</footer>
</body>
</html>   