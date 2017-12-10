<?php 
require_once realpath( './entities/product.class.php' );
require_once realpath( './entities/category.class.php' );

$db = new DB();
$categories = Category::list_category();

/**
 * Handle Form
 */
if( ! empty( $_POST ) ) {
	$prod_name     = $_POST['name'];
	$prod_desc     = $_POST['description'];
	$prod_qty      = $_POST['quantity'];
	$prod_price    = $_POST['price'];
	$prod_category = $_POST['category'];
	$prod_picture  = $_FILES['picture'];

	$prod = new Product( $prod_name, $prod_category, $prod_price, $prod_qty, $prod_desc, $prod_picture );
	if( $prod->save() ) {
		header("Location: add_product.php?success=1");
	} else {
		$fail = true;
	}
}

require_once 'header.php';
if( isset( $fail ) && $fail ) :
	?> 
	<div class="alert alert-danger">Thêm thất bại.</div>
	<?php
elseif( isset( $_GET['success'] ) ) :
	?> 
	<div class="alert alert-success">Thêm thành công.</div>
	<?php
endif;
 ?>
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="form-group">
				    <label class="control-label col-sm-2">Tên sản phẩm</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" name="name" id="" value="<?php echo isset( $_POST['name'] ) ? $_POST['name'] : ''; ?>">
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-2">Mô tả sản phẩm</label>
				    <div class="col-sm-10">
				    	<textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo isset( $_POST['description'] ) ? $_POST['description'] : ''; ?></textarea>
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-2">Số lượng</label>
				    <div class="col-sm-10">
				    	<input class="form-control" type="number" name="quantity" id="" value="<?php echo isset( $_POST['quantity'] ) ? $_POST['quantity'] : ''; ?>">
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-2">Giá</label>
				    <div class="col-sm-10">
				    	<input class="form-control" type="number" name="price" id="" value="<?php echo isset( $_POST['price'] ) ? $_POST['price'] : ''; ?>">
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-2">Loại sản phẩm</label>
				    <div class="col-sm-10">
				    	<select class="form-control" name="category" id="">
				    		<option value=""> - Chọn Loại Sản Phẩm - </option>
				    		<?php 
				    			if( $categories ) {
				    				foreach ( $categories as $category) {
				    				?>
				    				<option value="<?php echo $category['catID']; ?>"><?php echo $category['catName']; ?></option>
				    				<?php	
				    				}
				    			}
				    		?>
				    	</select>
				    </div>
				</div>
				<div class="form-group">
				    <label class="control-label col-sm-2">Hình ảnh</label>
				    <div class="col-sm-10">
				    	<input type="file" name="picture" id="">
				    </div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php require_once 'footer.php' ?>