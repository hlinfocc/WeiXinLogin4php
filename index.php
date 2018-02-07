<?php
	@session_start();
	header("Content-type: text/html; charset='UTF-8'");
	include_once "wxconfig.php";
	$appid="";
	$key="";
	$clientRedirect_uri="";
	if(isset($_POST["appid"]) || isset($_POST["key"]) || isset($_POST["redirect_uri"])){
		$appid=$_POST["appid"];
		$key=$_POST["key"];
		$clientRedirect_uri=$_POST["redirect_uri"];
	}
	if(isset($_GET["appid"]) || isset($_GET["key"]) || isset($_GET["redirect_uri"])){
		$appid=$_GET["appid"];
		$key=$_GET["key"];
		$clientRedirect_uri=$_GET["redirect_uri"];
	}
	#客户端请求认证,appid和key可存库，进行相应判断
	if($appid!="" && $key!=""){
		$arr=array("success"=>false,"wxdata"=>"","msg"=>"签名认证失败");
		$urltoclient=$clientRedirect_uri."?data=".json_encode($arr);
		echo "<script>location.href='".$urltoclient."';</script>";
		exit;
	}
	$state=sha1($appid.$key.$clientRedirect_uri);
	$_SESSION[$state]=$clientRedirect_uri;
	$redirect_uri="http://".$_SERVER['HTTP_HOST']."/WeiXinLogin4php/getuserinfo.php";
	
	$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".__WXAPPID__."&redirect_uri=".urlencode($redirect_uri)."&response_type=code&scope=snsapi_userinfo&state=".$state."#wechat_clientstate";
	echo "<script>location.href='".$url."';</script>";
	

