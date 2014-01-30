<?php
class App_model extends Model{
  
  
  function __construct(){
    parent::__construct();
  }
  
  function home(){
    
  }
  
  function getUsers($params){
    return $this->getMapper('wifiloc')->find(array('promo=?',$params['promo']),array('order'=>'lastname'));
  }
  
  function getUser($params){
    return $this->getMapper('wifiloc')->load(array('userId=?',$params['name']));
  }
  
  function searchUsers($params){
    $query='(firstname like "%'.$params['keywords'].'%" or lastname like "%'.$params['keywords'].'%")';
    $query.=$params['filter']?' and promo="'.$params['filter'].'"':'';
    return $this->getMapper('wifiloc')->find($query);
  }
  
}
?>