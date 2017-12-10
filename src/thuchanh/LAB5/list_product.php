<?php 
require_once realpath( './entities/product.class.php' );

require_once 'header.php';

$products = Product::list_products();
if( ! empty( $products ) && is_array( $products ) ) {
	?>
	<div class="row products-wrapper">
		<?php
		foreach ( $products as $product ) {
			?>
			<div class="item col-md-3 col-xs-12">
				<div class="thumb">
					<img src="<?php echo $product['picture']; ?>" alt="">	
				</div>
				<div class="info-wrapper">
					<div class="title">
						<?php echo  $product['productName']; ?>
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
					<a href="#" class="btn btn-primary">Mua Hàng</a>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php	
}

require_once 'footer.php' ?>