<?php
/** @var int[] $attachment_ids */
$attachment_ids   = $args['attachment_ids'] ?? [];
$gallery_next_ids = $args['gallery_next_ids'] ?? [];
$count            = 0;
$html             = '';
$hr               = '<hr class="sm:hidden border-gray-200 w-full" />';
$link             = '<a href="%s" id="%s" class="bg-white p-8 sm:shadow hover:opacity-95 transition-opacity" title="View larger" data-fslightbox>%s</a>';
$anchor_link      = '<a href="#%s" class="block bg-white p-8 sm:shadow hover:opacity-95 transition-opacity" title="Next section">%s</a>';
$row              = '<!-- Row Start --><div class="flex flex-col items-center justify-center bg-white sm:gap-8 sm:bg-transparent md:flex-row">%s</div><!-- /Row Start -->';
?>
<!-- Display Images from Collection -->
<div
	class="flex max-w-[82rem] mx-auto flex-col justify-evenly sm:gap-x-8 sm:gap-y-8 lg:gap-y-12 sm:px-8 default-margin-b">
	<?php foreach (
		ebca_get_gallery_images( $attachment_ids, '2048x2048', [
			'class' => 'max-h-[76vh] shadow w-auto',
//			'loading' => false, // Added this on 2024-11-13 to fix images getting shrunken if they had a loading="lazy" attribute on them. Removed on 2024-11-25 21:08:16
		] ) as $image
	) {

		// Count "1" for a portrait image, "2" for a non-portrait image.
		$count = $image->_orientation !== 'portrait' ? $count += 2 : $count += 1;

		$id      = 'image_' . $image->ID;
		$next_id = $gallery_next_ids[ $image->ID ] ?? null;

		// Build <a> link for image.
		if ( $next_id ) {
			// Wrap image in an anchor link to the next section
			$img_with_anchor = sprintf( $anchor_link, $next_id, $image->_html );
			// We still want the lightbox, but clicking the image scrolls. 
			// Usually, you can't have nested links. 
			// The user said "when you click one section, you are taken to the next section".
			// If I replace the lightbox link with the anchor link, the lightbox won't work on click.
			// But maybe that's what they want for these "sections".
			$html .= sprintf( '<div id="%s">%s</div>', $id, $img_with_anchor );
		} else {
			$html .= sprintf( $link, $image->_lightbox, $id, $image->_html );
		}

		// If the current image is a portrait and the next image is a portrait and we have only added 1 image to this row...
//		if ( $image->_orientation === 'portrait' && $image->_next_orientation === 'portrait' && $count < 2 && ! $image->_last ) {
//			// Insert <hr> tag and continue to get the next image in loop before closing "row" div.
//			$html .= $hr;
//			continue;
//		}

		// Build "row" div.
		printf( $row, $html );

		// Display <hr> between images.
		echo $hr;

		// Reset $count and $html.
		$count = 0;
		$html  = '';
	}
	?>
</div>
<!-- /Display Images from Collection -->