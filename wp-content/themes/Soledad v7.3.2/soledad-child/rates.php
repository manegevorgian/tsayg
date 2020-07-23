 <?php
 ini_set('soap.wsdl_cache_enabled', '0');
 ini_set('soap.wsdl_cache_ttl', '0');

 define('WSDL', 'http://api.cba.am/exchangerates.asmx?wsdl');

 $error = false;

 try {
     $client = new SoapClient(WSDL, array(
         'version' => SOAP_1_2
     ));

     $result = $client->__soapCall("ExchangeRatesByDate", array(array(
         'date' => date('Y-m-d\TH:i:s')
     )));

     if (is_soap_fault($result)) {
         throw new Exception('Failed to get data');
     } else {
         $data = $result->ExchangeRatesByDateResult;
     }
 } catch (Exception $e) {
     $error = 'Message: ' . $e->getMessage() . "\nTrace:" . $e->getTraceAsString();
 }
 if ($error === false) {
     $rates = $data->Rates->ExchangeRate;
     $ratesArray = [];
     if (is_array($rates) && count($rates) > 0) {
         foreach ($rates as $rate) {
             if(in_array($rate->ISO, ["USD", "EUR", "RUB"])) {
                 $ratesArray[$rate->ISO] = $rate->Rate;
                 continue;
             }
             continue;
         }
     }
 }
 ?>

 <?php


 $curl = curl_init();

 curl_setopt_array($curl, array(
     CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?callback=test&id=2172797&units=%2522metric%2522%20or%20%2522imperial%2522&mode=xml%252C%20html&q=Gyumri",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 30,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "GET",
     CURLOPT_HTTPHEADER => array(
         "x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
         "x-rapidapi-key: 9291963274msh82ea1dd0e3175c1p1b276fjsn8b0f539ffd1b"
     ),
 ));

 $response = curl_exec($curl);
 $err = curl_error($curl);

 curl_close($curl);

 if ($err) {
     echo "cURL Error #:" . $err;
 }
$temp=substr($response,152,2);
 ?>
<div style="display: flex;flex-direction: column; align-items: center; width: max-content">
     <div style="display: flex;flex-direction: row; width: max-content">
         <?php foreach ($ratesArray as $key => $rate) { ?>
            <div style="display: flex; margin:5px; font-weight: bold;">
                <div style="margin: 1px; color: #D51F1F"><?=$key?> |</div>
                <div style="margin: 1px"><?=($rate*100/100)?></div>
            </div>
         <?php } ?>
     </div>
     <div style="display: flex;flex-direction: row; width: max-content">
            <div id="time" style="display: flex;font-weight: bold;margin: 5px"></div>
            <div style="display: flex;font-weight: bold;margin: 5px"><?=$temp."°C"?></div>
     </div>
</div>
 <script>
     setInterval(function() {
         const date = new Date();
         let seconds = date.getSeconds();
         let minutes = date.getMinutes();
         let hours = date.getHours();
         seconds = seconds <= 9 ? `0${seconds}` : seconds;
         minutes = minutes <= 9 ? `0${minutes}` : minutes;
         hours = hours <= 9 ? `0${hours}` : hours;
         document.getElementById("time").innerText = `${hours}:${minutes}:${seconds}`;
     }, 1000);
 </script>

