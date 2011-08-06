<?php
include_once '../model/db.php';

class score extends db {
/*
 CREATE TABLE `score` (
`id` BIGINT NOT NULL ,
`name` VARCHAR( 50 ) NOT NULL ,
`score` DOUBLE NOT NULL ,
`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`game` VARCHAR( 10 ) NOT NULL
) ENGINE = innodb;
*/

  function insert($score) {
    //we're not using time because we set the database to take in the current timestamp
	$t = $_SERVER["REQUEST_TIME"];
	
    try {
      if(!self::$dbh) $this->connect();
	  //id 	name 		score 	date 		game
      $stmt = self::$dbh->prepare("INSERT INTO score 
                                    (id, name, score, date, game)
                                   VALUES 
                                    (NULL, :name, :score, NULL, :game)");
      $params = array(':name'  =>$score['name'],
                      ':score'=>$score['score'],
                      ':game'=>$score['game']);
      $ret = $stmt->execute($params);
    } catch (PDOException $e) {
      $this->fatal_error($e->getMessage());
    }
    return self::$dbh->lastInsertId();
  }

  function load($id=-1, $where= "", $offset=0, $limit=15) 
  {

	$limit = "LIMIT " . $offset . " , " . $limit;
    if($id!=-1) $where = "id=".(int)$id;
    try 
	{
      if(!self::$dbh) $this->connect();
      $result = self::$dbh->query("SELECT * FROM score where 
                             $where ORDER BY `score`.`score` DESC $limit");
      $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) 
	{
      $this->fatal_error($e->getMessage());
    }
	
    return $rows;
  }
}

?>
