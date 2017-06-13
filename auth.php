<?PHP

function auth($login, $passwd)
{
	$infofile = '../private/passwd';
	$infodir = '../private/';
	if ($login && $passwd && file_exists($infodir)
			&& file_exists($infofile))
		;
	else
			return (false);
	$users = unserialize(file_get_contents($infofile));
	foreach($users as $current)
	{
		if ($current[login] == $login)
		{
			if ($current[passwd] == hash("whirlpool", $passwd))
				return (true);
		}
	}
	return (false);
}
?>