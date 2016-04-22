<?php 
$m = new Memcached();

$m->addServers(array(
  array('memcached',11211)
));

if( $m->add("mystr","this is a memcache test!",3600))
{
  echo  '原始数据缓存成功!';
  echo $m->get("mystr");
}else{
	echo 'memcache not working';
}

