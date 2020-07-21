<?php

global $post;
if( isset( $post->post_author ) ) {
	$user_id = $post->post_author;
	$byline = sprintf( esc_html_x( '%s', 'post author', 'penci-amp' ), '<span class="author vcard author_name post-author">' . get_the_author_meta( 'display_name', $user_id ) . '</span>' );
	echo '<span class="entry-meta-item penci-amp-byline"><i class="fa fa-user"></i> ' . $byline . '</span>';
}

$time_string = '<time class="entry-date post-date published updated" datetime="%1$s">%2$s</time>';

if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {

	$time_string = '<time class="entry-date post-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';

}

$time_string = sprintf( $time_string,
	esc_attr( get_the_date( 'c' ) ),
	esc_html( get_the_date( 'M j, Y' ) ),
	esc_attr( get_the_modified_date( 'c' ) ),
	esc_html( get_the_modified_date() )
);

$posted_on = sprintf(
	esc_html_x( '%s', 'post date', 'penci-amp' ),
	'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
);

echo '<span class="entry-meta-item penci-posted-on"><i class="fa fa-clock-o"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

$output_comment = '<span class="entry-meta-item penci-comment-count">';
$output_comment .= '<a href="' . esc_url( get_comments_link() ) . '"><i class="fa fa-comment-o"></i>';
$output_comment .= get_comments_number_text( esc_html__( '0', 'penci-amp' ), esc_html__( '1', 'penci-amp' ), '% ' . esc_html__( '', 'penci-amp' ) );
$output_comment .= '</a></span>';

echo $output_comment;