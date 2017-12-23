<?php 
require_once realpath( './entities/product.class.php' );
require_once realpath( './entities/category.class.php' );

$categories = Category::list_category();

if( isset( $_GET['prodID'] ) ) {
	if( empty( $_SESSION['cart'] ) || ! is_array( $_SESSION['cart'] ) ) {
		$_SESSION['cart'] = [
			[ 'prodID' => $_GET['prodID'], 'quantity' => 1 ]
		];
	} else {
		$founded = 0;
		foreach ( $_SESSION['cart'] as $k => $item ) {
			if( $item['prodID'] == $_GET['prodID'] ) {
				$_SESSION['cart'][ $k ]['quantity'] += 1;
				$founded = 1;
			}
		}
		if( ! founded ) {
			$_SESSION['cart'][] = [ 'prodID' => $_GET['prodID'], 'quantity' => 1 ];
		}
	}
	header("Location: shopping_cart.php");
} 

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
		<h3>Thông Tin Giỏ Hàng</h3>
		<table class="table table-responsive table-striped table-hover">
			<thead>
				<tr>
					<td>Tên sản phẩm</td>
					<td>Hình ảnh</td>
					<td>Số lượng</td>
					<td>Đơn giá</td>
					<td>Thành tiền</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				if( empty( $_SESSION['cart'] ) && ! is_array( $_SESSION['cart'] ) ) {
					?>
					<tr>
						<td colspan="5">Không có sản phẩm nào.</td>
					</tr>
					<?php
				} else {
					foreach ( $_SESSION['cart'] as $item) {
						$product = Product::get_product( $item['prodID'] );
						if( $product ) {
							$product = $product[0];
							?>
							<tr>
								<td><?php echo $product['productName'] ?></td>
								<td><img src="<?php echo $product['picture']; ?>" alt="" class="img-responsive"></td>
								<td><?php echo $item['quantity']; ?></td>
								<td><?php echo number_format( floatval( $product['price'] ) ); ?> VNĐ</td>
								<td><?php echo floatval( $product['price'] ) * intval( $item['quantity'] ); ?></td>
							</tr>
							<?php
						}
					}
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php	
require_once 'footer.php' ?>