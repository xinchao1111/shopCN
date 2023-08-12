<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../view/css/style.css">
</head>
<body>
<style>
    .boxtrai {
        width: 70%;
        float: left;
        padding: 20px;
    }

    .boxphai {
        width: 30%;
        float: left;
        padding: 20px;
    }

    .boxtitle {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .boxcontent {
        background-color: #f5f5f5;
        border-radius: 5px;
        padding: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
</style>

</body>
</html>

<div class="row mb">
    <div class="boxtrai">
        <div class="row mb">
            <div class="boxtitle">THỐNG KÊ SẢN PHẨM</div>
            <div class="row boxcontent cart">
                <table>
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Số lượng</th>
                        <th>Giá cao nhất</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá trung bình</th>
                    </tr>
                    <?php
                        foreach($listthongke as $tk){
                            extract($tk);
                            echo '<tr>
                                    <td>'.$madm.'</td>
                                    <td>'.$tendm.'</td>
                                    <td>'.$countsp.'</td>
                                    <td>'.$maxprice.'</td>
                                    <td>'.$minprice.'</td>
                                    <td>'.$tbprice.'</td>
                                </tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
