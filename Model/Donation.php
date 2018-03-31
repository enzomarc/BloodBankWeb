<?php
/**
 * User: Baurel Kounchou
 * Date: 3/31/2018
 * Time: 5:54 AM
 */
define('ROOT', dirname(__DIR__));

require ROOT . '/Model/database.php';

class Donation
{
    private $_donationDate;
    private $_expirationDate;
    private $_numberOfUnit;
    private $_idUser;
    private $_idHospital;
    private $_status="pending";

    /**
     * @param $idUser
     * @param $idHospital
     * @param $numberOfUnit
     * @param $dateOfMakingDonation
     * @param $expirationDate
     */
    function __construct($idUser,$idHospital,$numberOfUnit,$dateOfMakingDonation,$expirationDate)
    {
        $this->_donationDate = $dateOfMakingDonation;
        $this->_numberOfUnit = $numberOfUnit;
        $this->_idUser = $idUser;
        $this->_idHospital = $idHospital;
        $this->_expirationDate = $expirationDate;
    }

    /**
     * @return int
     */
    private function ifExist()
    {
        $query = database::GetDB('bloodbankdb')->prepare("SELECT * FROM donations WHERE id_user = :idUser and ref_hospital = :idHospital");
        $query->execute(array(
            ":idUser"=>$this->_idUser,
            ":idHospital"=>$this->_idHospital
        ));

        return $statement = $query->rowCount();

    }

    /**
     * @return bool
     */
    public function makeDoantion()
    {
        if(!$this->ifExist()){
            $query = database::GetDB('bloodbankdb')->prepare("INSERT INTO donations (id_donation,id_user,ref_hospital,donation_date, expiration_date,unit,donation_status) VALUES(:id_donation,:id_user,:ref_hospital,:donation_date, :expiration_date,:unit,:donation_status)");
            $query->bindParam(":id_donation",NULL);
            $query->bindParam(":id_user",$this->_idUser,PDO::PARAM_INT);
            $query->bindParam(":ref_hospital",$this->_idHospital,PDO::PARAM_STR);
            $query->bindParam(":donation_date",$this->_donationDate,PDO::PARAM_STR);
            $query->bindParam(":expiration_date",$this->_expirationDate,PDO::PARAM_STR);
            $query->bindParam(":unit",$this->_numberOfUnit,PDO::PARAM_INT);
            $query->bindParam(":donation_status",$this->_status);
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
        $query = database::GetDB('bloodbankdb')->prepare("SELECT * FROM hospitals WHERE ref_hospital=:idHospital");
        $query->execute(array(':idHospital'=>$ref_hospital));
        return $result = $query->fetchAll();
    }

    public static function getAllHospitals()
    {
        $query = database::GetDB('bloodbankdb')->prepare("SELECT * FROM hospitals");
        $query->execute();
        return $result = $query->fetchAll();
    }

    public static function readDonationUser($phoneUser){
        $query = database::GetDB('bloodbankdb')->prepare("SELECT * FROM donations WHERE phone = :phone");
        $query->execute([":phone"=>$phoneUser]);
        return $result = $query->fetchAll();
    }
}