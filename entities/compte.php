<?php
class compte
{
	protected $id_compte,
	          $numclient,
	          $debit,
	          $credit,
	          $type,
	          $sold;

public function __construct(array $info_compte)
  {

  	 $this->hydrater($info_compte);
   }   

  //Getters
  //------------------------------------------------------------------------
  public function id_compte(){ return $this->id_compte;}
  public function numclient(){ return $this->numclient;}
  public function debit(){ return $this->debit;}
  public function credit(){ return $this->credit;}
  public function sold(){ return $this->sold;}
  public function type(){ return $this->type;}
  
  //Setters
  //-------------------------------------------------------------------------
 public function setId_compte($id_compte)
 {
 	$id_compte=(int)$id_compte;
    if($id_compte>0) 
    {
    	$this->id_compte=$id_compte;
    }  
    else {
          trigger_error('id invalide ', E_USER_WARNING);
          return;
     }
  }
  public function setNumclient($numclient)
 {
 	$numclient=(int)$numclient;
    if($numclient>0) 
    {
    	$this->numclient=$numclient;
    }  
    else {
          trigger_error('numéro invalide ', E_USER_WARNING);
          return;
     }
  }
  public function setType($type)
  {
  	if(is_string($type))
  	{
  		$this->type=$type;
  	}
  	else {trigger_error('type invalide', E_USER_WARNING);
     	  return;
        }
  }


}