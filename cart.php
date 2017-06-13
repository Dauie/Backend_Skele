<?php
	session_start();
	if ($_POST['empty_cart'] == 'empty cart') {
		unset($_SESSION['cart']);
		$_SESSION['cart'] = [];
	}
?>
<!DOCTYPE html>
<html>
	<header>
        <link type="text/css" rel="stylesheet" href="css/cart.css">
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
				<a href="storefront.php">product</a>
			</div>
		</div>
		<div id="cart">
			<?php
				foreach ($_SESSION['cart'] as $prod_name => $amount_in_stock) {
					echo '<div class="item">';
					echo '<span class="name">'.$prod_name.'</span>';
					echo ' : ';
					echo '<span class="desc">'.$amount_in_stock.'</span>';
					echo '</div>';
				}
				if ($_SESSION['cart'] == False)
					echo '<span>Cart is Empty</span>';
			?>
		</div>
		<div class="actions">
			<form method="post">
				<input type="submit" name="empty_cart" value="empty cart"/>
			</form>
			<form method="post" action="order.php">
				<input type="submit" name="order" value="order"/>
			</form>
		</div>
	</body>
</html>