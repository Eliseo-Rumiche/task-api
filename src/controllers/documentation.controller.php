<?php
class DocumentationController
{
    public static function index()
    {
      $openapi =  \OpenApi\Generator::scan([ROOT_DIR.'/src/controllers/']);
      $data = $openapi->toJson();
      flight::render(ROOT_DIR.'/src/views/documentation.view.php',array('data'=> $data));
   }
   
   public static function getSchema(){

      $openapi =  \OpenApi\Generator::scan([ROOT_DIR.'/src/controllers/']);
      echo $openapi->toJson();
   } 

} 
