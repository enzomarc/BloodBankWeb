<?php

    require_once ROOT . 'Model/database.php';
    require_once ROOT . 'Model/User/user.php';

    /**
     * Provides set of function to manage donations via the database
     */
    Class Donation
    {
        
        private $user;
        private $hospital;
        private $date;
        private $expiration_date;
        private $unit;
        private $status;

        /**
         * New instance of donation class
         * @param string $user Phone number of the user who makes donation
         * @param string $hospital Hospital where the donation is made
         * @param $date Day where the donation is made
         * @param int $unit Number of blood unit to donate
         * @return Donation
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

        public function GetExpiration()
        {
            return $this->expiration_date;
        }

        public function SetExpiration($value)
        {
            $this->expiration_date = $value;
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
         * Return an array containing all the donations maded by a specified user
         * @param string $user Phone number of the user to gives donation of
         * @return array
         */
        public static function GetDonations($user)
        {
            $id = User::GetID($user);
            $request = database::GetDB('bloodbankdb')->prepare('SELECT hospitals.hospital_name, donations.id_donation, donations.donation_date, donations.expiration_date, donations.unit, donations.donation_status FROM donations, hospitals WHERE id_user = :id AND hospitals.ref_hospital = donations.ref_hospital');
            $request->bindParam(':id', $id);
            $request->execute();
            $results = $request->fetchAll();
            
            return $results;
        }

        /**
         * Add the current donation object to the database
         * @return string
         */
        public function MakeDonation()
        {
            $id = User::GetID($this->user);
            $request = database::GetDB('bloodbankdb')->prepare('INSERT INTO donations (id_user, ref_hospital, donation_date, expiration_date, unit, donation_status) VALUES (:user, :hosp, :date, :exp, :unit, :status)');
            $request->bindParam(':user', $id);
            $request->bindParam(':hosp', $this->hospital);
            $request->bindParam(':date', $this->date);
            $request->bindParam(':exp', $this->expiration_date);
            $request->bindParam(':unit', $this->unit);
            $request->bindParam(':status', $this->status);

            return $request->execute();
        }

        /**
         * Delete donation with given id
         * @param string $id ID of the donation to delete
         * @return bool
         */
        public static function DeleteDonation($id)
        {
            $request = database::GetDB('bloodbankdb')->prepare('DELETE FROM donations WHERE id_donation = :id');
            $request->bindParam(':id', $id);

            return $request->execute();
        }

        /**
         * Determine whether user with given id has waiting donation
         * @param string $id ID of user to check
         * @return bool
         */
        public static function Waiting($id)
        {
            $request = database::GetDB('bloodbankdb')->prepare('SELECT * FROM donations WHERE id_user = :id AND donation_status != "completed"');
            $request->bindParam(':id', $id);
            $request->execute();
            $results = $request->fetchAll();

            return count($results) > 0;
        }

        /**
         * Determine whether donation with given id exist
         * @param string $id ID of the donation to check
         * @return bool
         */
        public static function Exist($id)
        {
            $request = database::GetDB('bloodbankdb')->prepare('SELECT * FROM donations WHERE id_donation = :id AND donation_status != "completed"');
            $request->bindParam(':id', $id);
            $request->execute();
            $results = $request->fetchAll();

            return count($results) > 0;
        }

    }