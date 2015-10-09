<?php
//var_dump($data);
//$data = array("rnd" => $_GET["rnd"]);
// $data = $_POST;
$ch = curl_init('https://fmipalcweb.icloud.com/fmipalcservice/client/getCaptchaImage?rnd='.$_GET['rnd']);
//$ch = curl_init('https://fmipalcweb.icloud.com/fmipalcservice/client/checkActivationLock');
//curl_setopt($ch, CURLOPT_USERAGENT, "iTunes/10.2.1 (Macintosh; Intel Mac OS X 10.7) AppleWebKit/533.16");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	"Host: fmipalcweb.icloud.com",
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
    "Accept-Language: es-ES,es;q=0.8,en-US;q=0.5,en;q=0.3",
    "Content-Type: text/xml; charset=UTF-8",
    "Referer: https://www.icloud.com/activationlock/",
    "Origin: https://www.icloud.com"
));

// curl_setopt($ch, CURLOPT_HEADER, TRUE);
// curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//enviamos el array data
//curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
curl_setopt($ch, CURLOPT_TIMEOUT_MS, 200000);
$data = curl_exec($ch);
// Copia el recurso
$curl_errno = curl_errno($ch);
$curl_error = curl_error($ch);
curl_close($ch);

echo $data;

?>