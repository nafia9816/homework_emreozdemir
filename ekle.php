<?php

$UserName=$_POST['UserName'];
$SurName=$_POST['SurName'];
$Email=$_POST['Email'];
$Password=md5($_POST['Password']);
$RePassword=md5($_POST['RePassword']);

$sunucu="127.0.0.1:3307";
$user="root";
$sifre="root";
$veritabani="users";

$baglanti=new mysqli($sunucu,$user,$sifre,$veritabani);

if($baglanti->connect_error){
    die("Hata: ".$baglanti->connect_error);
}

$sql="INSERT INTO register(Ad,Soyad,Email,Sifre) values ('$UserName','$SurName','$Email','$Password')";


if($baglanti->query($sql)===TRUE){
    echo "Kaydını oluşturuldu. Tekrar giriş yapınız.";

    header ("Location:login.php");

}
else{
    echo "kayıt başarısız:".$baglanti->connect_error;
}
$baglanti->close();







?>