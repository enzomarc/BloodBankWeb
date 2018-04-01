<?php

    class StringHelpers
    {

        /**
         * Return a formatted form of the bloodgroup given in arguments
         * @param string $bloodgroup Bloodgroup to format
         * @return string
         */
        public static function FormatBloodGroup($bloodgroup)
        {
            $bloodgroup = strtolower($bloodgroup);

            switch ($bloodgroup)
            {
                case 'ap':
                    return 'A+';
                    break;
                case 'am':
                    return 'A-';
                    break;
                case 'bp':
                    return 'B+';
                    break;
                case 'bm':
                    return 'B-';
                    break;
                case 'abp':
                    return 'AB-';
                    break;
                case 'abm':
                    return 'AB-';
                    break;
                case 'op':
                    return 'O+';
                    break;
                case 'om':
                    return 'O-';
                    break;
                case 'a+':
                    return 'ap';
                    break;
                case 'a-':
                    return 'am';
                    break;
                case 'b+':
                    return 'bp';
                    break;
                case 'b-':
                    return 'bm';
                    break;
                case 'ab+':
                    return 'abp';
                    break;
                case 'ab-':
                    return 'abm';
                    break;
                case 'o+':
                    return 'op';
                    break;
                case 'o-':
                    return 'om';
                    break;
            }

            return null;
        }

    }