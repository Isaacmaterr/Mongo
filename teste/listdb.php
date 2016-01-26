<?php

$mongo = new MongoClient();
$mongodb = $mongo->selectDB('biblioteca')->selectCollection('livros');

$id = new MongoId("568b1d3166d5ea842b000029");
$query = ['_id'=>$id];
$save = $mongodb->update($query,['$set'=>['nome'=>'A menina que roubava livros4']],[]);

/*$insert = [
    'nome'=>'ceu Azul',
    'preco'=>200.00,
    'autor'=>'luiz (nandinho)',
    'status'=> 1,
    'tags'=> ['futurista','inovador'],
    'serie'=>'',
    'editora'=>'',
    
];

 * 
 $teste =  new LivrosDao();
$array = $teste->modelo();
$teste->saveDocument($array);
$cursor  = $teste->findAll();
foreach ($cursor as $curso){
    echo'<pre>';
    var_dump($curso);
    echo'</pre>';
    
}
 *  */

//$save = $mongodb->save($insert);
    echo'<pre>';
    var_dump($save);
    echo'</pre>';


    $mongodb->find();
  $cursor = $mongodb->limit(1);


while ($cursor->hasNext()) {
    $id = new MongoId($cursor->next()['_id']);
    echo'<pre>';
    var_dump($id->{'$id'});
    echo'</pre>';
}
/*
modelos de codigos
 * 
 * var_dump($dao->findOne(['nome'=>['$regex' => new \MongoRegex('/mongo/i')]]));
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * $livro = new Livros();
 
 $livro->setNome('Mongo+Php');
 $livro->setPreco(100.00);
 $livro->setOutor('Isaac Matheus');
 $livro->setSerie('');
 $livro->setEditora('568c5bd85466bf8b8c06cd41');
 $livro->setTags(['codigo','programadores']);
 $livro->setStatus(1);
 $dao = new LivrosDao();
 var_dump($dao->saveDocument($livro->modelo()));
 * 
 * 
 * 
 * $editora = new Editoras();
 
 $editora->setNome('Leitura');
 $editora->setLogradouro('nao sei o que e isso');
 $editora->setBairro('S.B');
 $editora->setCidade('Braasilia');
 $editora->setEstado('DF');
 $editora->setTelefone(['99999999','999123322']);
 
 
 $dao = new EditorasDao();
 var_dump($dao->saveDocument($editora->modelo()));
 
 * 
 *  $series = new Series();
 
 $series->setNome('ScolfNet');
 $series->setAutorSerie('Be man');
 $series->setTags(['Programaçao','leitura']);
 $series->setDataLancamento(new \MongoDate());
 
 
 
 
 $dao = new SeriesDao();
 
 var_dump($dao->saveDocument($series->modelo()));
 * 
 * 
 * 
 * 
 *  */
?>

