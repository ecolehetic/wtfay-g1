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
    $model=new App_model();
    $f3->set('user',$model->getUser($f3,array('name'=>$f3->get('PARAMS.name'))));
    if($f3->get('AJAX')){
      echo View::instance()->render('partials/user.html');
    }else{
      echo View::instance()->render('main.html');
    }
  }
  
  function searchUsers($f3){
    $model=new App_model();
    $f3->set('users',$model->searchUsers($f3,array('keywords'=>$f3->get('POST.name'))));
    
    if($f3->get('AJAX')){
      echo View::instance()->render('partials/users.html');
    }else{
      echo View::instance()->render('main.html');
    }
  }
  

  
}
?>