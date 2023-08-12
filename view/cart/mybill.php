<div class="row mb">
    <div class="boxtrai mr">
        
    <div class="row mb">
        <div class="boxtitle">ĐƠN HAGF CỦA BẠN</div>
        <div class="row boxcontent cart">
        <table>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Số lượng</th>
                <th>Tổng đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
            </tr>
            <?php
                if (is_array($listbill)) {
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $ttdh = get_ttdh($bill['bill_status']);
                        $countsp = loadALl_cart_count($bill['id']);
                        echo '<tr>
                                <td>' . $bill['id'] . '</td>
                                <td>' . $bill['ngaydathang'] . '</td>
                                <td>' . $countsp . '</td>
                                <td>' . $bill['total'] . '</td>
                                <td>' . $ttdh . '</td>
                            </tr>';
                    }
                }
            ?>
        </table>

        </div>
    </div>
    </div>

    <div class="boxphai">
        <?php 
        include "view/boxright.php";
        ?>
    </div>
</div>