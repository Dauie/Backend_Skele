<?PHP
$infofile = '../private/passwd';
$infodir = '../private/';
if ($_POST[submit] == "OK" && $_POST[login] && $_POST[oldpw] && $_POST[newpw] && file_exists($infofile))
	$login = $_POST[login]; 
else
{
		echo("ERROR\n");
		return (-1);
}
if (file_exists($infofile))
{
	$userinfo = unserialize(file_get_contents($infofile));
	$i = -1;
	foreach($userinfo as $current)
	{	
		++$i;
		if ($current[login] == $login)
		{
			if ($current[passwd] == hash("whirlpool", $_POST[oldpw]))
			{
				$userinfo[$i][passwd] = hash("whirlpool", $_POST[newpw]);
				file_put_contents($infofile, serialize($userinfo));
				echo "OK\n";
				return (1);
			}
			else
			{
				echo("ERROR\n");
				return (-1);
			}
		}
	}
	echo("ERROR\n");
	return (-1);
}
?>