<?php 
$r = new Redis();

$connected = $r->connect('redis', 6379);
if(!$connected)
{
	echo  '无法连接redis!';
	exit;
}

if( $r->set("mystr","this is a redis test!",3600))
{
  echo  '原始数据缓存成功!';
  echo $r->get("mystr");
}else{
	echo 'redis not working';
}

$r->zAdd('myzset', 1, 'one');
$r->zAdd('myzset', 2, 'two');
$r->zAdd('myzset', 3, 'three');

var_dump($r->zRange('myzset', 0 , -1));