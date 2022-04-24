<?php 
    require_once __DIR__.'/vendor/autoload.php';

    use OTPHP\TOTP;

    $otp = TOTP::create('BXCYJI72M2PSUJ3KZL2VQKDYLXVK6J4Y5RV2MUG7D2N5QIDR4ERBSMDIPNVHKD2A6VT6LGNNR2Z6VFIFKM3UNVPTOFYSBMFD3R22OWI');


    if(!empty($_POST['code'])){
        if($otp->verify(htmlspecialchars($_POST['code']))){
            header('Location: home.php?verify=success');
            die();
        }else{
            header('Location:Connection.php?verify=err');
            die();
        }
    }else{header('Location: Connection.php'); die();}

    ?>