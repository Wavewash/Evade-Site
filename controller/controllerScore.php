<?php 

//include_once '../model/db.php';
include_once '../model/score.php';

class controllerScore {

	protected $DBscore;
	
	function __construct()
	{
		$this->DBscore = new score();
	}
	
	function getTopScore($id=-1, $where="game = 'evade'", $offset = 0, $limit = 10)
	{
		$rows = $this->DBscore->load($id, $where, $offset, $limit);
		return ($rows);
	}
	
	function load($id=-1, $where = "game = 'evade'", $offset = 0, $limit = 10)
	{
		$rows = $this->DBscore->load($id, $where, $offset, $limit);
		return ($rows);
	}
	
	function addScore($name ,$score, $game = "evade")
	{
		//id, callerID, username, url, date, replyCallID, replyUserID, mapData
		$score1 = array();
		$score1['name'] = $name;
		$score1['score'] = $score;
		$score1['game'] = $game;
		
		$scoreID = $this->DBscore->insert($score1);
		return ($scoreID);
	}
	
	function isHighScore($score, $where = "game = 'evade'")
	{
		$minScore = $this->DBscore->load(-1, $where, 24, 1);
		
		$rank = false;
		if($minScore)
		{
			if($score > $minScore[0]['score'])
			{
				$highScore = $this->DBscore->load(-1, $where );
				for($r = 0; $r <count($highScore); $r++)
				{
					if($score > $highScore[$r]['score'])
					{
						$rank = $r + 1;
						break;
					}
				}
			}
		}
		else
		{
			$rank = 10;
		}
		
		return $rank;
	}
}

//ControllerCalls Test

//$controller = new controllerScore();
//var_dump($controller->addScore("Mo Kakwan", 858));
//var_dump($controller->getTopScore());
//var_dump($controller->getReplyCount(1));
//var_dump($controller->getTopScore());
//var_dump($controller->isHighScore(600));
?>
