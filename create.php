<?PHP
$infofile = '../private/passwd';
$infodir = '../private/';
if (!file_exists($infodir))
        mkdir($infodir);
if (!file_exists($infofile))
{
	$default_user[0] = array("login" => "admin", "passwd" => hash("whirlpool", "admin"));
	file_put_contents($infofile, serialize($default_user));
}
if ($_POST[submit] == "OK")
        $nusr = array("login" => $_POST[login], "passwd" => hash("whirlpool", $_POST[passwd]));
else
{
                echo("ERROR\n");
                return (-1);
}
if (file_exists($infofile))
{
        $userarray = unserialize(file_get_contents($infofile));
        foreach($userarray as $current)
        {
                if ($current[login] == $_POST[login])
                {
                        echo("ERROR\n");
                        return (-1);
                }
        }
}
$userarray[] = $nusr;
file_put_contents($infofile, serialize($userarray));
header('Location: ../login.html');
echo "OK\n";
?>