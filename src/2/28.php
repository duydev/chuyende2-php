<?php
/**
 * Gán giá trị cho key 'username' của mảng $_POST và $_GET
 */
$_POST['username'] = 'cottonbelly';
$_GET['username']  = 'snoopy0877';

/**
 * In thử kết quả của $_POST{'username'], $_GET{'username'] và $_REQUEST{'username']
 * Khi đó $_REQUEST['username'] lấy giá trị theo thứ tự GPCES nên có giá trị của $_GET['username']
 */
echo $_POST['username'] , '<br>';
echo $_GET['username'] , '<br>';
// $_REQUEST chỉ lấy $_GET và $_POST lúc runtime. Cách gán ở trên không có tác dụng với $_REQUEST
echo @$_REQUEST['username'] , '<br><hr>';

/**
 * Thử gán ngược lại giá trị cho $_REQUEST['username']
 */
$_REQUEST['username'] = 'lambada';

/**
 * In thử kết quả của $_POST{'username'], $_GET{'username'] và $_REQUEST{'username']
 * Khi đó $_POST{'username'] và $_GET{'username'] vẫn giữ giá trị ban đầu và không phụ thuộc vào giá trị mới của $_REQUEST{'username']
 */
echo $_POST['username'] , '<br>';
echo $_GET['username'] , '<br>';
echo $_REQUEST['username'] , '<br>';