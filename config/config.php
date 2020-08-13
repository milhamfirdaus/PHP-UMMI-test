<?php
class Config{
   public function database(){
      $host        = "host=127.0.0.1";                         
      $port        = "port=5432";                        
      $dbname      = "dbname=db_colleger";                         
      $credentials = "user=postgres password=admin";
     
      $db = pg_connect( "$host $port $dbname $credentials") or die ("Error : Unable to connect database\n");
      return $db;
   }
}
?>