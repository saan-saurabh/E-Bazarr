<?php

include "../db_con.php";

if(isset($_REQUEST['key'])){
    $key="";
    $key = $_REQUEST['key'];
    if($key!=null){
        $query="SELECT DISTINCT product_cat,product_subcat FROM products WHERE product_cat LIKE '%$key%' OR product_subcat LIKE '%$key%'";
        $result=$con->prepare($query);
        $result->execute();
        $key="";
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
        ?>
         <li><a href="templates/views/products_page.php?product_key=<?php echo $row['product_cat']; ?>"><?php echo $row['product_cat']." ".$row['product_subcat'] ?></a></li>
     <?php    
     }
    }

}


?>