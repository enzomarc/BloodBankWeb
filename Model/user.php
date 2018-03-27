<?php

    define('ROOT', dirname(__DIR__));

    require ROOT . '/Model/database.php';

    class user
    {

        private $username;
        private $phone;
        private $password;
        private $bloodgroup;
        private $birthdate;
        private $gender;
        private $city;

        public function __construct($username, $phone, $password, $bloodgroup)
        {
            $this->username = $username;
            $this->phone = $phone;
            $this->password = $password;
            $this->bloodgroup = $bloodgroup;
        }

        /* Getters & Setters */

        public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($value)
        {
            $this->username = $value;
        }

        public function getValue($prop)
        {
            if (isset($this->$prop))
                return $this->$prop;
            return null;
        }

        public function setValue($prop, $value)
        {
            if (isset($this->$prop))
                $this->$prop = $value;
            return null;
        }

        /* CRUD Operations */

        /**
         * Insert the current user into the database
         * @return bool
         */
        public function CreateUser()
        {
            if (!$this->Exist())
            {
                $request = database::GetDB('bloodbankdb')->prepare('INSERT INTO users (name, phone, password, bloodgroup) VALUES (:name, :phone, :pwd, :bg)');
                $request->bindParam(':name', $this->username);
                $request->bindParam(':phone', $this->phone);
                $request->bindParam(':pwd', $this->password);
                $request->bindParam(':bg', $this->bloodgroup);

                if ($request->execute())
                    return true;
            }
            return false;
        }

        /* Helpers */

        /**
         * Determine if the current user exists
         * @return bool
         */
        private function Exist()
        {
            $request = database::GetDB('bloodbankdb')->prepare('SELECT * FROM users WHERE phone = :phone');
            $request->bindParam(':phone', $this->phone);
            $request->execute();
            $count = $request->fetchColumn();
            return $count > 0;
        }

        /**
         * Determine if user with credentials given in arguments exists
         * @param string $phone Phone number of the user to check
         * @param string $password Password of the user to check
         * @return bool
         */
        public static function IsValid($phone, $password)
        {
            $request = database::GetDB('bloodbankdb')->prepare('SELECT * FROM users WHERE phone = :phone AND password = :pwd');
            $request->bindParam(':phone', $phone);
            $request->bindParam(':pwd', $password);
            $request->execute();
            $count = $request->fetchColumn();
            return $count > 0;
        }

    }