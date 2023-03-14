<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo ghi đọc file</title>
</head>
<style>
    .span{
        color:red;
        font-family:'Times New Roman', Times, serif;
    }
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
<body>
    <center>
        <form action="mo_ghi_doc_file.php"id="form1"method="post">
            <table width="500" border="0" aline="center" cellpadding="2" cellspacing="2" bgcolor="pink">
                <tr bgcolor="#BDBAE7">
                    <td colspan="2" bgcolor="purple"> 
                        <h2 aline="center" class="h2">TẠO  -GHI VÀ ĐỌC FILE VỪA TẠO</h2>
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
                    <td valine ="top"><span class="span">Nôi dung:</span></td>
                    <td>
                        <textarea  class="input1" name="noidung" id="noidung" cols="50" rows="10"><?php echo $_POST["noidung"]; ?>
                    </textarea>
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
    
    <?php
    
        ini_set('display_errors',0);
        if(isset($_POST['ten_file']) && isset($_POST['noidung'])){
            $ten_file =$_POST['ten_file'];
            $noidung =$_POST['noidung'];
            //Ghi file
            $file = fopen("$ten_file","w",1);//w tạo file
            echo "<p >Đã ghi file thành công</p>";
            fclose($file);
            // Xuất file ra màn hình
            $file = fopen("$ten_file","r");
            echo "NỘI DUNG CỦA FILE: <br>";
            while(!feof($file)){
                $noidung = fgets($file,1000);
                echo nl2br($noidung);// nl2br hàm cho ký tự xuống dòng
                
            }echo "<br> Đọc file thành công <br>";
            fclose($file);
        }
        else{
            echo "Hãy nhập đầy đủ nội dung";
        }
    ?>

</body>
</html>