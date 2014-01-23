<?php



class App_model{
  
  
  function __construct(){

  }
  
  function getUsers($f3,$params){
    $users=new DB\SQL\Mapper($f3->get('dB'),'wifiloc');
    return $users->find('firstname like "'.$params['alpha'].'%"');
  }
  
  function getUser(){
    
  }
  
}
?>