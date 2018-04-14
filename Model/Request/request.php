<?php

    require_once ROOT . 'Model/database.php';
    require_once ROOT . 'Model/User/user.php';

    /**
     * Provides set of function to manage requests via the database
     */
    Class Request
    {
        
        private $user;
        private $hospital;
        private $date;
        private $completed_date;
        private $unit;
        private $status;

        /**
         * New instance of request class
         * @param string $user Phone number of the user who makes request
         * @param string $hospital Hospital where the request is made
         * @param $date Day when the request is made
         * @param int $unit Number of blood unit to donate
         * @return Request
         */
        public function __construct($user, $hospital, $date, $unit)
        {
            $this->user = $user;
            $this->hospital = $hospital;
            $this->date = $date;
            $this->unit = $unit;
        }

        /* Getters & Setters */

        /**
         * @return string Phone number of the user
         */
        public function GetUser()
        {
            return $this->user;
        }

        /**
         * @param string $value Phone number of the user
         */
        public function SetUser($value)
        {
            $this->user = $value;
        }

        public function GetHospital()
        {
            return $this->hospital;
        }

        public function SetHospital($value)
        {
            $this->hospital = $value;
        }

        public function GetDate()
        {
            return $this->date;
        }

        public function SetDate($value)
        {
            $this->date = $value;
        }

        public function GetCompleted()
        {
            return $this->completed_date;
        }

        public function SetCompleted($value)
        {
            $this->completed_date = $value;
        }

        public function GetUnits()
        {
            return $this->unit;
        }

        public function SetUnits($value)
        {
            $this->unit = $value;
        }

        public function GetStatus()
        {
            return $this->status;
        }

        public function SetStatus($value)
        {
            $this->status = $value;
        }

        /* CRUD Operations */

        /**
         * Return an array containing all the requests maded by a specified user
         * @param string $user Phone number of the user to gives requests of
         * @return array
         */
        public static function GetRequests($user)
        {
            $id = User::GetID($user);
            $request = database::GetDB('bloodbankdb')->prepare('SELECT hospitals.hospital_name, requests.id_request, requests.request_date, requests.received_date, requests.unit, requests.request_status FROM requests, hospitals WHERE id_user = :id AND hospitals.ref_hospital = requests.ref_hospital');
            $request->bindParam(':id', $id);
            $request->execute();
            $results = $request->fetchAll();
            
            return $results;
        }

        /**
         * Add the current request object to the database
         * @return string
         */
        public function MakeRequest()
        {
            $id = User::GetID($this->user);
            $request = database::GetDB('bloodbankdb')->prepare('INSERT INTO requests (id_user, ref_hospital, request_date, unit, request_status) VALUES (:user, :hosp, :date, :unit, :status)');
            $request->bindParam(':user', $id);
            $request->bindParam(':hosp', $this->hospital);
            $request->bindParam(':date', $this->date);
            $request->bindParam(':unit', $this->unit);
            $request->bindParam(':status', $this->status);

            return $request->execute();
        }

        /**
         * Delete request with given id
         * @param string $id ID of the request to delete
         * @return bool
         */
        public static function DeleteRequest($id)
        {
            $request = database::GetDB('bloodbankdb')->prepare('DELETE FROM requests WHERE id_request = :id');
            $request->bindParam(':id', $id);

            return $request->execute();
        }

        /**
         * Determine whether user with given id has waiting request
         * @param string $id ID of user to check
         * @return bool
         */
        public static function Waiting($id)
        {
            $request = database::GetDB('bloodbankdb')->prepare('SELECT * FROM requests WHERE id_user = :id AND request_status != "completed"');
            $request->bindParam(':id', $id);
            $request->execute();
            $results = $request->fetchAll();

            return count($results) > 0;
        }

        /**
         * Determine whether request with given id exist
         * @param string $id ID of the request to check
         * @return bool
         */
        public static function Exist($id)
        {
            $request = database::GetDB('bloodbankdb')->prepare('SELECT * FROM requests WHERE id_request = :id');
            $request->bindParam(':id', $id);
            $request->execute();
            $results = $request->fetchAll();

            return count($results) > 0;
        }

    }