<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="nex-vx-comments">

    <?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h4 class="nex-comments-title">
			<?php comments_number( esc_html__('No comments','nex'), esc_html__('Comments (1)','nex'), esc_html__('Comments (%)','nex') ); ?>
		</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'nex' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'nex' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'nex' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

        <ul class="comments-area-ul">
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
					'avatar_size'=> 80,
					'callback' => 'nex_custom_comments'
				) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'nex' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'nex' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'nex' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nex' ); ?></p>
	<?php endif;
	$args = array(
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author'    => '<div class="row"><div class="col-md-4"><input  class="nex-bcf" name="author" placeholder="'.esc_html_x('Enter your name','comment-form','nex').'" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" aria-required="true" required maxlength="245"></div>',
			'email'     => '<div class="col-md-4"><input  class="nex-bcf"  name="email" type="email" placeholder="'.esc_html_x('Enter your email','comment-form','nex').'" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" aria-required="true" required maxlength="100"></div>',
			'url'       => '<div class="col-md-4"><input  class="nex-bcf"  name="url" type="text" placeholder="'.esc_html_x('Enter your website','comment-form','nex').'" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" maxlength="200"></div></div>',
				)
		),
		'comment_notes_after'   => '',
		'comment_notes_before'  => '',
		'title_reply'           => esc_html_x('Leave a comment','comment-form','nex'),
		'title_reply_before'    => '<h4>',
        'title_reply_after'     => '</h4>',
		'comment_field'         => '<textarea class="nex-bcf" name="comment" placeholder="'.esc_html_x('Type your comment here...','comment-form','nex').'" required></textarea>',
		'label_submit'          => esc_html_x('Send comment','comment-form','nex'),
		'class_submit'          => 'nex-bgc nex-cch nex-bc',
        'class_form'            => 'comment-form'
	);
	comment_form( $args );
	?>
</div><!-- #comments -->