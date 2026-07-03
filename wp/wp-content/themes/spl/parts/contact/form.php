<?php
/**
 * Contact — Form + Map + Social + Hotline section.
 *
 * @package SPL
 */

use SPL\Core\Helper;

defined( 'ABSPATH' ) || exit;

$data          = $args ?? [];
$form_title    = $data['form_title'] ?? 'Gửi Tin Nhắn Cho Chúng Tôi';
$form_desc     = $data['form_desc'] ?? 'Để lại thông tin, chúng tôi sẽ liên hệ tư vấn miễn phí trong thời gian sớm nhất.';
$cf7_shortcode = $data['cf7_shortcode'] ?? '';
$map_title     = $data['map_title'] ?? 'Vị Trí Của Chúng Tôi';
$map_embed     = $data['map_embed_url'] ?? '';
$social_title  = $data['social_title'] ?? 'Kết Nối Với Chúng Tôi';
$social_desc   = $data['social_desc'] ?? 'Theo dõi chúng tôi trên mạng xã hội để cập nhật sản phẩm mới và khuyến mãi hấp dẫn.';
$hotline_title = $data['hotline_title'] ?? 'Gọi Ngay Hotline';
$hotline_desc  = $data['hotline_desc'] ?? 'Tư vấn miễn phí, hỗ trợ 7 ngày/tuần';

$hotline     = Helper::getField( 'hotline', 'option' ) ?: '098 750 33 60';
$hotline_url = 'tel:' . preg_replace( '/[^0-9+]/', '', $hotline );

$social    = get_option( 'social_link__options' ) ?: [];
$fb_url    = $social['facebook']['url'] ?? '';
$yt_url    = $social['youtube']['url'] ?? '';
$zalo_url  = $social['zalo']['url'] ?? '';
?>
<section class="contact-main">
	<div class="container">
		<div class="contact-layout">

			<!-- Form -->
			<div class="contact-form-wrapper reveal">
				<h2>
					<svg class="icon" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
					<?php echo esc_html( $form_title ); ?>
				</h2>
				<?php if ( $form_desc ) : ?>
					<p><?php echo esc_html( $form_desc ); ?></p>
				<?php endif; ?>

				<?php if ( $cf7_shortcode ) : ?>
					<?php echo do_shortcode( $cf7_shortcode ); ?>
				<?php else : ?>
					<form class="contact-form" method="post" action="#">
						<div class="contact-form__row">
							<div class="form-group">
								<label for="cf-name"><?php esc_html_e( 'Họ và tên', 'spl' ); ?> <span>*</span></label>
								<div class="form-input-wrapper">
									<svg class="icon" viewBox="0 0 24 24"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
									<input type="text" id="cf-name" name="name" required placeholder="<?php esc_attr_e( 'Nguyễn Văn A', 'spl' ); ?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="cf-phone"><?php esc_html_e( 'Số điện thoại', 'spl' ); ?> <span>*</span></label>
								<div class="form-input-wrapper">
									<svg class="icon" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
									<input type="tel" id="cf-phone" name="phone" required placeholder="<?php esc_attr_e( '0987 xxx xxx', 'spl' ); ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="cf-email"><?php esc_html_e( 'Email', 'spl' ); ?></label>
							<div class="form-input-wrapper">
								<svg class="icon" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
								<input type="email" id="cf-email" name="email" placeholder="<?php esc_attr_e( 'email@example.com', 'spl' ); ?>" />
							</div>
						</div>
						<div class="form-group">
							<label for="cf-subject"><?php esc_html_e( 'Chủ đề', 'spl' ); ?></label>
							<div class="form-input-wrapper">
								<svg class="icon" viewBox="0 0 24 24"><path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z"/><path d="M7 7h.01"/></svg>
								<select id="cf-subject" name="subject">
									<option value=""><?php esc_html_e( '-- Chọn chủ đề --', 'spl' ); ?></option>
									<option><?php esc_html_e( 'Tư vấn sản phẩm', 'spl' ); ?></option>
									<option><?php esc_html_e( 'Hợp tác kinh doanh / Mua sỉ', 'spl' ); ?></option>
									<option><?php esc_html_e( 'Khiếu nại / Đổi trả', 'spl' ); ?></option>
									<option><?php esc_html_e( 'Hỗ trợ đơn hàng', 'spl' ); ?></option>
									<option><?php esc_html_e( 'Khác', 'spl' ); ?></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="cf-message"><?php esc_html_e( 'Nội dung tin nhắn', 'spl' ); ?> <span>*</span></label>
							<textarea id="cf-message" name="message" rows="5" required placeholder="<?php esc_attr_e( 'Nhập nội dung cần tư vấn hoặc hỗ trợ...', 'spl' ); ?>"></textarea>
						</div>
						<button type="submit" class="btn btn--primary btn--lg contact-form__submit">
							<svg class="icon" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
							<?php esc_html_e( 'Gửi Tin Nhắn', 'spl' ); ?>
						</button>
					</form>
				<?php endif; ?>
			</div>

			<!-- Sidebar -->
			<div class="contact-sidebar reveal">

				<!-- Map -->
				<?php if ( $map_embed ) : ?>
					<div class="contact-map">
						<h3>
							<svg class="icon" viewBox="0 0 24 24"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
							<?php echo esc_html( $map_title ); ?>
						</h3>
						<div class="contact-map__frame">
							<iframe src="<?php echo esc_url( $map_embed ); ?>" width="100%" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="<?php esc_attr_e( 'Bản đồ', 'spl' ); ?>"></iframe>
						</div>
					</div>
				<?php endif; ?>

				<!-- Social -->
				<?php
				$custom_socials = $data['social_links'] ?? [];
				$contact_socials = [];

				if ( ! empty( $custom_socials ) && is_array( $custom_socials ) ) {
					foreach ( $custom_socials as $item ) {
						$contact_socials[] = [
							'icon'    => $item['icon_type'] ?? 'facebook',
							'title'   => $item['title'] ?? '',
							'subtext' => $item['subtext'] ?? '',
							'url'     => $item['url'] ?? '',
						];
					}
				} else {
					// Fallback to global setting values
					if ( $fb_url ) {
						$contact_socials[] = [
							'icon'    => 'facebook',
							'title'   => 'Facebook',
							'subtext' => __( 'Theo dõi trang', 'spl' ),
							'url'     => $fb_url,
						];
					}
					if ( $yt_url ) {
						$contact_socials[] = [
							'icon'    => 'youtube',
							'title'   => 'Youtube',
							'subtext' => __( 'Kênh sức khỏe', 'spl' ),
							'url'     => $yt_url,
						];
					}
					if ( $zalo_url ) {
						$contact_socials[] = [
							'icon'    => 'zalo',
							'title'   => 'Zalo',
							'subtext' => __( 'Chat trực tiếp', 'spl' ),
							'url'     => $zalo_url,
						];
					}
				}

				if ( ! empty( $contact_socials ) ) :
				?>
					<div class="contact-social-box">
						<h3><?php echo esc_html( $social_title ); ?></h3>
						<?php if ( $social_desc ) : ?>
							<p><?php echo esc_html( $social_desc ); ?></p>
						<?php endif; ?>
						<div class="contact-social-links">
							<?php
							foreach ( $contact_socials as $social_item ) :
								$icon_key = $social_item['icon'];
								$class_map = [
									'facebook'    => 'fb',
									'youtube'     => 'yt',
									'zalo'        => 'zalo',
									'tiktok'      => 'tiktok',
									'tiktok_shop' => 'tiktok',
									'instagram'   => 'instagram',
									'messenger'   => 'messenger',
								];
								$class_suffix = $class_map[ $icon_key ] ?? $icon_key;
								$item_url     = $social_item['url'];
								if ( empty( $item_url ) ) {
									continue;
								}
								?>
								<a href="<?php echo esc_url( $item_url ); ?>" class="contact-social-link contact-social-link--<?php echo esc_attr( $class_suffix ); ?>" target="_blank" rel="noopener">
									<?php
									if ( function_exists( 'hd_svg' ) ) {
										echo hd_svg( $icon_key, 'icon' );
									} else {
										echo '<svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg>';
									}
									?>
									<div>
										<strong><?php echo esc_html( $social_item['title'] ); ?></strong>
										<?php if ( ! empty( $social_item['subtext'] ) ) : ?>
											<span><?php echo esc_html( $social_item['subtext'] ); ?></span>
										<?php endif; ?>
									</div>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

				<!-- Hotline CTA -->
				<div class="contact-hotline-box">
					<svg class="icon icon-xl" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
					<h4><?php echo esc_html( $hotline_title ); ?></h4>
					<p><?php echo esc_html( $hotline_desc ); ?></p>
					<a href="<?php echo esc_url( $hotline_url ); ?>" class="btn btn--primary btn--lg">
						<svg class="icon" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
						<?php echo esc_html( $hotline ); ?>
					</a>
				</div>

			</div>

		</div>
	</div>
</section>
