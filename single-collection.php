<?php get_header(); ?>
<div>
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

            <?php
            /**
             * New layout
             *
             * https://play.tailwindcss.com/9GamhtLqYz?layout=preview
             * https://play.tailwindcss.com/lANfB2UAQf
             */
            ?>

			<?php get_template_part( 'template-parts/heading', null, [
				'title' => get_the_title(),
				'text'  => strip_tags( get_the_content(), [ 'a', 'strong', 'em', ] ),
			] ); ?>

			<?php
			$all_section_ids = [];
			if ( have_rows( 'flexible_content' ) ) {
				$row_index = 0;
				while ( have_rows( 'flexible_content' ) ) {
					the_row();
					if ( get_row_layout() === 'text' ) {
						$all_section_ids[] = 'text_' . $row_index;
					} elseif ( get_row_layout() === 'gallery' ) {
						$images = get_sub_field( 'images' );
						if ( $images ) {
							foreach ( $images as $image ) {
								$all_section_ids[] = 'image_' . $image['attachment_id'];
							}
						}
					}
					$row_index++;
				}
				reset_rows();
			}
			// Add an ID for the pagination section to link to from the last item
//			$all_section_ids[] = 'collection-pagination';
			?>
            <script>
                window.collectionSectionIds = <?php echo json_encode( $all_section_ids ); ?>;
            </script>
            <?php

			$id_index = 0;
			if ( have_rows( 'flexible_content' ) ): ?>
				<?php while ( have_rows( 'flexible_content' ) ): the_row(); ?>

					<?php if ( get_row_layout() === 'text' ): ?>

						<?php
						$current_id = $all_section_ids[ $id_index ];
						$next_id    = $all_section_ids[ $id_index + 1 ] ?? null;
						$id_index ++;

						get_template_part( 'template-parts/collection-flexible-content-text', null, [
							'content' => get_sub_field( 'content' ),
							'id'      => $current_id,
							'next_id' => $next_id,
						] );
						?>

					<?php elseif ( get_row_layout() === 'gallery' ): ?>

						<?php
						$attachment_ids = array_map( function ( $image ) {
							return absint( $image['attachment_id'] );
						}, get_sub_field( 'images' ) );

						// Get the next IDs for the images in this gallery
						$gallery_next_ids = [];
						foreach ( $attachment_ids as $attachment_id ) {
							$gallery_next_ids[ $attachment_id ] = $all_section_ids[ $id_index + 1 ] ?? null;
							$id_index ++;
						}

						get_template_part( 'template-parts/collection-flexible-content-gallery', null, [
							'attachment_ids'   => $attachment_ids,
							'gallery_next_ids' => $gallery_next_ids,
						] );
						?>

					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>

			<div id="collection-pagination">
				<?php get_template_part( 'template-parts/collection-pagination' ); ?>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
