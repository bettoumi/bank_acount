<?php
function connex_bdd()
         { try

        {

            $bdd = new PDO('mysql:host=localhost; dbname=bank_acounts; charset=utf8', 'root', '');

        }

        catch(Exception $e)

        {

                die('Erreur : '.$e->getMessage());

        }
        return  $bdd;
  }