<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mở đọc file</title>
</head>
<body>
    <table width="350" border="0" align="center"cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <?php 
                    ini_set('display_errors',0);
                    $file= fopen("file.txt","r") ;
                    if (!$file) {
                        echo "<br> Không thể mở được file này .<br>";
                        exit;
                    }
                    else {
                        echo"<p aline='center' class='style1'><div color=''#ffffff>";
                        while(!feof($file)) {
                            echo fgets($file)."<br>";
                          }
                        echo "<br><b>Mở và đọc file thành công!";
                        echo"</font></p>";
                    }
                ?>
            </td>
        </tr>
    </table>

</body>
</html>