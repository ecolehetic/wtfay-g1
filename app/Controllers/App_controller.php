<?php
class App_controller{



  function __construct(){
    
  }
  
  function home(){
    echo View::instance()->render('main.html');
  }
  
  function getUsers($f3){
    $model=new App_model();
    $f3->set('users',$model->getUsers($f3,array('alpha'=>$f3->get('PARAMS.alpha'))));
    
    if($f3->get('AJAX')){
      echo View::instance()->render('partials/users.html');
    }else{
      echo View::instance()->render('main.html');
    }
  }
  
  function getUser($f3){
    $user=new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
    $f3->set('user',$user->load('userId="'.$f3->get('PARAMS.name').'"'));
    if($f3->get('AJAX')){
      echo View::instance()->render('partials/user.html');
    }else{
      echo View::instance()->render('main.html');
    }
  }
  
  
  
}
?>