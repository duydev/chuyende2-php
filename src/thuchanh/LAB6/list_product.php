<?php 
require_once realpath( './entities/product.class.php' );
require_once realpath( './entities/category.class.php' );

if( isset( $_GET['catID'] ) ) {
	$products = Product::list_products_by_cat_id( intval( $_GET['catID'] ) );
} else {
	$products = Product::list_products();	
}
$categories = Category::list_category();

require_once 'header.php';
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
		<h3>Sản Phẩm Cửa Hàng</h3>
		<div class="products-wrapper">
			<?php
			if( ! empty( $products ) && is_array( $products ) ) {

				foreach ( $products as $product ) {
					?>
					<div class="item col-md-3 col-xs-12">
						<div class="thumb">
							<a href="product_detail.php?prodID=<?php echo $product['productID']; ?>">
								<img src="<?php echo $product['picture']; ?>" alt="" class="img-responsive">
							</a>	
						</div>
						<div class="info-wrapper">
							<div class="title">
								<a href="product_detail.php?prodID=<?php echo $product['productID']; ?>">
									<?php echo $product['productName']; ?>
								</a>
							</div>
							<div class="desc">
								<?php echo nl2br( $product['description'] ); ?>
							</div>
							<div class="price">
								<?php echo number_format( floatval( $product['price'] ) ); ?> VNĐ
							</div>
							<div class="quantity">
								<?php echo  $product['quantity']; ?>
							</div>
						</div>
						<div class="btn-buy text-center">
							<a href="product_detail.php?prodID=<?php echo $product['productID']; ?>" class="btn btn-primary">Mua Hàng</a>
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