<?php get_header(); ?>
<?php
if(function_exists('ot_get_option')){
	$facebook = ot_get_option('facebook');
	$gplus = ot_get_option('gplus');
	$twitter = ot_get_option('twitter');
	$disqus_username = ot_get_option('disqus_username');
}
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php $postid = get_the_ID(); ?>
	<div class="featured-image">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail('full', array( 'class' => "featured-img"));
		}
		?>
	</div>
	<div id="group-and-comment">
	<div id="page-wrap">
		<div class="group">
			<div class="bio-and-post-group">		
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<div class="post_title"><?php the_title(); ?></div>

					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

					<div class="entry">
						<?php the_content(); ?>
					</div>
					<div class="postmetadata">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
						<hr class="hratas"/>
					</div>

				</div>

				<div class="bio">
					<div class="author-picture"><?php echo get_avatar( get_the_author_meta( 'ID' ),73 ); ?></div>
					<div class="author-name"><?php the_author_posts_link(); ?></div>
					<div class="author-bio"><?php the_author_meta('description') ?></div>
					<div class="post-date"><span style="font-weight:bold;"><?php echo (get_the_modified_time() != get_the_time())?"Updated</span><br />".get_the_modified_time('F j, Y'):"Posted: ".get_the_time('F j, Y') ?></div>
				</div>

			<?php endwhile; endif; ?>    

			<?php get_footer(); ?>