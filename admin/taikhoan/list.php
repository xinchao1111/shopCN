<div class="row">
            <div class="row headeradmin frmtitle">
                <h1>DANH SÁCH TÀI KHOẢN</h1>
            </div>
            <div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ TK</th>
                            <th>TÊN ĐĂNG NHẬP</th>
                            <th>MẬT KHẨU</th>
                            <th>EMAIL</th>
                            <th>ĐỊA CHỈ</th>
                            <th>ĐIỆN THOẠI</th>
                            <th>VAI TRÒ</th>
                            <th></th>
                        </tr>
                        <?php 
                            foreach($listtaikhoan as $taikhoan){
                                extract($taikhoan);
                                $suatk = "index.php?act=suatk&id=".$id;
                                $xoatk = "index.php?act=xoatk&id=".$id;
                                echo 
                                '<tr>
                                    <td><input type="checkbox"></td>
                                    <td>'.$id.'</td>
                                    <td>'.$user.'</td>
                                    <td>'.$pass.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$address.'</td>
                                    <td>'.$tel.'</td>
                                    <td>'.$role.'</td>
                                </tr>';
                            }
                        ?>
                        
                    </table>
                    
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=add"><input type="button" value="Nhập thêm"></a>
                </div>
            </div>
        </div>