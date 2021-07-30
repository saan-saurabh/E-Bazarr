<?php
include "../../src/db_con.php";

$autocomplet_terms = array();

$term=$_GET['term'];

$term = addslashes($term); 
$term_word_count = sizeof(explode(" ",$term));

$query="SELECT DISTINCT product_name FROM products WHERE product_name LIKE '$term%'";

$result=$con->prepare($query);
$result->execute();
while($row=$result->fetch(PDO::FETCH_ASSOC))
{
$product_name =   $row['product_name']; 

$product_names =  explode(" ",$product_name) ;
$product_names = array_slice($product_names, 0, $term_word_count);
$autocomplet_terms[] = join(" ",$product_names);

}




echo json_encode(array_unique($autocomplet_terms));

?>


