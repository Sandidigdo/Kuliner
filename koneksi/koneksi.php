<?php 


$conn = mysqli_connect("localhost","root","","db_kuliner");

if(!$conn){
    mysqli_error("database tidak terkoneksi");


}else{
    echo "sukses";
}


?>