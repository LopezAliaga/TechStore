<?php
class DB extends DBmysql {
   public $dbhost = 'localhost';
   public $dbuser = 'usuario_glpi';
   public $dbpassword = '123456';
   public $dbdefault = 'glpi_db';
   public $use_utf8mb4 = true;
   public $allow_myisam = false;
   public $allow_datetime = false;
   public $allow_signed_keys = false;
}
