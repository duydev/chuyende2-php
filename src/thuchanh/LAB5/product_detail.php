<?php 
require_once realpath( './entities/product.class.php' );
require_once realpath( './entities/category.class.php' );

require_once 'header.php';

$not_found = false;

if( ! isset( $_GET['prodID'] ) ) {
	$not_found = true;
} else {
	$products = Product::get_product( $_GET['prodID'] );
	if( $products ) {
		$product = reset( $products );
	} else {
		$not_found = true;
	}
}

if( $not_found ) {
	header("Location: not_found.php");
}

$categories = Category::list_category();
?>
<div class="row text-center">
	<div class="col-md-3">
		<h3>Danh Mục</h3>
		<ul class="list-group">
			<?php 
			if( $categories && is_array( $categories ) ) {
				foreach ( $categories as $category) {
					?>
					<li class="list-group-item"><a href="list_product.php?catID=<?php echo $category['catID']; ?>"><?php echo $category['catName']; ?></a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>
	<div class="col-md-9">
		<h3>Sản Phẩm</h3>
		<div class="products-wrapper">
			<?php
			if( ! empty( $product ) && is_array( $product ) ) {

				
			}
			?>
		</div>
	</div>
</div>
<?php	

require_once 'footer.php' ?>