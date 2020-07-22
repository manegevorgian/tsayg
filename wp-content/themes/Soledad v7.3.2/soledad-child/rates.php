 <?php
//$xml = simplexml_load_file(ABSPATH. 'wp-content\themes\Soledad v7.3.2\soledad-child\rates.xml');
//var_dump($xml);
 $url = 'http://api.cba.am/exchangerates.asmx';

 $ch = curl_init($url);

 $form_body = '<?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">  <soap:Body>    <ExchangeRatesLatest xmlns="http://www.cba.am/" />  </soap:Body></soap:Envelope>';
// curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/xml; charset=utf-8']);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $form_body );
 curl_setopt($ch, CURLOPT_TIMEOUT, 15);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
$data = curl_exec($ch);
header('');
// file_put_contents(ABSPATH. 'wp-content\themes\Soledad v7.3.2\soledad-child\rates.xml', $data);

 $file = file_get_contents(ABSPATH.'wp-content\themes\Soledad v7.3.2\soledad-child\rates.xml');
 $decoded = new SimpleXMLElement($file);
//var_dump($decoded); exit;
 foreach($decoded->xpath("Body") as $oEntry){
    // echo $oEntry->title . "\n";
 }
 // Further processing ...
// echo var_dump ($server_output);
// if ($server_output) {
// } else { echo 'failed'; }

