<?php

class DBconnect
{
	public function connection()
	{
		require __DIR__ . '../../vendor/autoload.php';
		$dbInstance = \Simplon\Db\DbInstance::MySQL('localhost', 'AppManager', 'root', 'sh');
		return $dbInstance;
	}
}
