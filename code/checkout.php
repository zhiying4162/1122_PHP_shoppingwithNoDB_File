<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>結帳頁面</title>
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
</head>
<?php
	header("Content-Type:text/html; charset=utf-8");
    session_start();
          
    date_default_timezone_set('Asia/Taipei');
    $total = $_SESSION['total'];
    $orderNumber = date('YmdHis');

    echo "<p style=\"text-align: center; font-size: 35px; font-weight: bold;\">感謝您的購買，期待您再次光臨</br></p>";
    echo "<p style=\"text-align: center; font-size: 35px; font-weight: bold;\">您的訂單編號為：<span style='color:red;'>$orderNumber</span></br>";
    echo "購買總金額為：<span style='color:blue;'>$total</span> </br></p>";
    echo "<br>";
    echo "<a href=\"production.html\">回購物畫面</a>";

    session_destroy();

?>