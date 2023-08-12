<div class="row">
            <div class="row frmtitle mb">
                <h1>DANH SÁCH LOẠI HÀNG</h1>
            </div>
            <div class="row mb10 frmdsloai">
                    <form action="index.php?act=listbill" method="post">
                        <input type="text"name="kyw" placeholder="Nhập mã đơn hàng">
                        <input type="submit" name="listok" value="Go">
                    </form>
            <div class="row frmcontent">
                
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ ĐƠN HÀNG</th>
                            <th>KHÁCH HÀNG</th>
                            <th>SỐ LƯỢNG HÀNG</th>
                            <th>GIÁ TRỊ ĐƠN HÀNG</th>
                            <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                            <th>NGÀY ĐẶT HÀNG</th>
                            <th>THAO TÁC</th>
                            <th></th>
                        </tr>

                        <?php 
                            foreach($listbill as $bill){
                                extract($bill);
                                $kh=$bill['bill_name'].' 
                                    <br> '.$bill['bill_email'].'
                                    <br>'.$bill['bill_address'].'
                                    <br>'.$bill['bill_tel'].'';
                                $countsp=loadALl_cart_count($bill['id']);
                                $ttdh=get_ttdh($bill['bill_status']);
                                $xoadh="index.php?act=xoadh&id=".$id;
                                $suadh="index.php?act=suadh&id=".$id;
                                echo '<tr>
                                        <td><input type="checkbox" name=""></td>
                                        <td>'.$bill['id'].'</td>
                                        <td>'.$kh.'
                                        </td>
                                        <td>'.$countsp.'</td>
                                        <td><strong>'.$bill['total'].'</strong> VNĐ</td>
                                        <td>'.$ttdh.'</td>
                                        <td>'.$bill['ngaydathang'].'</td>
                                        <td>
                                            <a href="'.$xoadh.'"><input type="button" value="Xóa"></a>
                                            <a href="'.$suadh.'"><input type="button" value="Sửa"></a>
                                        </td>
                                    </tr>';
                            }                        
                        
                        ?>
                        
                    </table>
                    
                </div>
                <div class="row mb10">
                    <img src="" alt="">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                </div>
            </div>
        </div>