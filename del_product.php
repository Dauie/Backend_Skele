<?PHP
$prodFile = '../private/products';

if ($_POST[submit] == "OK" && $_POST[del_prod] && file_exists($prodFile))
	$delProd = $_POST[del_prod]; 
else
{
		echo("ERROR\n");
		return (-1);
}
$prodInfo = unserialize(file_get_contents($prodFile));
$i = -1;
foreach($prodInfo as $current)
{
	++$i;
	if ($current[prod_name] == $delProd)
	{
		unset($prodInfo[$i]);
		file_put_contents($prodFile, serialize($prodInfo));
		echo "OK\n";
		return (1);
	}
}
echo("ERROR\n");
return (-1);
?>