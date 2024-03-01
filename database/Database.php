<?php
include_once "config/ConfigDb.php";

use \Illuminate\Database\Capsule\Manager as Capsule;

class Database{

    public function __construct(){
        $capsule = new Capsule();
        $capsule->addConnection([
            "driver" => ConfigDb::DBDRIVER,
            "host" => ConfigDb::DBHOST,
            "database" => ConfigDb::DBNAME,
            "username" => ConfigDb::DBUSER,
            "password" => ConfigDb::DBPASS,
            "charset" => "utf8",
            "collation" => "utf8_unicode_ci",
            "prefix" => ""
        ]);
        $capsule->bootEloquent();
    }
}
