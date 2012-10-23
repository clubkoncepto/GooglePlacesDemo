<?php 
unset( $_GET['_'] );
unset( $_GET['callback'] );

$url = array();
foreach( $_GET as $key => $value ): $url[] = $key.'='.$value; endforeach;

$url = implode( '&', $url );

$urlkey = "https://maps.googleapis.com/maps/api/place/search/json?".$url;

$curl_handle=curl_init();
curl_setopt($curl_handle,CURLOPT_URL,$urlkey);
curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);	

echo $buffer;

?>
