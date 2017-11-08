<?php
class Acount
{
	protected $idacount,
	          $numcustomer,
	          $debit,
	          $credit,
	          $type,
	          $sold;

public function __construct(array $info_acount)
  {

  	 $this->hydrater($info_acount);
  	 $this->sold=$this->débit-$this->credit;
   }   

  //Getters
  //------------------------------------------------------------------------
  public function idacounte(){ return $this->idacount;}
  public function numcustomer(){ return $this->numcustomer;}
  public function debit(){ return $this->debit;}
  public function credit(){ return $this->credit;}
  public function sold(){ return $this->sold;}
  public function type(){ return $this->type;}
  
  //Setters
  //-------------------------------------------------------------------------
 public function setIdacounte($idacount)
 {
 	$idacount=(int)$idacount;
    if($idacount>0) 
    {
    	$this->idacount=$idacount;
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
  public function setCredit($credit)
  {
  	if(is_flaot($credit))
  	{
  		$this->credit=$credit;
  	}
  	else {trigger_error('valeur de crédit  invalide', E_USER_WARNING);
     	  return;
        }
   
  } 
  public function setDebit($debit)
  {
  	if(is_flaot($debit))
  	{
  		$this->debit=$debit;
  	}
  	else {trigger_error('valeur de debit  invalide', E_USER_WARNING);
     	  return;
        }
   
  }


}