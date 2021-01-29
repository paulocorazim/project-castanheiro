<?php

    Class DBconnect
    {
        public function connection(): \Simplon\Db\Library\Mysql
        {
            require __DIR__ . '/../vendor/autoload.php';
            $dbInstance = null;
	        $dbInstance = \Simplon\Db\DbInstance::MySQL('iuri0091.hospedagemdesites.ws', 'grupocas_castanhe_app', 'grupocas_app', '@14TW07sevi');
            return $dbInstance;
        }
    }
