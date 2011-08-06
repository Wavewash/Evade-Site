<?php
class db {
	protected static $dbh = false;
	protected static $dsn = 'mysql:dbname=gamescore;host=127.0.0.1';
	protected static $user = 'user';
	protected static $password = 'password';

	function connect() 
	{
		try {
			//echo "Hi:" . self::$dsn . " " .  self::$user . " " . self::$password;
		    self::$dbh = new PDO(self::$dsn, self::$user, self::$password);
		} catch (PDOException $e) {
		    echo 'Connection failed: ' . $e->getMessage();
		}
	    self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	protected function fatal_error($msg) 
	{
	    echo "<pre>Error!: $msg\n";
	    $bt = debug_backtrace();
	    foreach($bt as $line) {
	      $args = var_export($line['args'], true);
	      echo "{$line['function']}($args) at {$line['file']}:{$line['line']}\n";
	    }
	    echo "</pre>";
	    die();
	}
}
?>
