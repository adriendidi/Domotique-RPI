 <?php
$host = "localhost"; /* L'adresse du serveur */
$login = "root"; /* Votre nom d'utilisateur */
$password = "domotique"; /* Votre mot de passe */
$base = "acces"; /* Le nom de la base */
$logine = "'" . $_POST['speudo'] . "'";
$motdepasse = "'{$_POST['password']}'";

function connexion()
{
 global $host, $login, $password, $base;
 $db = mysql_connect($host, $login, $password);
 mysql_select_db($base,$db);
}

function verification()
{
global $logine, $motdepasse;
$sql = "SELECT autorisation FROM acces WHERE login = {$logine} AND  motdp = {$motdepasse}";
$req = mysql_query($sql);
$data = mysql_fetch_row($req);
if (!$data)
{
header('Location: noaccess.html');
exit;
}
if ($data[0] == 0)
{
echo"acces refusé\n";
header('Location: noaccess.html');
exit();
}
else
{
echo"acces autorisé\n";
header('Location: mamaison.php');
exit();
}
print_r ($data);
mysql_free_result($req);
mysql_close();
}

connexion();
verification();
