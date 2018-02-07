<?php
	@session_start();
	header("Content-type: text/html; charset='UTF-8'");
	include_once "wxconfig.php";
	include_once "cytools.class.php";
	$code=$_GET["code"];
	$state=$_GET["state"];
	$clientRedirect_uri=$_SESSION[$state];
	$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".__WXAPPID__."&secret=".__WXAPPSECRET__."&code=".$code."&grant_type=authorization_code";
	$cyt=new hlinfoHttpRequest();
	
	$rs1=$cyt->httpsget($url);
	$rs1=json_decode($rs1, true);
	if(isset($rs1["access_token"])){
		$access_token=$rs1["access_token"];
		$openid=$rs1["openid"];
		
		$url2="https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
		$rs2json=$cyt->httpsget($url2);
		$rs2=json_decode($rs2json, true);
		if(isset($rs2["openid"]) && isset($rs2["nickname"]) && isset($rs2["headimgurl"])){
			$arr=array("success"=>true,"data"=>$rs2json,"msg"=>"获取用户信息成功");
			$urltoclient=$clientRedirect_uri."?data=".json_encode($arr);
			echo "<script>location.href='".$urltoclient."';</script>";
		}else{
			$arr=array("success"=>false,"data"=>"","msg"=>"获取用户信息失败");
			$urltoclient=$clientRedirect_uri."?data=".json_encode($arr);
			echo "<script>location.href='".$urltoclient."';</script>";
		}
		
	}else{
		$arr=array("success"=>false,"data"=>"","msg"=>"获取access_token失败");
		$urltoclient=$clientRedirect_uri."?data=".json_encode($arr);
		echo "<script>location.href='".$urltoclient."';</script>";
	}
