<?php

class dbHandler {

  private $db;
  private $collectionPefil;
  private $collectionPosts;

  function __construct() {
    $c= new MongoDB\Client("mongodb://localhost:27017");
    $this->db = $c->redesocial;
    $this->collectionPerfil = $c->redesocial->perfil;
    $this->collectionPosts = $c->redesocial->posts;
  }

  public function getIdPerfil($id){
    // $id = '5b1604de3472e73b8baf1c7e';
    $perfil = [];
    try{
      $result = $this->collectionPerfil->findOne(array('_id' => new MongoDB\BSON\ObjectID($id)));
      foreach ($result as $chave => $valor) {
        $perfil[$chave] = $valor;
      }
    }catch(Exception $e){
      
    }
    return $perfil;
  }

  public function getAllPerfis()
  {
    $result = $this->collectionPerfil->find();
    $perfis = [];
    foreach ($result as $chave => $valor) {
      $perfis[$chave] = $valor;
    }
    return $perfis;
  }

  public function getAllPosts()
  {
    $result = $this->collectionPosts->find();
    $posts = [];
    foreach ($result as $chave => $valor) {
      $posts[$chave] = $valor;
    }
    return $posts;
  }
}
?>
