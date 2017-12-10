<?php 
require_once realpath( './entities/product.class.php' );

$db = new DB();
$categories = $db->select_to_array("SELECT * FROM category");

/**
 * Handle Form
 */
if( ! empty( $_POST ) ) {
	$prod_name     = $_POST['name'];
	$prod_desc     = $_POST['description'];
	$prod_qty      = $_POST['quantity'];
	$prod_price    = $_POST['price'];
	$prod_category = $_POST['category'];
	$prod_picture  = $_POST['picture'];

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
	<div class="message fail">Thêm thất bại.</div>
	<?php
elseif( isset( $_GET['success'] ) ) :
	?> 
	<div class="message success">Thêm thành công.</div>
	<?php
endif;
 ?>
	<form method="POST">
		<div class="row">
		    <div class="lbltitle">
		        <label for="">Tên sản phẩm</label>
		    </div>
		    <div class="lblinput">
		    	<input type="text" name="name" id="" value="<?php echo isset( $_POST['name'] ) ? $_POST['name'] : ''; ?>">
		    </div>
		</div>
		<div class="row">
		    <div class="lbltitle">
		        <label for="">Mô tả sản phẩm</label>
		    </div>
		    <div class="lblinput">
		    	<textarea name="description" id="" cols="30" rows="10"><?php echo isset( $_POST['description'] ) ? $_POST['description'] : ''; ?></textarea>
		    </div>
		</div>
		<div class="row">
		    <div class="lbltitle">
		        <label for="">Số lượng</label>
		    </div>
		    <div class="lblinput">
		    	<input type="number" name="quantity" id="" value="<?php echo isset( $_POST['quantity'] ) ? $_POST['quantity'] : ''; ?>">
		    </div>
		</div>
		<div class="row">
		    <div class="lbltitle">
		        <label for="">Giá</label>
		    </div>
		    <div class="lblinput">
		    	<input type="number" name="price" id="" value="<?php echo isset( $_POST['price'] ) ? $_POST['price'] : ''; ?>">
		    </div>
		</div>
		<div class="row">
		    <div class="lbltitle">
		        <label for="">Loại sản phẩm</label>
		    </div>
		    <div class="lblinput">
		    	<select name="category" id="">
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
		<div class="row">
		    <div class="lbltitle">
		        <label for="">Hình ảnh</label>
		    </div>
		    <div class="lblinput">
		    	<input type="text" name="picture" id="" value="<?php echo isset( $_POST['picture'] ) ? $_POST['picture'] : ''; ?>">
		    </div>
		</div>
		<div class="row">
			<div class="submit">
				<button type="submit">Thêm sản phẩm</button>
			</div>
		</div>
	</form>
<?php require_once 'footer.php' ?>