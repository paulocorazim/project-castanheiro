<?php

class DBconnect
{
	public function connection()
	{
		require __DIR__ . '../../vendor/autoload.php';
		//$dbInstance = \Simplon\Db\DbInstance::MySQL('cavalolusitanocastanheiro.com.br', 'cavalolu_AppManager', 'cavalolu_app', '_ET#yV)P0-5O');
		$dbInstance = \Simplon\Db\DbInstance::MySQL('localhost', 'AppManager', 'root', 'sh');
		return $dbInstance;

	}
}
