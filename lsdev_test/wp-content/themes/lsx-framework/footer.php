<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package lsx
 */
?>

		</div><!-- .content -->
	</div><!-- wrap -->

	<?php lsx_footer_before(); ?>

	<div class ="footerwrap the-footer-container">
		<footer class="content-info container" role="contentinfo">
		  	<div class="row">
		    	<div class="col-sm-12">
	
		    		<?php lsx_footer_top(); ?>
	
		      		<p>Created by <a href="http://www.lsdev.biz/" target="_blank">LS Dev</a> Copyright <?php echo date('Y'); ?> </p>
	
		      		<?php lsx_footer_bottom(); ?>
		      		
		    	</div>
		  	</div>
		</footer>	
	</div>


	<?php lsx_footer_after(); ?>

<?php wp_footer(); ?>

<?php /*wp_footer(); TODO */ ?>
<?php lsx_body_bottom(); ?>
</body>
</html>