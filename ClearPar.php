<?php

class ClearPar
{
   public function build ($cadena)
   {
      $arreglo = explode("()", trim($cadena));
      $nuevacadena = '';
      foreach($arreglo as $par)
      {
          if(empty($par))
          {
             $nuevacadena = $nuevacadena."()"; 
          }
      }
      
      return $nuevacadena;
   }
}

$e = new ClearPar();
print_r($e->build('()())()'));

?>
