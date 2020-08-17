<?php

    Class DBconnect
    {
        public function connection()
        {
            require __DIR__ . '/../vendor/autoload.php';
            $dbInstance = null;
	        //$dbInstance = \Simplon\Db\DbInstance::MySQL('localhost', 'castanhe_app', 'castanhe_app', '@14tw07sevi');
            $dbInstance = \Simplon\Db\DbInstance::MySQL('localhost', 'shcombr_appmanager', 'root', '');
            return $dbInstance;
        }
    }
