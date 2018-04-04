<?php

    class database
    {

        private static $db;

        /**
         * Return the current instance of the database if exist or create new one
         * @param string $dbname Database name to create instance of
         * @param string $dbuser Username of the server
         * @param string $dbpassword Password associated to the username connecting to the server
         * @param string $server Server address
         * @return PDO
         */
        public static function GetDB($dbname = 'bloodbankdb', $dbuser = 'root', $dbpassword = '', $server = 'localhost')
        {
            if (!isset(self::$db))
                $db = new PDO('mysql:host=' . $server . '; dbname=' . $dbname . '; charset=utf8', $dbuser, $dbpassword);
            return $db;
        }
    }