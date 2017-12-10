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

$related_products = Product::get_related_product( $product['catID'], $product['productID'] );
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
		<h3>Chi Tiết Sản Phẩm</h3>
		<div class="row">
			<div class="col-md-6">
				<img src="<?php echo $product['picture']; ?>" alt="" class="img-responsive">
			</div>
			<div class="col-md-6">
				<h3 class="title"><?php echo $product['productName']; ?></h3>
				<div class="price"><?php echo number_format( floatval( $product['price'] ) ); ?> VNĐ</div>
				<div class="desc"><?php echo nl2br( $product['description'] ); ?></div>
				<div class="btn-buy">
					<button class="btn btn-primary">Mua Hàng</button>
				</div>
			</div>
		</div>
		<h3>Sản phẩm liên quan</h3>
		<div class="row">
			<?php
			if( ! empty( $related_products ) && is_array( $related_products ) ) {

				foreach ( $related_products as $related_product ) {
					?>
					<div class="item col-md-3 col-xs-12">
						<div class="thumb">
							<a href="product_detail.php?prodID=<?php echo $related_product['productID']; ?>">
								<img src="<?php echo $related_product['picture']; ?>" alt="" class="img-responsive">
							</a>	
						</div>
						<div class="info-wrapper">
							<div class="title">
								<a href="product_detail.php?prodID=<?php echo $related_product['productID']; ?>">
									<?php echo $related_product['productName']; ?>
								</a>
							</div>
							<div class="desc">
								<?php echo nl2br( $related_product['description'] ); ?>
							</div>
							<div class="price">
								<?php echo number_format( floatval( $related_product['price'] ) ); ?> VNĐ
							</div>
							<div class="quantity">
								<?php echo  $related_product['quantity']; ?>
							</div>
						</div>
						<div class="btn-buy text-center">
							<a href="product_detail.php?prodID=<?php echo $related_product['productID']; ?>" class="btn btn-primary">Mua Hàng</a>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>
<?php	

require_once 'footer.php' ?>