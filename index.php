<?php
//存有美图链接的文件名img.txt
$filename = "img.txt";
if(!file_exists($filename)){
    die('文件不存在');
}
 
//从文本获取链接
$pics = [];
$fs = fopen($filename, "r");
while(!feof($fs)){
    $line=trim(fgets($fs));
    if($line!=''){
        array_push($pics, $line);
    }
}
 
//从数组随机获取链接
$pic = $pics[array_rand($pics)];
 
//返回指定格式
$type=$_GET['type'];
switch($type){
 
//JSON返回
case 'json':
    header('Content-type:text/json');
    die(json_encode(['pic'=>$pic]));
 
default:
    die(header("Location: $pic"));
}
 
?>


<!-- <?php
//初始化随机数生成器种子，这行代码也可以删除
$seed = time();
//获取随机数
$num = rand(1,80);
//拼接图片地址
$picpath = "https://cdn.jsdelivr.net/gh/FASUZO/picture/img/".$num.".jpg";
//重定位到图片
die(header("Location: $picpath"));
?> -->


<!-- <?php
$arr = file('img.txt');
$n = count($arr) - 1;
for ($i = 1; $i <= 1; $i++) {
    $x = rand(0, $n);
    header("Location:" . $arr[$x], "\n");
}?> -->