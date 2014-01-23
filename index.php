<?php
$f3=require('lib/base.php');
$f3->set('UI','templates/');
$f3->set('DEBUG',3);

$f3->set('dB',new DB\SQL('mysql:host=127.0.0.1;port=3306;dbname=wtfay','root',''));



$f3->route('GET /',function($f3){
  echo View::instance()->render('main.html');
});

$f3->route('GET /users/@alpha ',function($f3){
  $users=new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
  $f3->set('users',$users->find('firstname like "'.$f3->get('PARAMS.alpha').'%"'));
  if($f3->get('AJAX')){
    echo View::instance()->render('partials/users.html');
  }else{
    echo View::instance()->render('main.html');
  } 
});

$f3->route('GET /user/@name',function($f3){
  $user=new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
  $f3->set('user',$user->load('userId="'.$f3->get('PARAMS.name').'"'));
  echo View::instance()->render('main.html');
});





$f3->run();
?>