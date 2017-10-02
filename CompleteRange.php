<?php

class CompleteRange
{
   public function build ($lista)
   {
      if(is_array($lista))
      {
        arsort($lista);
        $inicio = $lista[0];
        $final = $lista[count($lista)-1];
        $nuevoarray = array();
        
        for($i = $inicio; $i <= $final; $i++)
        {
            $nuevoarray[] = $i ;
        }
        return $nuevoarray;
      }else{
        return array();  
      }
   }
}

$e = new CompleteRange();
print_r($e->build(array(55, 58, 60)));

?>