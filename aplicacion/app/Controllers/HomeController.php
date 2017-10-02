<?php

namespace App\Controllers;

use Slim\Views\PhpRenderer as View;

class HomeController
{
    protected $view;
    protected $data;
    
    public function __construct(View $view) {
       $this->view = $view;
       $this->data = json_decode(file_get_contents(__DIR__."/../../employees.json"),true);
    }
    
    public function index($request,$response)
    {
        return $this->view->render($response,"home.phtml", ["empleados" => $this->data]);
    }
    
    public function buscar($request,$response)
    {
       $email  = $request->getParam('email');
        
        $empleados = array_filter($this->data, function($emp) use ($email){
           return  $emp["email"] ==  $email ;
        });

        $this->view->render($response,"buscar.phtml", ["empleados" => $empleados]); 
    }
    
    public function detalle($request,$response,$arg)
    {
        $id  = $arg['id'];
        $empleados = array_filter($this->data, function($emp) use ($id){
           return  $emp["id"] ==  $id ;
        });
        
        return $this->view->render($response,"detalle.phtml",["empleados" => $empleados]);
    }
    
    public function servicio($request,$response,$arg)
    {
       $minimo  = $arg['minimo'];
       $maximo  = $arg['maximo']; 
       $empleados = array_filter($this->data, function($emp) use ($minimo,$maximo){
           $value = floatval(preg_replace('/[^\d\.]+/', '', $emp["salary"]));
           return  $minimo <= $value && $value <= $maximo  ;
       });

       return $response->write($this->array_to_xml($empleados, new \SimpleXMLElement('<root/>'))->asXML())->withHeader('Content-Type', 'text/xml');
    }
    
    private function array_to_xml(array $array,&$xml)
    {
         foreach ($array as $key => $value) {
            if(is_array($value)){
                if(is_int($key)){
                    $key = "e";
                }
                $label = $xml->addChild($key);
                $this->array_to_xml($value, $label);
            }
            else {
                $xml->addChild($key, $value);
            }
        }
        
        return $xml;
    }
}