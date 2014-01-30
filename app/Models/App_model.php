<?php
class App_model extends Model{
  
  
  function __construct(){
    parent::__construct();
  }
  
  function home(){
    
  }
  
  function getUsers($f3,$params){
    return $this->getMapper('wifiloc')->find(array('promo=?',$params['promo']),array('order'=>'lastname'));
  }
  
  function getUser($f3,$params){
    return $this->getMapper('wifiloc')->load('userId="'.$params['name'].'"');
  }
  
  function searchUsers($f3,$params){
    return $this->getMapper('wifiloc')->find('firstname like "%'.$params['keywords'].'%" or lastname like "%'.$params['keywords'].'%"');
  }
  
}
?>