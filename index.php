<?php
$f3=require('lib/base.php');
$f3->set('UI','templates/');

$f3->set('dB',new DB\SQL('mysql:host=127.0.0.1;port=3306;dbname=wtfay','root',''));



$f3->route('GET /',function($f3){
  echo View::instance()->render('main.html');
});

$f3->route('GET /users/@alpha',function($f3){
  $users=new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
  $f3->set('users',$users->find('firstname like "'.$f3->get('PARAMS.alpha').'%"'));
  echo $f3->get('dB')->log();
  echo View::instance()->render('main.html');
});





$f3->run();
?>