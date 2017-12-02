<!--Sử dụng thẻ pre để in chuỗi vẫn giữ đúng format-->
<pre>
<?php
// In ra chuỗi với điều kiện nếu dưới 50 ký tự thì sẽ bồi bằng ' ' ở cả 2 bên
echo str_pad( 'Dramatis Personae', 50, ' ', STR_PAD_BOTH ), "\n";

// In ra chuỗi với điều kiện nếu dưới 50 ký tự thì sẽ bồi bằng '.' ở cả 2 bên và bên trái
echo str_pad( 'DUNCAN, king of Scotland', 30, '.' ), str_pad( 'Larry', 20, '.', STR_PAD_LEFT ), "\n";
?>
</pre>

