<?php

    class Hospital
    {
        
        /**
         * Get all hospitals from the database
         * @return array
         */
        public static function GetHospitals()
        {
            $request = database::GetDB('bloodbankdb')->prepare('SELECT ref_hospital, hospital_name, hospital_city FROM hospitals');
            $request->execute();
            $results = $request->fetchAll();
            
            return $results;
        }

    }