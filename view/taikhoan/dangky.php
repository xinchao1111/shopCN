
<div class="row mb">
            <div class="boxtrai mr">
                <div class="row mb">
                    
                    <div class="boxtitle"><h1>ĐĂNG KÝ THÀNH VIÊN</h1></div>
                    <div class="row boxcontent formtaikhoan">
                        <form action="index.php?act=dangky" method="post">
                            <div class="row mb10">
                                Email
                                <input type="email" name="email" id="">
                            </div>
                            <div class="row mb10">
                                Usename
                                <input type="text" name="user" id="">
                            </div>
                            <div class="row mb10">
                                Password
                                <input type="password" name="pass" id="">
                            </div>
                            <div class="row mb10">
                                <input type="submit" value="Đăng ký" name="dangky">
                                <input type="reset" value="Nhập lại">
                            </div>
                            
                            
                        </form>
                        <h2 style="color: blue;">
                            <?php 
                                if(isset($thongbao)&&($thongbao!="")){
                                    echo $thongbao;
                                }
                            ?>
                        </h2>
                        
                    </div>
                </div>
                
                
            </div>
            <div class="boxphai">
                <?php 
                    include "view/boxright.php";
                ?>
            </div>
        </div>