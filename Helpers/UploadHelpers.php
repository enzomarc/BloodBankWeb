<?php

    class UploadHelpers
    {

        /**
         * Upload file to specified path
         * @param $file string File to upload
         * @param $path string Path where the file will be uploaded
         * @return bool
         */
        public static function UploadFile($file, $path)
        {
            if (!empty($file))
                if (move_uploaded_file($file, $path))
                    return true;
            return false;
        }

    }