<?php
include_once("db.php");

if(isset($_POST["transaction"]) && $_POST["transaction"] == "pagination")
{
	$page = ($_POST["page_number"] - 1) * 2;

	$sql = $pdo->prepare("SELECT *, (SELECT category_name FROM categories WHERE id = p.product_category) as category_name FROM products as p ORDER BY p.id DESC LIMIT :page_no, 2");
	$sql->bindParam(':page_no', $page, PDO::PARAM_INT);
	$sql->execute();

	if( $sql->rowCount() > 0 )
	{
		$template = "";

		foreach ($sql as $s){
			$template .= "
			<div class='col-sm-3'>
			  	<div class='card'>
			    	<div class='card-body'>
			    		<img src='uploads/" . $s["product_cover"] . "' class='product_img'>
			        	
			        	<h5 class='card-title'>" . $s["product_name"] . "</h5>
			        	<p class='card-text'>
			        		<span class='text-muted float-left'>" . $s["category_name"] . "</span> - 
							<span>" . number_format($s["product_price"], 2, "," , ",") . "₺</span>
			        	</p>
			        	<a href='' class='btn btn-primary'>Detay</a>
			     	</div>
			    </div>
			</div>
			";
		}

		echo json_encode( array("status" => "success", "products" => $template) );
	}
	else
	{
		echo json_encode( array("status" => "error", "message" => "Hiç Ürün Bulunamadı!") ); 
	}
}
else
{
	echo json_encode( array("status" => "error", "message" => "Tanımsız İşlem!") );
}
?>