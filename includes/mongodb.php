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

  public function getLogin($user){
    $perfil = [];
    try{

      $result = $this->collectionPerfil->findOne($user);
      foreach ($result as $chave => $valor) {
        $perfil[$chave] = $valor;
      }
    }catch(Exception $e){ 
      var_dump($e);exit;
    }
    return $perfil;
  }

  public function getPerfil($id){
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

  public function insertPerfil($perfil)
  {
    try{
        $this->collectionPerfil->insertOne($perfil);
    }catch(Exception $e){
      var_dump($e);exit;
      return false;
    }
    return $id;
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

  public function getPosts()
  {
    $result = $this->collectionPosts->find();
    $posts = [];
    try{
      foreach ($result as $chave => $valor) {
        $posts[$chave] = $valor;
      }
    }catch(Exception $e){
      return false;
    }
    return $posts;
  }

  public function getPost($id){
    $post = [];
    try{
      $result = $this->collectionPosts->findOne(array('_id' => $id));
      foreach ($result as $chave => $valor) {
        $post[$chave] = $valor;
      }
    }catch(Exception $e){
      return false;
    }
    return $post;
  }

  public function insertPost($post)
  {
    $id = self::getNextId("postid");
    $post['perfil']['_id'] = new MongoDB\BSON\ObjectID($post['perfil']['id']);
    $post['_id'] = $id;
    try{
        $this->collectionPosts->insertOne($post);
    }catch(Exception $e){
      var_dump($e);exit;
    }
    return $id;
  }

  private function comentariosId($comentarios){
    $arr = [];
    foreach ( $comentarios as $c ) {
      $c['perfil']['_id'] = new MongoDB\BSON\ObjectID($c['perfil']['_id']['$oid'] );
      if(count($c['comentarios']) > 0){
        $this->comentariosId($c['comentarios']);
      }
      $arr[] = $c;
    }
    return $arr;
  }

  public function updateComments($id,$comments){
    $resCom = self::comentariosId($comments['comentarios']);    
    // var_dump($resCom);
    try{
      // var_dump($resCom);
      $this->collectionPosts->updateOne(
        array('_id' => $id),
        array('$set' => ['comentarios' => $resCom])
        );
    }catch(Exception $e){
        var_dump($e);exit;
        return false;
    }
  }

  public function updatePost($id,$post)
  {
    try{
      // $post['perfil']['_id'] = new MongoDB\BSON\ObjectID($post['perfil']['id']);
      $this->collectionPosts->updateOne(
        array('_id' => $id),
        array('$set' => $post)
        );
    }catch(Exception $e){
        var_dump($e);exit;
        return false;
    }
    return true;
  }

  public function removePost($id)
  {
    try{
        $this->collectionPosts->deleteOne(array('_id' => $id));
    }catch(Exception $e){
      var_dump($e);exit;
      return false;
    }
    return true;
  }

  private function getNextId($name) {
    $retval = $this->db->command(array(
      "findandmodify" => "counters",
      "query" => array("_id"=> $name),
      "update" => array('$inc'=> array("seq"=> 1))
      )
    );
    $counters = $this->db->counters;
    $id = $counters->findOne(array('_id' => $name));
    return $id["seq"];
  }
}
?>
