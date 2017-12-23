<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LAB 9</title>
</head>
<body>
	<form action="">
		<table>
			<tr>
				<td colspan="2" align="center"><h1>Tìm kiếm</h1></td>
			</tr>
			<tr>
				<th>Nhập địa chỉ</th>
				<td>
					<input type="text" name="txtKeyword" id="txtKeyword">
					<button type="submit" onClick="event.preventDefault(); search()">Tìm kiếm</button>					
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<h1>Kết quả</h1>
					<div id="divResult"></div>
				</td>
			</tr>
		</table>
	</form>
	<script>
		var xmlHttp;

		function search() {
			xmlHttp = createXMLHttpRequest();
			xmlHttp.onreadystatechange = funcHandleResponseFromServer;

			var keyword = document.getElementById('txtKeyword').value;
			var serverURL = 'ajax.php?keyword=' + keyword;
			xmlHttp.open('GET', serverURL, true);
			xmlHttp.send(null); 
		}

		function createXMLHttpRequest() {
			if( window.XMLHttpRequest ) {
				return new XMLHttpRequest();
			} else if( window.ActiveXObject ) {
				return new ActiveXObject("Microsoft.XMLHTTP");
			}
		}

		function funcHandleResponseFromServer() {
			if( xmlHttp.readyState == 4 && xmlHttp.status == 200 ) {
				var kq = xmlHttp.responseText;
				document.getElementById("divResult").innerHTML = kq;
			}
		}
	</script>
</body>
</html>