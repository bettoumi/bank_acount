<?php
 include_once '../model/acount_manager.php';
function loadclass($class)
{
   require '../entities/'.$class.'.php';
}
spl_autoload_register('loadclass');

// ADD acount  in data base 
// -----------------------------------------------------------------------------
 
 
if(isset($_POST['addacount']) AND  isset($_POST['namecustomer']) AND !empty($_POST['namecustomer'] ) AND isset($_POST['sold']) AND !empty($_POST['sold'] ) AND
  isset($_POST['type']) AND !empty($_POST['type'] ) )
{
   $acount=new Acount($_POST);
   $manager_acount->add_acount($acount);
   header('Location:');

}
//recive all informations for acount from data base
//------------------------------------------------------------------------------

$allcount=$manager_acount->selec_allacount();

//// delette acount from data base 
// -----------------------------------------------------------------------------


   if( isset($_POST['id'] ) and isset($_POST['delete']))
	 { 
	 	
      $id=(int)$_POST['id'] ;
      
       $manager_acount->delete_acount($id) ; 
         header('Location:');

   } 

//// payment money in a acount  
// -----------------------------------------------------------------------------

if( isset($_POST['pay'] ) and isset($_POST['amount']) and !empty($_POST['amount'] )
    and isset($_POST['id']) and !empty($_POST['id'])

	)
{
	   
	  $amount= (float)htmlspecialchars($_POST['amount']);
      $id=(int)htmlspecialchars($_POST['id']);
      var_dump($_POST);
       $acount=$manager_acount->select_acount($id);
       var_dump($acount);
     	$acount->add_money($amount);
   
 	 $manager_acount->update_acount($acount);
      // $manager_acount->payment($id, $amount);
       header('Location:');

}
//// withdrawal of money from  a acount  
// -----------------------------------------------------------------------------
if( isset($_POST['withdrawal'] ) and isset($_POST['amount']) and !empty($_POST['amount'] )
    and isset($_POST['id']) and !empty($_POST['id'])

	)
{
	

   $amount=(float)htmlspecialchars($_POST['amount']);
   $id=(int)htmlspecialchars($_POST['id']);
     var_dump($_POST);
     $acount=$manager_acount->select_acount($id);
     $acount->remove_money($amount);
   
 	 $manager_acount->update_acount($acount);
    header('Location:');

}

//// select acounts of transfert operation from  data base  
// -----------------------------------------------------------------------------

if( isset($_POST['transfert'] ) and
    isset($_POST['amount']) and !empty($_POST['amount'] )
    and isset($_POST['id']) and !empty($_POST['id'])
    and isset($_POST['iddist']) and !empty($_POST['iddist'])

	)
{
   $amount=(float)htmlspecialchars($_POST['amount']);
   $id=(int)htmlspecialchars($_POST['id']);
    $acount1= ($id);
   $iddist=(int)htmlspecialchars($_POST['iddist']);
     
      $acount2=$manager_acount->select_acount($iddist);
      $acount1=$manager_acount->select_acount($id);

     $acount1->remove_money($amount);
   	 $manager_acount->update_acount($acount1);
   	 $acount2->add_money($amount);
   	 $manager_acount->update_acount($acount2);

   // $manager_acount->money_transfer($id, $iddist, $amount);

 var_dump($_POST);
 header('Location:');
}



include "../views/indexVue.php";
 ?>
