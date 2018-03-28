<?php

    Class Hash
    {

        /**
         * Return an encrypted string based on the string given in the parameters
         * @param string $str String to encrypt
         * @param string $algo Encryption algorithm to use
         * @return string
         */
        public static function Encrypt($str, $algo = 'md5')
        {
            return hash($algo, $str);
        }

    }