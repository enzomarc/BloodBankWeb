<?php
    require '../../Model/Request.php';
    require '../../Helpers/CryptoHelper.php';
    require '../auth.php';

    if(Auth::Connected()){
        if(isset($_POST['bloodGroup']) and isset($_POST['hospital'])){
            $result = Request::getHospitals($_POST['bloodGroup'],$_POST['hospital']);
            foreach ($result as $key => $value) {
                $result[$key][$_POST['bloodGroup']] = htmlspecialchars($value[$_POST['bloodGroup']]);
                $result[$key]['ref_hospital'] = htmlspecialchars($value['ref_hospital']);
                $result[$key]['hospital_city'] = htmlspecialchars($value['hospital_city']);
                $result[$key]['hospital_name'] = htmlspecialchars($value['hospital_name']);
            }
        }

        if (isset($_POST['group']) && isset($_POST['hospital']) && isset($_POST['numberOfUnit'])) {
            $time = time();
            $request = new Request($_POST['group'],Auth::GetPhone(),$_POST['hospital'],$_POST['numberOfUnit'],$time);
            $info = Request::getInfoHospital($_POST['hospital']);
            if($request->makeRequest()){
                $msg = "Bien vous avez jusqu'au ".date('d-m-Y',$time)." anvant ".date('h:i:s a',$time)."  pour vous rendre a l'hopital ".htmlspecialchars($info['hospital_name'])." Situé à  ".htmlspecialchars($info['hospital_country']);
            }else{
                $msg = " Vous avez deja fait une demande et vous etes attendu a ".htmlspecialchars($info['hospital_name'])." Situé à  ".htmlspecialchars($info['hospital_city'])." Pour vos/Votre Poche(s) de sang ";
            }
        }
        include_once('../../View/Request/Request.php');



















    }

