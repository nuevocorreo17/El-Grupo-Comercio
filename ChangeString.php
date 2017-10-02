<?php

class ChangeString
{
   public function build ($variable)
   {
       $arreglomin = array( "a","b", "c","d", "e", "f", "g", "h", "i", "j", "k","l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

       $aux = str_split($variable);
       
       $cadena = "";
       foreach($aux as $letra)
       {
           if(in_array(strtolower($letra), $arreglomin))
           {
                $indice = array_search(strtolower($letra), $arreglomin);
                if($indice === count($arreglomin) - 1)
                {
                   $indice = -1; 
                }
                
                if(ctype_upper($letra))
                {
                   $cadena = $cadena. strtoupper($arreglomin[$indice + 1]); 
                }else{
                   
                   $cadena = $cadena. $arreglomin[$indice + 1]; 
                }
           
           }else{
                $cadena = $cadena.$letra;
           }
       }
       
       return $cadena;
   }
}

$e = new ChangeString();
echo $e->build('**Casa 52Z');

?>