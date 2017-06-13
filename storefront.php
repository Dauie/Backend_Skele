<?php
	session_start();
	if ($_POST['submit'] === 'add to cart')
		$_SESSION['cart'][$_POST['prod_name']]++;
?>
<!DOCTYPE html>
<html>
	<header>
        <link type="text/css" rel="stylesheet" href="css/storefront.css">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
	</header>
	<body>
		<div class="header">
			<h1>R & M</h1>
			<div class="nav">
				<?php
					if ($_SESSION['loggued_on_user'])
						echo '<a href="resources/logout.php">logout</a>';
					else
						echo '<a href="login.html">login</a>';
				?>
				<a href="cart.php">cart</a>
			</div>
		</div>
		<div class="categories">
			<?php
				$product = unserialize(file_get_contents('./private/products'));
				$categories = [];
				foreach ($product as $entry) {
					if (False === in_array($entry['catagory'], $categories))
						$categories[] = $entry['catagory'];
				}
				foreach ($categories as $category) {
					echo '<form method="get">';
					echo '<input type="submit" name="category" value="'.$category.'"/>';
					echo '</form>';
				}
			?>
			<form method="get">
				<input type="submit" value="clear">
			</form>
		</div>
		<div id="product">
			<?php
				$product = unserialize(file_get_contents('./private/products'));
				foreach ($product as $entry) {
					if ($_GET['category'] && $_GET['category'] !== $entry[catagory])
						continue ;
					echo '<div class="entry">';
					echo '<form method="post">';
					echo '<input class="hidden" name="prod_name" value="'.$entry['prod_name'].'">';
					echo '<input type="submit" name="submit" value="add to cart"/></form>';
					echo '<div><img src="'.$entry['imgurl'].'"></div>';
					echo '<h2 class="prod_name">'.$entry['prod_name'].'</h2>';
					echo '<p class="category">'.$entry['catagory'].'</p>';
					echo '<p class="price">$'.$entry['price'].'</p>';
					echo '<p class="prod_desc">'.$entry['prod_desc'].'</p>';
					echo '<p class="amt_in_stock">stock: '.$entry['amt_in_stock'].'</p>';
					echo '</div>';
				}
			?>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
			<div class="blank"></div>
		</div>
	</body>
</html>