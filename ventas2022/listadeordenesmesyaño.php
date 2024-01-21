<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Formulario Listar Ordenes</title>
 <link rel="stylesheet" href="">
</head>
<style>
     body{
         background: black;
     }
     div{
        width:400px;
	padding:16px;
	border-radius:10px;
	margin:auto;
	margin-top: 40px;
    margin-bottom: 40px;
	background-color:#E9967A;
     }
  table tbody tr:nth-child(odd) {
	background: #fff;
  text-align: center;
}
table tbody tr:nth-child(even) {
	background: #E3E2E3;
  
  text-align: center;
}
table thead {
  background: #444;
  color: rgb(129, 82, 241);
  font-size: 18px;
}
table {
  border-collapse: collapse;
  width: 100%;
  }
input{
    background:black;
    color: white;
}
 </style>
<center>
<body>

<div>
    
<h3>SELECCIONAR PRODUCTOS POR MES Y FECHA</h3>
<form method="POST" action="#" >

<label form="categoria">Seleccionar el Mes: </label>
<select type="text" name="mes">
<option value=""></option>
<option value="01">Enero</option>
<option value="02">Febrero</option>
<option value="03">Marzo</option>
<option value="04">Abril</option>
<option value="05">Mayo</option>
<option value="06">Junio</option>
<option value="07">Julio</option>
<option value="08">Agosto</option>

</select>

<label form="categoria">Seleccionar El Año: </label>
<select type="text" name="anno">
<option value=""></option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>

</select>

<input type="submit"  value="Consultar"  >

</form>
</div>
 <?php
    require_once('conexion.php');
    if(isset($_POST['categoria']))


    // recuperar el valor ingresado my sql

    $categoria = $_POST['categoria'];
      $mes= $_POST['mes'];
    $anno= $_POST['anno'];

// Realizar una consulta MySQL

$query = "SELECT `orders`.`OrderID`,`products`.`ProductName`, `orders`.`OrderDate`, 
COUNT(`orders`.`OrderID`) AS TOTAL_ORDEN FROM `orders`
 LEFT JOIN `orderdetails` ON `orderdetails`.`OrderID` = `orders`.`OrderID`
  LEFT JOIN `products` ON `orderdetails`.`ProductID` = `products`.`ProductID` 
  WHERE MONTH(`OrderDate`)='$mes' AND YEAR (`OrderDate`)='$anno' GROUP BY `OrderID` ORDER BY `orders`.`OrderDate` ASC";
    



// Mostrar los datos en una tabla
echo '<table border="2" cellspacing="2" cellpadding="2"> 
      <tr> 
    
        <th>ORDEN ID</th>
        <th> NOMBRE DEL PRODUCTO</th>    
        <th>FECHA</th> 
        <th>TOTAL DE LAS ORDENES</th>   
        
       
       
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
      
      $field1 = $row["OrderID"];
      $field2 = $row["ProductName"];
      $field3 = $row["OrderDate"];
      $field4 = $row["TOTAL_ORDEN"];
      
      
         
  
        echo '<tr> 
                  <td>'.$field1.'</td> 
                  <td>'.$field2.'</td> 
                  <td>'.$field3.'</td>  
                  <td>'.$field4.'</td> 
                
                
               
                 
              </tr>';
    }
    $result->free();
} 
?>
</center>
</body>
</html>