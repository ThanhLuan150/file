<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 3</title>
    <style>
        .h2{
            font-family:'Times New Roman', Times, serif;
            color:#ffffff;
            text-align: center;
        }
        .input{
            border:1px solid white;
            height: 30px;
            
        }
        .input1{
            border:11px solid white;
        }
        .button{
            border-radius: 15px;
            border: 1px solid pink;
            height: 30px;;
        }
    </style>
</head>
<body>
<center>
        <form action="baitap.php"id="forml"method="post">
            <table width="500" border="0" aline="center" cellpadding="2" cellspacing="2" bgcolor="pink">
                <tr bgcolor="#BDBAE7">
                    <td colspan="2" bgcolor="purple"> 
                        <h2 aline="center" class="h2">TẠO  -GHI VÀ ĐỌC FILE ĐỊNH DẠNG</h2>
                    </td>
                </tr>
                <tr>
                    <td width="93"><span class="span">Tên file:</span></td>
                    <td width="393">
                        <label>
                            <input class="input" type="text" name="ten_file" id="ten_file" value="<?php echo $_POST["ten_file"]; ?>">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td valine ="top"><span class="span">Tên hàng:</span></td>
                    <td>
                        <label>
                            <input class="input" type="text" name="ten_hang" id="ten_hang" value="<?php echo $_POST["ten_hang"]; ?>">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td valine ="top"><span class="span">Số lượng:</span></td>
                    <td>
                        <label>
                            <input class="input" type="text" name="sl" id="sl" value="<?php echo $_POST["sl"]; ?>">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td valine ="top"><span class="span">Đơn giá:</span></td>
                    <td>
                        <label>
                            <input class="input" type="text" name="dg" id="dg" value="<?php echo $_POST["dg"]; ?>">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" aline ="center">
                        <input class="button" type="submit" name="Submit" value="Ghi và đọc file">
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <?php error_reporting(0); ?>
    <?php 
            if(isset ($_POST["ten_file"]))
            {
                $ten_file = $_POST["ten_file"];
                $ten_hang = $_POST["ten_hang"];
                $sl = $_POST["sl"];
                $dg = $_POST["dg"];
                $thanh_tien = $sl*$dg;
                $file = fopen("$ten_file","a",1);
                $san_pham = $ten_hang."\t".$sl."\t".$dg."\t".$thanh_tien."\n";
                fwrite($file,$san_pham);
                fclose($file);
                echo "<p align='center' class='style6'> Tạo và ghi file thành công! </p>";
                $file = fopen("$ten_file","r");
                echo "<table width='350' border='0' align='center' cellpadding='2' cellspacing='2' bgcolor='#DB95B8' class='style6'>";
                echo "<tr><td>";
                echo "<p align ='center'><B>Nội dung của file: </B><br></p>";
                echo "<table border='1' width='100%'>";
                echo "<tr>";
                echo "<td>Tên hàng</td>";
                echo "<td>Số lượng</td>";
                echo "<td>Đơn giá</td>";
                echo "<td>Thành tiền</td>";
                echo "</tr>";
                while(!feof($file))

            {
                echo "<tr>";
                    $noi_dung = fgets($file,1000);
                    $mang = explode("\t",$noi_dung);
                    echo "<td>$mang[0]</td>";
                    echo "<td>$mang[1]</td>";
                    echo "<td>$mang[2]</td>";
                    echo "<td>$mang[3]</td>";
                    echo "</tr>";
                   
                   
            }
                    echo "</table>";
                    echo "<p align = 'center' class= 'style6'><b>Đọc File thành công!</b></p>";
                    echo "</p>";
                fclose($file);
                echo"</tr></td>";
            }
            else
                echo "<p align = 'center'>Hãy nhập tên File!</p>";
        ?>
    
</body>
</html>
