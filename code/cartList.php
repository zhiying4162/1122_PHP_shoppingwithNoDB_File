<style>
        table {
            margin: 0 auto;
            text-align: center;
            border: 1px solid #000;
            width: 20%;
            border-collapse: collapse;
            /* 边框合并 */
        }

        td {
            border: 1px solid #000;
            /* 设置所有单元格的边框 */
        }

        td:first-child {
            border-left: none;
            /* 取消第一列的左边框 */
        }

        td:last-child {
            border-right: none;
            /* 取消最后一列的右边框 */
        }

        tr:last-child td {
            border-bottom: none;
            /* 取消最后一行的底边框 */
        }

        tr:first-child td {
            border-top: none;
            /* 取消第一行的顶边框 */
        }
        a{
            text-align: center;
            display: block;
        }
    </style>
<?php

session_start();
$num = $_SESSION['num'];

if(!isset($num)){
    header("Location:login.html");
}
else{
	if(isset($_SESSION['book']))
		$book = $_SESSION['book'];
	if(isset($_SESSION['food']))
		$food = $_SESSION['food'];
	$iIndex = 1;
	$totalBill = 0;
	echo "<p style=\"font-size:30px;text-align:center;\">感謝您的購買，您的購買清單如下：</p>";
	echo "<table border=1><tr><th>項次</th><th>產品編號</th><th>產品名稱</th><th>價格</th>";
	if(isset($book)){
		$bookInfo=array(
			array('31705','Arduino 創客之路',520),
			array('31807','圖解資料結構-使用Java第三版',500),
			array('31816','圖說演算法：使用C語言',380)
			);
		foreach($book as $value){
			//找出該book資訊
			foreach($bookInfo as $indexBook)
				if(in_array($value,$indexBook))  //一定會找到該本書的資訊
					break;
			echo "<tr><td>$iIndex</td>";
			for($i=0;$i<count($indexBook);$i++)
				echo "<td>".$indexBook[$i]."</td>";
			echo "</tr>";
			$totalBill += $indexBook[2];
			$iIndex++;
		}//end of foreach
	}//end if book

	if(isset($food)){
		$foodInfo=array(
			array('11705','活翠卸妝乳',460),
			array('21816','乾燥甜菊',250),
			array('16933','新馬賽潤澤皂',280)
			);
		foreach($food as $value){
			//找出該book資訊
			foreach($foodInfo as $indexfood)
				if(in_array($value,$indexfood))  //一定會找到該本書的資訊
					break;
			echo "<tr><td>$iIndex</td>";
			for($i=0;$i<count($indexfood);$i++)
				echo "<td>".$indexfood[$i]."</td>";
			echo "</tr>";
			$totalBill += $indexfood[2];
			$iIndex++;
		}//end of foreach
	}//end if book	
	echo "<tr><td colspan=3 align=right>總計：</td><td>$totalBill</td></tr>";
	echo "</table>";
    echo "<a href=\"checkout.php\">確認結帳</a></p>";

    $_SESSION['total'] = $totalBill;
}
	// session_destroy();

?>