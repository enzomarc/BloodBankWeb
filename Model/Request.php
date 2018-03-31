<?php
    define('ROOT', dirname(__DIR__));

    require ROOT . '/Model/database.php';

    class Request
    {
        private $_idUser;
        private $_idHospital;
        private $_numberOfUnit;
        private $_dateRequest;
        private $_bloodGroup;
        private $_requestStatus = "waiting";

        /**
         * @param $group
         * @param $idUser
         * @param $idhopital
         * @param $unit
         * @param $date
         */
        public function __construct($group,$idUser, $idhopital, $unit, $date) {
            $this->_bloodGroup = $group;
            $this->_idUser = $idUser;
            $this->_idHospital = $idhopital;
            $this->_numberOfUnit = $unit;
            $this->_dateRequest = date('Y-m-d',$date);
        }

        /*
        function IfExist retoune le nombre de fois qu'une info est en bd
        */
        /**
         * @return int
         */
        private function ifExist()
		{
			$query = database::GetDB('bloodbankdb')->prepare("SELECT * FROM requests WHERE id_user = :idUser and ref_hospital = :idHospital");
			$query->execute(array(
				":idUser"=>$this->_idUser,
				":idHospital"=>$this->_idHospital
			));

			return $statement = $query->rowCount();
	
        }
        
        /*

            function makeRequest()  retourne 0 si il 
            existe une occurence identique que celle qu'on veut soumettre, 
            et 1 au cas ou la requette s'est effectuer correctement
        */
       public function makeRequest()
       {
           if (!$this->ifExist()) {
               $query = database::GetDB('bloodbankdb')->prepare("INSERT INTO `requests`(`id_request`, `id_user`, `ref_hospital`, `request_date`, `unit`, `request_status`) VALUES (:id_request, :id_user,:ref_hospital,:request_date,:unit,:request_status)");
               $query->bindParam(":id_request", NULL);
               $query->bindParam(":id_user", $this->_idUser, PDO::PARAM_INT);
               $query->bindParam(":ref_hospital", $this->_idHospital, PDO::PARAM_STR);
               $query->bindParam(":request_date", $this->_dateRequest);
               $query->bindParam(":unit", $this->_numberOfUnit, PDO::PARAM_INT);
               $query->bindParam(":request_status", $this->_requestStatus, PDO::PARAM_STR);
               $query->execute();

               if ($query)
                   return true;

           }
       }


        /**
         * @param $ref_hospital
         * @return array
         */
        public static function getInfoHospital($ref_hospital)
		{
			$query = database::GetDB('bloodbankdb')->prepare("SELECT * FROM hospitals WHERE ref_hospital = :ref_hospital");
            $query->execute(array(":ref_hospital"=>$ref_hospital));
            $result = $query->fetchAll();
            return $result;   
		}

        
        /**
         * @param $group
         * @param $hospital_city
         * @return array
         */
        public static function getHospitals($group,$hospital_city){
            $query = database::GetDB('bloodbankdb')->prepare("SELECT blood_bank.$group,blood_bank.ref_hospital,hospital_city,hospitals.hospital_name FROM blood_bank, hospitals WHERE blood_bank.ref_hospital = hospitals.ref_hospital AND hospital_city LIKE %:hospital_city%");
            $query->execute(array(":hospital_city"=>$hospital_city));
            $result = $query->fetchAll();
            return $result;
        }

    }
