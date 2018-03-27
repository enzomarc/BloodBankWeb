<?php

    class view
    {

        private $content = null;

        public static function load($file)
        {
            try
            {
                $path = '../View' . strtolower($file);
                if (file_exists($path))
                    self::$content = $path;
                else
                    self::$content = '../View/Errors/404.php';
            }
            catch (Exception $ex)
            {
                self::$content = '../View/Errors/404.php';
            }

            include(self::$content);
        }

    }