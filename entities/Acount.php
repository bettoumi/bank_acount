<?php
class Acount
{
	protected $id,
	          $namecustomer,
	           $type,
	          $sold;

public function __construct(array $info_acount)
  {

  	 $this->hydrater($info_acount);
  	 
   }   

  //Getters
  //------------------------------------------------------------------------
  public function id(){ return $this->id;}
  public function namecustomer(){ return $this->namecustomer;}
 
  public function sold(){ return $this->sold;}
  public function type(){ return $this->type;}
  
  //Setters
  //-------------------------------------------------------------------------
 public function setId($id)
 {
 	$id=(int)$id;
    if($id>0) 
    {
    	$this->id=$id;
    }  
    else {
          trigger_error('id invalide ', E_USER_WARNING);
          return;
     }
  }
  public function setNamecustomer($namecustomer)
 {
 	
    if(is_string($namecustomer)) 
    {
    	$this->namecustomer=$namecustomer;
    }  
    else {
          trigger_error('nom invalide ', E_USER_WARNING);
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
  public function setSold($sold)
  {
  	if(is_numeric($sold))
  	{
  		$this->sold=$sold;
  	}
  	else {trigger_error('sold invalid', E_USER_WARNING);
     	  return;
        }
  }

  //hydater------------------------------------------------------------
//--------------------------------------------------------------------
public function hydrater(array $info_acount)
{
  foreach ($info_acount as $acount=> $value)
   {
    $setters='set'.ucfirst($acount);
    if(method_exists($this, $setters))
    {
      $this->$setters($value);
    }

  }}
  
}


?>