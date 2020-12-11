<?php
require_once("../Dbcon.php");

class product{
    function createcategory($category,$link,$conn){
        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`,`prod_name`,`link`,`prod_available`,`prod_launch_date`)VALUES('1','".$category."','".$link."','1',NOW())";
        	if ($conn-> query($sql) === TRUE) {
				// echo ("<script>window.location.href='verification.php?email=".$email."&name=".$name."&mobile=".$mobile."';</script>");

	        	// echo '<script>alert("data entered successfully")</script>';

	        } else {
	            echo "Error: " . $sql . "<br>" . $conn->error;
	            echo "error";
	        }
	        $conn->close();
    }
    function fetchCategory($conn)
    {
        $row['data'] = array();
        $sql = "SELECT * FROM `tbl_product` WHERE `id` = 1 ";
        $result = $conn->query($sql);
        $i = 1;
        while ($data = $result->fetch_assoc()) {
            $row['data'][] = array($i++, $data['prod_parent_id'], $data['prod_name'], $data['link'], $data['prod_available'], $data['prod_launch_date'], "<a class='btn btn-danger text-light'>Delete</a><button type='button' class='btn btn btn-outline-success actioncategory' data-toggle='modal' data-target='#modal-form' data-action='edit' data-id='".$data['id']."'>Edit</button>" );
        }
        echo json_encode($row);
    }
}