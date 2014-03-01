<?php
	
	//直接使用cookies访问
	$send_url='http://www.renren.com/人人ID';
	$cookie = '';	//登录人人，并勾选“下次自动登录”，从浏览器获取cookies，当然，如果你从浏览器上注销人人，此cookies将失效。建议获取后直接清除浏览器cookies。
	$ch = curl_init($send_url);
	//设置会话
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
	curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	$contents = curl_exec($ch);
	curl_close($ch);

	//确认是否获得目标页面
	if(preg_match('/Logout.do/i',$contents)){
		echo "<p>成功刷新页面，正常工作中。</p>";
	}else{
		echo "<p>失败，可能是cookies错误。</p>";
	}
	
?>