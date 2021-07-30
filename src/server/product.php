<?php
 $cat_subcat = array(
        "man"=>array("t-shirt","shirt"),
        "women"=>array("top","t-shirt"),
        "kids"=>array("t-shirt","Party kurta","Ethinic wear","choli and dupatta"),
        "electronics"=>array("headphone","iron","smartwatch","Bluetooth Headset","Mobile","Refrigerator")
    );

?>
<script>
var cat_subcat = <?php echo json_encode($cat_subcat); ?>;
function create_subcat(){

   //if product_subcat elemt already exists then delete it 
  if (document.contains(document.getElementById("product_subcat"))) {
            document.getElementById("product_subcat").remove();
     }

   // create select element for subcat and append it   
   var element = document.getElementById("product_cat")
   var cat = element.value
   var select = document.createElement("select")
   select.setAttribute("id","product_subcat")
   select.setAttribute("name","product_subcat")
   select.setAttribute("class","form-control")
  
   var subcat = cat_subcat[cat] 

   subcat.forEach(function(value){
       var option = document.createElement("option")
       option.value =  option.innerText= value
       select.appendChild(option)
   })

     document.getElementById("product_subcat_div").appendChild(select)
}

window.onload = create_subcat
</script>
<?php

class Product{
    public $product_cat;
    public $product_subcat;
    public $product_name;
    public $product_details;
    public $product_color;
    public $product_size;
    public $product_price;
    public $product_discount;
    public $seller_id;
    public $product_image_names;
    public $error_code = array();
    public $product_image = array();
    public $timestamp;
    public $error_msg = array("Product name is empty | ",
                             "Add product price | ",
                             "Choose atleast 1 Product Image | ",
                             "You can not add more than 5 Image | ");
    

    function __construct(){
       
       $this->timestamp = time();
                 
        $this->product_cat      = $_POST["product_cat"];
        $this->product_subcat   = $_POST["product_subcat"];

        //following values can be empty so no empty check
        $this->product_details  = $_POST["product_details"] ;
        $this->product_color    = $_POST["product_color"];
        $this->product_discount = (int)$_POST["product_discount"];

        if(isset($_POST["product_size"])){
            $this->product_size = implode(",", $_POST["product_size"]);
        }else{
            $this->product_size = "";
        }

        if(($this->product_name = $_POST["product_name"])=="")
        $this->error_code[] = 0;
        if(($this->product_price = (int)$_POST["product_price"])==0)
        $this->error_code[] = 1;

        $n = sizeof($_FILES["product_image"]["name"]);
        while(--$n >=0){
        if($_FILES["product_image"]["size"][$n] !=0 && $_FILES["product_image"]["error"][$n]==0){
            $this->product_image[] = array(
                "name"     =>$_FILES["product_image"]["name"][$n],
                "tmp_name" =>$_FILES["product_image"]["tmp_name"][$n]
            );
        }
     
        }
        

        if(sizeof($this->product_image) <1)
        $this->error_code[] = 2;

        if(sizeof($this->product_image) >5)
        $this->error_code[] = 3;

        $this->set_image_names();
      
    }
    
    public function set_seller_id($id){
        $this->seller_id = $id;
    }

    public function add_to_database(){
        global $con;
        if(sizeof($this->error_code) == 0){

        $query = "INSERT INTO products(
            product_cat,
            product_subcat,
            product_name,
            product_details,
            product_images,
            product_color,
            product_size,
            product_price,
            product_discount,
            seller_id
        )VALUES(
            '$this->product_cat',
            '$this->product_subcat',
            '$this->product_name',
            '$this->product_details',
            '$this->product_image_names',
            '$this->product_color',
            '$this->product_size',
             $this->product_price,
             $this->product_discount,
             $this->seller_id
        )";

        if($con->query($query) === TRUE){
            echo '<script>alert("One record inserted successfully")</script>';
        }else{
           // echo '<script>alert("Error: ".$con->error. " ")</script>';
        }
         
         $this->save_product_images();
        }
    }

    public function save_product_images(){
        $i = 1;
        $ds =  DIRECTORY_SEPARATOR;
        $base =  realpath(dirname(__FILE__));
        foreach($this->product_image as $img){
        $ext = pathinfo($img["name"], PATHINFO_EXTENSION);
        $from = $img["tmp_name"];
        $to = "..".$ds."..".$ds."public".$ds."images".$ds."products".$ds.(string)$this->timestamp."_img".(string)$i.".".$ext;
        move_uploaded_file($from, $to);
        $i++;
        }
    }

    public function set_image_names(){
        $img_names = "";
        $i = 1;
        foreach($this->product_image as $img){
        $ext = pathinfo($img["name"], PATHINFO_EXTENSION);
        $img_names .= $this->timestamp."_img".(string)$i.".".$ext.",";
        $i++;
        }
        $img_names = substr($img_names, 0, -1);
        $this->product_image_names=  $img_names;
    }
    
    public function display_error_msg(){
        $err_msg = "";
        foreach($this->error_code as $err_code){
          $err_msg .= $this->error_msg[$err_code];
        }
        
        return $err_msg;
    }

 

}

function display_product_form(){
   global $cat_subcat,$product;
    echo  '<div id="product_form_div" class="col">
           <div id="err_msg">
                <h3 class="text-danger">';
              echo isset($product)?$product->display_error_msg(): "";
              echo '</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group" id="product_cat_div">
                <label class="text-primary" for="product_cat"> *Choose Product Category: </label>
                <select class="form-control" id="product_cat" name="product_cat"   onchange="create_subcat()" >';
                    foreach($cat_subcat as $key=>$value){
                   echo '<option value='.$key.'>'.$key.'</option>';
                    }
              echo  '</select>
                    </div>
                    <div class="form-group" id="product_subcat_div">
                   <label class="text-primary" for="product_subcat"> *Choose Product Sub-category: </label>
                    </div>
                    <div class="form-group" id="product_name_div">
                    <label class="text-primary" for="product_name">*Product Name :</label>
                    <input type="text" class="form-control" value = "" name="product_name" id="product_name">
                    </div>
                    <div class="form-group" id="product_details_div">
                    <label class="text-primary" for="product_details">Product Details: </label>
                    <textarea class="form-control" value = "" name="product_details" id="product_details" rows="4" cols="50"></textarea>
                    </div>
                    <div class="form-group" id="product_color_div">
                    <label class="text-primary" for="product_color">Product color:</label>
                    <input type="text" class="form-control" value = "" name="product_color" id="product_color">
                    </div>
                    <div class="form-group" id="product_size_div">
                    <label class="text-primary" for="product_size">Product Size: </label>
                    <input class="form-check-inline" type="checkbox" name="product_size[]" value="S" >S
                    <input class="form-check-inline" type="checkbox" name="product_size[]" value="M" >M
                    <input class="form-check-inline" type="checkbox" name="product_size[]" value="L" >L
                    <input class="form-check-inline" type="checkbox" name="product_size[]" value="XL" >XL
                    <input class="form-check-inline" type="checkbox" name="product_size[]" value="XXL" >XXL
                    </div>
                    <div class="form-group" id="product_image_div">
                    <label class="text-primary" for="product_image">*Select Images(min1 ,max 5)</label>
                    <input type="file" class="form-control-file" name="product_image[]" accept="image/*" id="product_image" multiple>
                    </div>
                    <div class="form-group" id="product_price_div">
                    <label class="text-primary" for="product_price">*Product Price:</label>
                    <input type="number" class="form-control" value="0" name="product_price" id="product_price">
                    </div>
                    <div class="form-group" id="product_discount_div">
                    <label class="text-primary" for="product_discount">Product Discount</label>
                    <input type="number" class="form-control" value="0" name="product_discount" id="product_discount">
                    </div>
                    <div id="submit_button_div">
                    <input type="submit" value="SUBMIT" class="btn btn-primary" name="submit">
                    </div>


            </form>
        </div>';    

    
        
}




?>

