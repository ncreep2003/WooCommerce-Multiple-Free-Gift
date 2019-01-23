<?php
$overlay = WFG_Settings_Helper::get( 'popup_overlay', true, 'global_options' );
if ( $overlay ):
	?>

<?php endif; ?>
<div class='wfg-fixed' style="display:none">
    <h2 class="wfg-title">
		<?php
		$heading = WFG_Settings_Helper::get( 'popup_heading', false, 'global_options' );
		if ( false !== $heading ) {
			echo $heading;
		} else {
			echo WFG_Common_Helper::translate( 'Choose your free gift' );
		}
		?>
    </h2>
    <div class="wfg-gifts">
        <div action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post">
            <input type="hidden" name="action" value="wfg_add_gifts"/>
			<?php
			wp_nonce_field( 'wfg_add_free_gifts', '_wfg_nonce' );
			echo ' <div class="siema">';
			if ( ! empty( $wfg_free_products ) ):
				foreach ( $wfg_free_products as $product ):
					if ( empty( $product->detail ) ) {
						continue;
					}
					?>
                    <div class="wfg-gift-item">
                        <div class="wfg-heading">
                            <input type="checkbox" class="wfg-checkbox" name="wfg_free_items[]"
                                    id="wfg-item-<?php echo $product->detail->ID ?>"
                                    value="<?php echo $product->detail->ID ?>"/>
                            <label for="wfg-item-<?php echo $product->detail->ID ?>" class="wfg-title">
                                <img src="<?php echo $product->image ?>" style="width:150px; height:150px;" alt=""/>
                            </label>

                            <h3><?php echo $product->detail->post_title ?></h3><h3><?php echo $product->detail->post_excerpt ?></h3>
                        </div>
                    </div>
				<?php endforeach;
				echo "</div>";
				?>

                <div class="wfg-actions">
                    <button class="button wfg-button wfg-add-gifts">
						<?php
						$add_gift_text = WFG_Settings_Helper::get( 'popup_add_gift_text', false, 'global_options' );
						if ( false !== $add_gift_text ) {
							echo $add_gift_text;
						} else {
							echo WFG_Common_Helper::translate( 'Add Gifts' );
						}
						?>
                    </button>
                    <button class="button wfg-button wfg-no-thanks" type="button">
						<?php
						$cancel_text = WFG_Settings_Helper::get( 'popup_cancel_text', false, 'global_options' );
						if ( false !== $cancel_text ) {
							echo $cancel_text;
						} else {
							echo WFG_Common_Helper::translate( 'No Thanks' );
						}
						?>
                    </button>
                </div>
			<?php endif; ?>
        </form>
    </div>
</div>


    <div class="v-centered">
        <div class="carousel">
            <div class="roll">
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/1.jpg" alt="Project img 1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/2.jpg" alt="Project img 2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/3.jpg" alt="Project img 3">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/4.jpg" alt="Project img 4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/5.jpg" alt="Project img 5">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/6.jpg" alt="Project img 6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/7.jpg" alt="Project img 7">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/8.jpg" alt="Project img 8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
                <div class="project">
                    <img src="http://ibrahimjabbari.com/english/images/9.jpg" alt="Project img 9">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacinia in mi a rhoncus. Suspendisse maximus leo ac lorem interdum volutpat.</p>
                </div>
            </div>
            <div class="sections">
            </div>
            <button class="navigation" id="nav-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
            <button class="navigation" id="nav-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
    </div>


