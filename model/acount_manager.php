<?php
require 'dbconnxion/db_connexion.php';
class Acount_manager
{

	protected $db;


	public function __construct($db)
	{
		$this->setDb($db);
	}


   // add acount in data base
   // -----------------------------------------------------------------------
   public function add_acount(Acount $acount)
   {   
          

      	$req=$this->db->prepare('INSERT INTO acount(namecustomer, type, sold) VALUES(:namecustomer, :type, :sold)');

      	$req->bindValue('namecustomer', $acount->namecustomer(), PDO::PARAM_STR );
      	$req->bindValue('type', $acount->type(), PDO::PARAM_STR);
      	$req->bindValue('sold', $acount->sold());
      	$req->execute();
        //return $this->db->lastInsertId();
    

  }  

    // Select all acount in data base
   //------------------------------------------------------------------------
 public function selec_allacount() 
   {
     
 
       $acc=[];
       $req=$this->db->query('SELECT id,  namecustomer, type,  sold  FROM acount') ;
        $allacounts=$req->fetchAll(PDO::FETCH_ASSOC);
          

        foreach ($allacounts as $acount )
         {
               
          
             $acc[]=new Acount($acount);
           
          }
          
          return $acc;
     

    }

   //delete acount  from data base
  //------------------------------------------------------------------------
  public  function delete_acount( $id)
  {
       // var_dump($info);
     $req= $this->db->prepare('DELETE  FROM acount WHERE  id=:id');
     $req->execute([
      'id'=>$id] );
   
  }

  //select a acount from data base
//----------------------------------------------------------------------------------
  public function select_acount($info) 
  {
     if( is_int($info))
     {
        $id=(int)$info;
  
         $req=$this->db->prepare('SELECT * FROM acount WHERE id= :id');
         $req->bindValue('id', $id, PDO::PARAM_INT);
         $req->execute();
         $resul=$req->fetch(PDO::FETCH_ASSOC);
         // var_dump($resul);
         
                return new Acount($resul);
      } 
           
 
  } 
 // payment(versement) in acount 
//----------------------------------------------------------------------------------
  public function payment($id, $amount)
  {
    $req=$this->db->prepare('UPDATE acount SET sold = sold + :amount WHERE id=:id');
    $req->bindValue('id', $id, PDO::PARAM_INT);
    $req->bindValue('amount', $amount);
    $req->execute();
  }

//withdrawal(retrait) from acount
//----------------------------------------------------------------------------------
 public function withdrawal($id, $amount)
  {
    var_dump($amount);
    $req=$this->db->prepare('UPDATE acount SET sold= sold-:amount WHERE id=:id');
    $req->bindValue('id', $id, PDO::PARAM_INT);
    $req->bindValue('amount', $amount);
    $req->execute();
  }

 public function setDb($db)
 {
    $this->db=$db;
 }


}
$db=connex_bdd();
$manager_acount=new Acount_manager($db);