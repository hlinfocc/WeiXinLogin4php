<?php
class hlinfoHttpRequest{
	/**
	*功能：https post请求
	*参数：$url
	*参数：$data
	*/
	public function httpspost($url,$data){
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0');
		 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		 curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 $tmpInfo = curl_exec($ch);
		 if (curl_errno($ch)) {
		  return curl_error($ch);
		 }
		 curl_close($ch);
		 return $tmpInfo;
	}
	/**
	*功能：https GET请求
	*参数：$url
	*参数：$data
	*/
	public function httpsget($url){
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0');
		 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		 curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 $tmpInfo = curl_exec($ch);
		 if (curl_errno($ch)) {
		  return curl_error($ch);
		 }
		 curl_close($ch);
		 return $tmpInfo;
	}

}