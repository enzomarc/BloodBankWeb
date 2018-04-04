<?php

    require_once ROOT . 'Model/database.php';

    class User
    {

        private $username;
        private $phone;
        private $password;
        private $bloodgroup;
        private $birthdate;
        private $gender;
        private $city;
        private $avatar;

        public function __construct($username, $phone, $password, $bloodgroup)
        {
            $this->username = $username;
            $this->phone = $phone;
            $this->password = $password;
            $this->bloodgroup = $bloodgroup;
        }

        /* Getters & Setters */

        public function GetUsername()
        {
            return $this->username;
        }

        public function SetUsername($value)
        {
            $this->username = $value;
        }

        public function GetPhone()
        {
            return $this->phone;
        }

        public function SetPhone($value)
        {
            $this->phone = $value;
        }

        public function GetPassword()
        {
            return $this->password;
        }

        public function SetPassword($value)
        {
            $this->password = $value;
        }

        public function GetBloodGroup()
        {
            return $this->bloodgroup;
        }

        public function SetBloodGroup($value)
        {
            $this->bloodgroup = $value;
        }

        public function GetBirthdate()
        {
            return $this->birthdate;
        }

        public function SetBirthdate($value)
        {
            $this->birthdate = $value;
        }

        public function GetGender()
        {
            return $this->gender;
        }

        public function SetGender($value)
        {
            $this->gender = $value;
        }

        public function GetCity()
        {
            return $this->city;
        }

        public function SetCity($value)
        {
            $this->city = $value;
        }

        public function GetAvatar()
        {
            return $this->avatar;
        }

        public function SetAvatar($value)
        {
            $this->avatar = $value;
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

        /**
         * Update fields of user available in the database
         * @param $password bool Determine whether the function will update the password or not
         * @param $newPhone string New phone to give to the current user
         * @return bool
         */
        public function UpdateUser($setPassword, $newPhone)
        {
            if ($this->Exist())
            {
                $request = database::GetDB('bloodbankdb')->prepare($setPassword ? 'UPDATE users SET name = :name, phone = :nphone, password = :password, bloodgroup =:bloodgroup, birthdate = :birthdate, gender = :gender, city = :city, profile_img = :img WHERE phone = :phone' : 'UPDATE users SET name = :name, phone = :nphone, bloodgroup = :bloodgroup, birthdate = :birthdate, gender = :gender, city = :city, profile_img = :img WHERE phone = :phone');
                $request->bindParam(':name', $this->username);
                $request->bindParam(':phone', $this->phone);
                $request->bindParam(':nphone', $newPhone);
                $request->bindParam(':bloodgroup', $this->bloodgroup);
                $request->bindParam(':birthdate', $this->birthdate);
                $request->bindParam(':gender', $this->gender);
                $request->bindParam(':city', $this->city);
                $request->bindParam(':img', $this->avatar);
                if ($setPassword) $request->bindParam(':password', Hash::Encrypt($this->password));

                if ($request->execute())
                    return true;
            }

            return false;
        }

        /**
         * Create new user with informations based on the phone number
         * @param string $phone Phone number of the user to get
         * @return User
         */
        public static function GetByPhone($phone)
        {
            $request = database::GetDB('bloodbankdb')->prepare('SELECT * FROM users WHERE phone = :phone');
            $request->bindParam(':phone', $phone);
            $request->execute();
            $results = $request->fetchAll();

            if (count($results) > 0)
            {
                foreach ($results as $result)
                {
                    $tempUser = new User($result['name'], $result['phone'], $result['password'], $result['bloodgroup']);
                    $tempUser->birthdate = $result['birthdate'];
                    $tempUser->gender = $result['gender'];
                    $tempUser->city = $result['city'];
                    $tempUser->avatar = $result['profile_img'];
                }
                return $tempUser;
            }

            return null;
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
            $results = $request->fetchAll();
            return count($results) > 0;
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
            $results = $request->fetchAll();
            return count($results) > 0;
        }

    }