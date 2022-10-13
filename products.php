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
$sql ="SELECT * FROM products";
$data = $conn->prepare($sql);
$data->execute();
$products=[];
while($row =$data->fetch(PDO::FETCH_OBJ)){
    $products[]=["ProductID"=>$row->ProductID,
                "ProductName"=>$row->ProductName,
                "ProductName"=>$row->ProductName,
                "CategoryID"=>$row->CategoryID ,
                "QuantityPerUnit"=>$row->QuantityPerUnit ,
                "UnitPrice"=>$row->UnitPrice ,
                "UnitsInStock"=>$row->UnitsInStock ,
                "UnitsOnOrder"=>$row->UnitsOnOrder ,
                "ReorderLevel"=>$row->ReorderLevel ,
                "Discontinued"=>$row->Discontinued ];
}
$abc=json_encode($products);
print_r($abc);
?>