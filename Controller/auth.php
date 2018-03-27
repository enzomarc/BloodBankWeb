<?php

    /**
     * User authentification and Session Manager
     */
    class Auth
    {
        
        /**
         * Determine if the user is connected or not
         * @return bool
         */
        public static function Connected()
        {
            return isset($_SESSION['connected']);
        }

        /**
         * Connect user by creating a new session
         * @param string $username Username of the user to connect
         * @param string $phone Phone number of the user to connect
         */
        public static function Create($username, $phone)
        {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['phone'] = $phone;
            $_SESSION['connected'] = true;
        }

        /**
         * Disconnect user and close session
         */
        public static function Close()
        {
            if (self::Connected())
            {
                session_unset();
                session_destroy();
            }
        }

        /**
         * Get the phone of the connected user
         */
        public static function GetPhone()
        {
            if (self::Connected())
                return $_SESSION['phone'];
            return null;
        }

    }