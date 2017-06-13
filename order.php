<?php
	session_start();
	if ($_SESSION['loggued_on_user']) {
		if (file_exists('./private/orders') == false)
			mkdir('./private/orders');
		$order = 1;
		while (file_exists('./private/orders/'.$order.'.json'))
			$order++;
		$myfile = fopen('./private/orders/'.$order.'.json', "x");
		file_put_contents('./private/orders/'.$order.'.json', $_SESSION['loggued_on_user']."\n".json_encode($_SESSION['cart']));
		fclose($myfile);
		unset($_SESSION['cart']);
		$_SESSION['cart'] = [];
	}
?>
<!DOCTYPE html>
<html>
	<header>
        <link type="text/css" rel="stylesheet" href="css/order.css">
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
		<?php
			if ($_SESSION['loggued_on_user'])
				echo '<p>Your order is on it\'s way!</p>';
			else
				echo '<p>Please Login</p>';
		?>
	</body>
</html>