<?php
/**
 * User: Baurel Kounchou
 * Date: 3/31/2018
 * Time: 5:56 AM
 */
define('ROOT', dirname(__DIR__));
require '../../Model/Donation.php';
require '../../Helpers/CryptoHelper.php';
require '../auth.php';

if(Auth::Connected()){
    $hospitals = Donation::getAllHospitals();

    foreach ($hospitals as $key => $hospital) {
        $hospitals[$key]['ref_hospital'] = htmlspecialchars($hospital['ref_hospital']);
        $hospitals[$key]['hospital_city'] = htmlspecialchars($hospital['hospital_city']);
        $hospitals[$key]['hospital_name'] = htmlspecialchars($hospital['hospital_name']);
    }


    $donationmakes = Donation::getDonationMake(Auth::GetPhone());

    foreach($donationmakes as $key => $donationmake){
        $donationmakes[$key]['id_donation'] = htmlspecialchars($donationmake['id_donation']);
        $donationmakes[$key]['id_user'] = htmlspecialchars($donationmake['id_user']);
        $donationmakes[$key]['ref_hospital'] = htmlspecialchars($donationmake['ref_hospital']);
        $donationmakes[$key]['donation_date'] = htmlspecialchars($donationmake['donation_date']);
        $donationmakes[$key]['expiration_date'] = htmlspecialchars($donationmake['expiration_date']);
        $donationmakes[$key]['unit'] = htmlspecialchars($donationmake['unit']);
        $donationmakes[$key]['donation_status'] = htmlspecialchars($donationmake['donation_status']);
    }

    if (isset($_POST['idUser']) && isset($_POST['hospital']) && isset($_POST['numberOfUnit'])) {
        $time = time();
        $timeExp = $time + 201000;
        $info = Donation::getInfoHospital($_POST['hospital']);
        $donation = new Donation(Auth::GetPhone(),$_POST['hospital'],$_POST['numberOfUnit'],$time,$timeExp);
        if($donation->makeDoantion())
            $msg = "Bien vous avez jusqu'au ".date('d-m-Y',$time)." anvant ".date('d-m-Y h:i:s a',$timeExp)."  pour vous rendre a l'hopital ".$info['hospital_name']." Situé à  ".$info['hospital_country'];

        $msg = " l'hopital ".$info['hospital_name']." Situé à  ".$info['hospital_city']." Vous attend pour le don de sang ";
        
    }


    if (isset($_POST['confirmDelete']) and isset($_POST['id_donation']) and $_POST['confirmDelete']=="yes") {
        if (Donation::deleteDonation($_POST['id_donation'],Auth::GetPhone())) {
            echo "Vous Avez bien Supprimer";
        }
    }


    if (isset($_POST['statement']) && $_POST['statement']=="update") {
        if (Donation::updateDonation()) {
        
        }
    }




    include_once('../../View/Donation/donation.php');



}