<?php

    class view
    {

        private static $content = null;

        /**
         * Render content of a view based on a file
         * @param string $file Path to the view to render
         */
        public static function load($file)
        {
            try
            {
                if (file_exists($file))
                    self::$content = $file;
                else
                    self::$content = 'Errors/404.php';
            }
            catch (Exception $ex)
            {
                self::$content = 'Errors/404.php';
            }

            require self::$content;
        }

    }