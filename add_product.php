<?PHP
$productFile = '../private/products';
$infoDir = '../private/';

/*
Verify the presence of folders we are going to save our data in, that we are not gettings a duplicate image, 
and that the filetype of the file is good.
*/
if (!file_exists($infoDir))
	mkdir($infoDir);

/*
1. Verify that we have all necessary information needed to make a new product
2. Upload image and move it to $imgDir then save the path to the link into the new product array.
*/
if ($_POST[submit] == "OK" && $_POST[prod_name] && $_POST[amt_in_stock] 
	&& $_POST[prod_desc] && $_POST[price] && $_POST[catagory] && $_POST[imgurl])
{
	if (file_exists($productFile))
	{
		$prodArray = unserialize(file_get_contents($productFile));
		foreach($prodArray as $curprod)
		{
			if ($curprod[prod_name] == $_POST[prod_name]) 
			{
				echo("Error: DUPLICATE PRODUCTS - NEW PRODUCT NOT CREATED\n");
				return (-1);
			}
		}

	}
	$nProduct = array("prod_name" => $_POST[prod_name], "amt_in_stock" => $_POST[amt_in_stock],
		"prod_desc" => $_POST[prod_desc], "catagory" => $_POST[catagory], "price" => $_POST[price], "imgurl" => $_POST[imgurl]);
}
else 
{
	echo("Error: MISSING PRODUCT INFO - NEW PRODUCT NOT CREATED\n");
	return (-1);
}
/*
After all data is verified and the new product array is complete, save it. 
*/
$prodArray[] = $nProduct;
file_put_contents($productFile, serialize($prodArray));
header("Location: ../new_product.html");
echo "OK\n";
?>