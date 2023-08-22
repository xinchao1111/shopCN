
<div class="row mb">
            <div class="boxtrai mr">
                <div class="row mb">
                    
                    <div class="boxtitle"><h1>ĐĂNG KÝ THÀNH VIÊN</h1></div>
                    <div class="row boxcontent formtaikhoan">
                        <form action="index.php?act=dangky" method="post">
                        <div class="row mb10">
                            Email
                            <input type="email" name="email" id="">
                            <?php if(isset($errors) && in_array("Vui lòng nhập Email.", $errors)) { ?>
                                <span class="error" style="display: block; color: red;">Vui lòng nhập Email.</span>
                            <?php } ?>
                        </div>
                        <div class="row mb10">
                            Username
                            <input type="text" name="user" id="">
                            <?php if(isset($errors) && in_array("Vui lòng nhập Username.", $errors)) { ?>
                                <span class="error" style="display: block; color: red;">Vui lòng nhập Username.</span>
                            <?php } ?>
                        </div>
                        <div class="row mb10">
                            Password
                            <input type="password" name="pass" id="">
                            <?php if(isset($errors) && in_array("Vui lòng nhập Password.", $errors)) { ?>
                                <span class="error" style="display: block; color: red;">Vui lòng nhập Password.</span>
                            <?php } ?>
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
