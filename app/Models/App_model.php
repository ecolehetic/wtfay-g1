<?php
class App_model extends Model{
  
  
  function __construct(){
    parent::__construct();
  }
  
  function home(){
    
  }
  
  function getFavorite($params){
    return $this->getMapper('favorite')->find(array('logId=?',$params['logId']),array('order'=>'lastname'));
  }
  
  
  function getUsers($params){
    return $this->getMapper('favorite')->find(array('promo=?',$params['promo']),array('order'=>'lastname'));
  }
  
  function getUser($params){
    return $this->getMapper('wifiloc')->load(array('id=?',$params['id']));
  }
  
  function searchUsers($params){
    $query='(firstname like "%'.$params['keywords'].'%" or lastname like "%'.$params['keywords'].'%")';
    $query.=$params['filter']?' and promo="'.$params['filter'].'"':'';
    return $this->getMapper('favorite')->find($query,array('order'=>'lastname'));
  }
  public function favorite($params){
    $map=$this->getMapper('wififav');
    $favorite=$map->load(array('favId=? and logId=?',$params['favId'],$params['logId']));
    if(!$favorite){
      $map->favId=$params['favId'];
      $map->logId=$params['logId'];
      $map->save();
      return true;
    }else{
      $favorite->erase();
      return false;
    }

   }
   
  public function signin($params){
    return $this->getMapper('wifiloc')->load(array('userId=?',$params['login']));
  }
  
}
?>