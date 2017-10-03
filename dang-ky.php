<?php get_header(); ?>
<?php /* Template Name: Đăng Ký */ ?>
<?php
if (is_user_logged_in()) {
    $user_id = get_current_user_id();
    $current_user = wp_get_current_user();
    $profile_url = get_author_posts_url($user_id);
    $edit_profile_url = get_edit_profile_url($user_id);
    ?>
    <div class="regted">
        Bạn đã đăng nhập với tên nick <a href="<?php echo $profile_url ?>"><?php echo $current_user->display_name; ?></a> Bạn có muốn <a href="<?php echo esc_url(wp_logout_url($current_url)); ?>">Thoát</a> không ?
    </div>
    <?php } else { ?>
    <div class="dangkytaikhoan">
        <ol>
        <?php
        ;
        $success = '';
        global $wpdb, $PasswordHash, $current_user, $user_ID;
        if (isset($_POST['task']) && $_POST['task'] == 'register') {
            $pwd1 = $wpdb->escape(trim($_POST['pwd1']));
            $pwd2 = $wpdb->escape(trim($_POST['pwd2']));
            $email = $wpdb->escape(trim($_POST['email']));
            $username = $wpdb->escape(trim($_POST['username']));

            if ($email == "" || $pwd1 == "" || $pwd2 == "" || $username == "") {
                echo $err='<li class="text-danger">Vui lòng không bỏ trống những thông tin bắt buộc!</li></br>';
            }
            if ($email != "" && $pwd1 != "" && $pwd2 != "" && $username != "") {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo $err='<liclass="text-danger">Địa chỉ Email không hợp lệ!.</li></br>';
                } else {
                    if (email_exists($email)) {
                        echo $err='<li class="text-danger">Địa chỉ Email đã tồn tại.</li></br>';
                    }
                }
                if ($pwd1 <> $pwd2) {
                    echo $err='<li class="text-danger">Mật khẩu không khớp.</li></br>';
                }
                if (username_exists($username)) {
                    echo $err='<li class="text-danger">Tài khoản đã tồn tại.</li></br>';
                }
            }
            if (empty($err)) {
                $user_id = wp_insert_user(array('user_pass' => apply_filters('pre_user_user_pass', $pwd1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber'));
                if (is_wp_error($user_id)) {
                    echo $err='<p class="text-danger">Error on user creation.</p></br>';
                } else {
                    do_action('user_register', $user_id);
                    $success = '<p class="bg-success text-center">Bạn đã đăng ký thành công!</p>';
                }
            }
        }
        ?>
        <!--display error/success message-->
        <?php
        if (!empty($success)) :
            $login_page = home_url('/dang-nhap');
            echo '' . $success . '<p class="bg-success text-center">Bạn có muốn đăng nhập luôn không? <a href=' . $login_page . '> Có</a>' . '</p>' ;
        endif;
        ?>
        </ol>
    </div>
    <div class="form-dangky col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="post" role="form">
            <div class="form-group">
                <label class="control-label  col-sm-3" for="username">Tên đăng nhập: <span style="color:red">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" value="<?php
                            if (!empty($err)) {
                                echo $username;
                            }
                                                                                                                             ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email: <span style="color:red">*</span></label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php
                            if (!empty($err)) {
                                echo $email;
                            }
                                                                                                                             ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd1">Mật khẩu: <span style="color:red">*</span></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd2">Nhập lại mật khẩu: <span style="color:red">*</span></label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Nhập lại mật khẩu">
                </div>
            </div>
    <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn-md btn-success">Đăng ký</button>
                    <input type="hidden" name="task" value="register" />
                </div>
            </div>
        </form>
    </div>


<?php } ?>