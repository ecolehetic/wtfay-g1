<?php
class App_controller{

var $tpl;
var $model;

  function __construct(){
    $this->tpl=array('sync'=>'main.html');
    $model=substr(get_class(),0,strpos(get_class(),'_')+1).'model';
    if(class_exists($model)){
      $this->model=new $model();
    }
  }
  
  function home(){
    
  }
  
  function getUsers($f3){
    $f3->set('users',$this->model->getUsers($f3,array('promo'=>$f3->get('PARAMS.promo'))));
    $this->tpl['async']='partials/users.html';
  }
  
  function getUser($f3){
    $f3->set('user',$this->model->getUser($f3,array('name'=>$f3->get('PARAMS.name'))));
    $this->tpl['async']='partials/user.html';
  }
  
  function searchUsers($f3){
    $f3->set('users',$this->model->searchUsers($f3,array('keywords'=>$f3->get('POST.name'))));
    $this->tpl['async']='partials/users.html';
  }
  
  function afterroute($f3){
    if($f3->get('AJAX')){
      echo View::instance()->render($this->tpl['async']);
    }else{
      echo View::instance()->render($this->tpl['sync']);
    }
  }

  
}
?>