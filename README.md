# WeiXinLogin4php
微信授权登录，微信公众号授权登录，获取openid，获取微信用户名信息，php版本
## 微信公众号条件
1.	要求：微信公众号是服务号，并且通过微信认证
2.	配置：在微信公众平台配置好网页授权回调域名
## 使用示例
1.	将程序部署在服务器，配置好wxconfig.php中的微信公众号AppID和AppSecret
2.	在客户端发送请求，代码如下(使用js跳转)：  
`<script>`  
	`//此处的appid和key是本程序中配置的，可自定义，redirect_uri为客户端的回调url地址，用于接收获取的微信用户信息，需要公网地址`  
	`location="/WeiXinLogin4php/index.php?appid=&key=&redirect_uri=";`  
`</script>`  
由于本程序返回给客户端redirect_uri?data={},data参数为json数据  
客户端只需要接收data,并解析即可  
data参数形如：{"success":false/true,"wxdata":"","msg":""}，微信登录成功wxdata就是微信公众号返回的用户信息json数据，否则为空