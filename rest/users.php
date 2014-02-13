<?php

namespace REST;

class users extends \REST\api{
  
  public function get($f3){
    $f3->error(403);
  }
  
  public function post($f3){
    $dB=new \DB\SQL('mysql:host='.$f3->get('db_host').';port=3306;dbname='.$f3->get('db_server'),$f3->get('db_login'),$f3->get('db_password'));
    $mapper=new \DB\SQL\Mapper($dB,'wifiloc');
    $f3->set('users',$mapper->find(array(),array('order'=>'lastname')));
    $this->tpl='json/users.php';
  }
  
  public function put($f3){
    
  }
  
  public function delete($f3){
  
  }
  
  
  
}
?>