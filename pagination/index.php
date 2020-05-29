<!DOCTYPE html>
<html>

<head>
	<!--Bootstrap Css CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<!--jQuery CDN-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!--Bootstrap Js CDN-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<!--twbs Pagination Js File-->
	<script src="js/jquery.twbsPagination.min.js"></script>

	<!--Main Js File-->
	<script src="js/main.js"></script>

	<style>
		.pagination { margin: 0 auto; }

		.product_img { width: 100%; height: 200px; object-fit: cover; margin-bottom: 20px; }
	</style>
</head>

<body>
	<div class="pagination">
		<div class="container">
			<div class="row products"></div>
			<div class="row pagination_indicators mt-5"></div>
		</div>
	</div>
</body>

<script>
	pagination("/pagination/api/query.php", <?php echo 2 ?>, ".pagination_indicators", ".products");
</script>

</html>