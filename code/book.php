<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>產品列表_書本</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php
$filename = '../Book.txt';

if (file_exists($filename)) {
    $fileContent = file($filename);

    if ($fileContent !== false) {
        $header = explode(',', array_shift($fileContent));

        foreach ($fileContent as $line) {
            $columns = explode(',', $line);
            $imageName = $columns[0];
            $imagePath = findImage($imageName); 
            echo '<form action="addCar.php" method="post">';
            echo '<table>';
            echo '<tr>';
            if ($imagePath !== false) {
                echo '<td colspan="2" class="center"><img src="' . $imagePath . '" alt="' . $columns[1] . '"></td>';
            } else {
                echo '<td colspan="2" class="center">找不到圖片</td>';
            }
            echo '</tr>';
            
            foreach ($columns as $index => $column) {
                echo '<tr>';
                echo '<td><strong>' . $header[$index] . '</strong></td>';

                if ($header[$index] === '售價：') {
                    echo '<td>' . $column . '元</td>';
                } else {
                    echo '<td>' . $column . '</td>';
                }
                echo '</tr>';
            }

            echo '<tr><td align="center" colspan="2"><button><a href="addCar.php?page=book&id=' . $columns[0] . '">加入購物車</a></button></td></tr>';
            echo '</table>';
            echo '<p></p>';
            echo '</form>';
        }
    } else {
        echo '<p class="center">無法讀取文件或是文件不存在</p>';
    }
} 

function findImage($imageName) {
    $imageFormats = ['jpg', 'png']; 
    foreach ($imageFormats as $format) {
        $globPattern = '../pics/' . $imageName . '.' . $format;
        $images = glob($globPattern);
        if (!empty($images)) {
            return $images[0]; 
        }
    }
    return false; 
}
?>

    
</body>

</html>
