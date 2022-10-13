<?php
$servername ="localhost";
$username = "root";
$password = "";
$database = "northwind";
try{
    $conn = new PDO ("mysql:host =$servername;dbname=$database",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO :: ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed : ".$e->getMessage();
}
$sql ="SELECT * FROM categories";
$data = $conn->prepare($sql);
$data->execute();
$category=[];
while($row =$data->fetch(PDO::FETCH_OBJ)){
    $category[]=["CategoryID"=>$row->CategoryID,"CategoryName"=>$row->CategoryName,"Description"=>$row->Description];
}
$abc=json_encode($category);
print_r($abc);
?>