<?php
class App_controller extends Controller{

  public function __construct(){
    $this->tpl=array('sync'=>'main.html');
  }

  
  public function home(){
    
  }
  
  public function getUsers($f3){
    $f3->set('users',$this->model->getUsers(array('promo'=>$f3->get('PARAMS.promo'))));
    $this->tpl['async']='partials/users.html';
  }
  
  public function getUser($f3){
    $f3->set('user',$this->model->getUser(array('name'=>$f3->get('PARAMS.name'))));
    $this->tpl['async']='partials/user.html';
  }
  
  public function searchUsers($f3){
    $f3->set('users',$this->model->searchUsers(array('keywords'=>$f3->get('POST.name'),'filter'=>$f3->get('POST.filter'))));
    $this->tpl['async']='partials/users.html';
  }

}
?>