
    <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="container text-center">
				<?php
					/**
					 * Fires before the devbio footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					do_action( 'devbio_credits' );
				?>
				<p class="copyright"><a class='profile-image' href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <p class="copyright">Handcrafted with <i class="fa fa-heart"></i> by <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<p class="copyright"><a href='https://facebook.com/euobasi' >Facebook</a> - <a href='https://twitter.com/ebenzunlimited/' >Twitter</a> - <a href='https://instagram.com/ebenzunlimited/' >Instagram</a></p>
        </div><!--//container-->
    </footer><!--//footer-->      
	<?php wp_footer(); ?>
</body>
</html> 
