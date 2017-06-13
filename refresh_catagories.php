<?PHP
session_start();

$cataFile = '../private/catagories';
$prodFile = '../private/products';

if (file_exists($prodFile))
{

	$prodArray = unserialize(file_get_contents($prodFile));
	foreach($prodArray as $current)
	{
		if (!in_array($current[catagory]))
			$catagories[] = $current[catagory];
	}
}
file_put_contents($cataFile, serialize($catagories));
echo "OK\n";
?>