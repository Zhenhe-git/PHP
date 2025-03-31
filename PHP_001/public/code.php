<?php
	/*
	 * 初始化
	 */
	$border = 0; 		//是否需要边框 ：1要；0不要
	$n = 4; 			//验证码位数
	$w = $n * 50; 		//图片宽度
	$h = 50; 			//图片高度
	$font = 5; 			//字体(1~5)
	$code = '3456789'; 	//验证码内容包含数字（去除掉容易混淆的012）
	//验证码内容还包含小写字母（去除掉容易混淆的loz）
	$code .= 'abcdefghijkmnpqrstuvwxy';  
	//验证码内容还包含大写字母（去除掉容易混淆的LOZ）
	$code .= 'ABCDEFGHIJKMNPQRSTUVWXY';  
	$vCode = ''; 		//验证码字符串初始化	
	
	/*
	 * 绘制基本框架
	 */
	$img = imagecreatetruecolor($w, $h);	//创建验证图片
	$background = imagecolorallocate($img, 255, 255, 255);	//设置背景颜色（白色）
	imagefill($img, 0, 0, $background); 	//填充背景色
	if ($border) {
	    $black = imagecreatetruecolor($img, 0, 0, 0); 		//设置边框颜色（黑色）
	    imagerectangle($img, 0, 0, $w-1, $h-1, $black); 	//绘制边框
	}
	
	/*
	 * 逐位产生随机字符
	 */
	for ($i = 0; $i < $n; $i++) {
	    $ix = rand(0, strlen($code) - 1); 		//在验证码组合中随机产生一个序号
	    $c = substr($code, $ix, 1); 			//获取该序号处的字符
	    $x = floor($w/$n)*$i + 5;				//设置绘制字符的位置（x坐标）
	    $y = rand(0,$h-imagefontheight($font));	//设置绘制字符的位置（y坐标）
	    //设置字符颜色（随机）
	    $charColor = imagecolorallocate($img, rand(0,100), rand(0,100), rand(0,100)); 
	    ImageChar($img, $font, $x, $y, $c, $charColor);		//绘制字符
	    $vCode .= $c; 		//逐位加入到验证码字符串中
	}	

	/*
	 * 添加干扰
	 */
	for ($i = 0; $i < 5; $i++) {   		//绘制背景干扰线
	    //设置干扰线颜色（随机）
	    $lineColor = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
	    //绘制干扰线
	    imagearc($img, rand(-5,$w), rand(-5,$h), rand(20,300), rand(20,200), 55, 44, $lineColor); 
	}
	for ($i = 0; $i < $n * 30; $i++) {	//绘制背景干扰点
	    //设置干扰点颜色（随机）
	    $pointColor = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
	    //绘制干扰点
	    imagesetpixel($img, rand(0,$w), rand(0,$h), $pointColor);
	}
	
	/*
	 * 绘图结束，输出图片
	 */
	header('Content-type: image/png');		//通知浏览器这是一幅图片
	imagepng($img);							//生成PNG格式的图片输出给浏览器
	imagedestroy($img);						//销毁该画布

	/*
	 * 把产生的验证码字符串写入到SESSION中
	 */
	if (!isset($_SESSION)) session_start();	//开启session会话
	$_SESSION['vCode'] = $vCode;
?>