<?php

Class DBconnect
{
	public function connection()
	{
        require __DIR__ . '/../vendor/autoload.php';
        //$dbInstance = \Simplon\Db\DbInstance::MySQL('iuri0091.hospedagemdesites.ws', 'shcombr_appmanager', 'shcombr_app', '}.MC3T@MBG74');
        $dbInstance = \Simplon\Db\DbInstance::MySQL('localhost', 'appmanager', 'root', '');
        return $dbInstance;
    }
}
