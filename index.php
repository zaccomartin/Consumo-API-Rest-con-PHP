<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://covid-19-coronavirus-statistics.p.rapidapi.com/v1/stats?country=Argentina",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: covid-19-coronavirus-statistics.p.rapidapi.com",
		"x-rapidapi-key: ***********************************************" // API Key privada
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$objeto = json_decode($response);

	echo "<center>COVID19 en ".$objeto->data->covid19Stats[0]->country."<br/>";
	echo "Actualizado: ".$objeto->data->covid19Stats[0]->lastUpdate."<br/>";
	echo "Confirmados: ".$objeto->data->covid19Stats[0]->confirmed."<br/>";
	echo "Muertos: ".$objeto->data->covid19Stats[0]->deaths."<br/>";
	echo "Recuperados: ".$objeto->data->covid19Stats[0]->recovered."<br/></center>";
	
}
?>
