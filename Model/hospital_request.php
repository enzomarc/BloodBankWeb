<?php

    class HospitalRequest
    {

        private static $requests;

        /**
         * Returns an array which contains all hospital requests
         * @param bool $update Determine if the function returns the current array or if the function will update the array from database
         * @return array
         */
        public static function GetHospitalRequests($update = false)
        {
            if ($update)
            {
                $request = database::GetDB('bloodbankdb')->prepare('SELECT id, hospitals.hospital_name, hospital_request.bloodgroup, hospital_request.unit, hospital_request.date, hospital_request.status FROM hospitals, hospital_request WHERE hospital_request.ref_hospital = hospitals.ref_hospital');
                $request->execute();
                $results = $request->fetchAll();
            }

            return $results;
        }

    }