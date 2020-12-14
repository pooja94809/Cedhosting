<?php
session_start();
class Product
{
    public $prodname,$prodlink;
    function newcategory($prodname,$prodlink,$conn)
    {
        $sql = "INSERT into tbl_product (`prod_parent_id`,`prod_name`,`html`,`prod_available`,`prod_launch_date`) 
        VALUES(1,'$prodname','$prodlink',1,CURRENT_TIMESTAMP())";
        if($conn->query($sql) === true)
        {
            $last_id = $conn->insert_id;
            $_SESSION['last_id']=$last_id;
            // echo $_SESSION['last_id'];
            // echo "New record created successfully. Last inserted ID is: ". $last_id;
            // echo "<script>alert('New Category Added Successfully')</script>";
        }
    }

    function cat_display($conn){
        $data=array();
        $sql="SELECT * from tbl_product WHERE `prod_parent_id`='1'";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row= $result->fetch_assoc()) {
                array_push($data,$row) ;
            }
            return $data;
        }
    }
    
    function cat_delete($get,$conn){
        $sql="DELETE from `tbl_product` where id=$get";
        if($conn->query($sql) === true){
            echo "<script>alert('Record Deleted Successfully')</script>";
        }
        header("Location:category.php");
    }
    
    function cat_edit($updatedname,$prodhtml,$avail,$id,$conn){
        $sql="UPDATE `tbl_product` SET `prod_name`='$updatedname',`html`='$prodhtml',`prod_available`='$avail' WHERE `id`='$id'";
        // echo $sql;
        if($conn->query($sql) === true){
            echo "<script>alert('Record Updated Successfully')</script>";
            header("Location:category.php");
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    function description($mprice,$aprice,$sku,$des,$conn){
        $sql = "INSERT INTO `tbl_product_description` (`prod_id`,`description`,`mon_price`,`annual_price`,`phone_approved`,`active`,`is_admin`,`sign_up_date`,`password`,`security_question`,`security_answer`) VALUES('".$email."','".$name."','".$mobile."','0','0','0','0',NOW(),'".$password."','".$question."','".$answer."')";

        if($conn->query($sql) === true)
        {
            echo "<script>alert('Description Added Successfully')</script>";
        }
    }
    



}


?>