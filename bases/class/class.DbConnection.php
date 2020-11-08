<?php

    Class DBconnect
    {
        public function connection()
        {
            require __DIR__ . '/../vendor/autoload.php';
            $dbInstance = null;
	        $dbInstance = \Simplon\Db\DbInstance::MySQL('iuri0091.hospedagemdesites.ws', 'grupocas_castanhe_app', 'grupocas_app', '@14tw07sevi');
            //$dbInstance = \Simplon\Db\DbInstance::MySQL('localhost', 'shcombr_appmanager', 'root', '');
            return $dbInstance;
        }
    }
