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
     
     $infoAcount=["namecustomer"=>htmlspecialchars($_POST['namecustomer']),
                  "sold"=>htmlspecialchars($_POST['sold']),
                  "type"=>htmlspecialchars($_POST['type'])
                

     ];

     
     


   $acount=new Acount($infoAcount);
   $manager_Acount->add_Acount($acount);
    header('Location:');

}
//recive all informations for acount from data base
//------------------------------------------------------------------------------

	$allcount=$manager_Acount->selec_Allacount();


//// delette acount from data base 
// -----------------------------------------------------------------------------


   if( isset($_POST['id'] ) and isset($_POST['delete']))
	 { 
	 	
      $id=(int)htmlspecialchars($_POST['id']) ;
      
       $manager_Acount->delete_Acount($id) ; 
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
   
       $acount=$manager_Acount->select_Acount($id);
       
     	$acount->add_Money($amount);
   
 	 $manager_Acount->update_Acount($acount);
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
     $acount=$manager_Acount->select_Acount($id);
     $acount->remove_Money($amount);
   
 	 $manager_Acount->update_Acount($acount);
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
     
      $acount2=$manager_Acount->select_Acount($iddist);
      $acount1=$manager_Acount->select_Acount($id);

     $acount1->remove_Money($amount);
   	 $manager_Acount->update_Acount($acount1);
   	 $acount2->add_Money($amount);
   	 $manager_Acount->update_Acount($acount2);

   

 header('Location:');
}



include "../views/indexVue.php";
 ?>
