<?php
class App_controller extends Controller{

  public function __construct(){
    $this->tpl=array('sync'=>'main.html');
  }

  
  public function home(){
    
  }
  
  public function getUsers($f3){
    $f3->set('users',$this->model->getUsers($f3,array('promo'=>$f3->get('PARAMS.promo'))));
    $this->tpl['async']='partials/users.html';
  }
  
  public function getUser($f3){
    $f3->set('user',$this->model->getUser($f3,array('name'=>$f3->get('PARAMS.name'))));
    $this->tpl['async']='partials/user.html';
  }
  
  public function searchUsers($f3){
    $f3->set('users',$this->model->searchUsers($f3,array('keywords'=>$f3->get('POST.name'))));
    $this->tpl['async']='partials/users.html';
  }

}
?>