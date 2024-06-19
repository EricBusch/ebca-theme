<?php get_header(); ?>
<div>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/heading', null, [
				'title' => get_the_title(),
				'text'  => strip_tags( get_the_content(), [ 'a', 'strong', 'em', ] ),
			] ); ?>
		<?php endwhile; ?>

		<!-- List of Collections -->
		<section class="default-width default-padding-x default-margin-b">
			<div
				class="grid grid-cols-1 gap-6 font-heading sm:grid-cols-2 sm:gap-8 md:gap-8 lg:grid-cols-3 lg:gap-10 xl:gap-12">
				<?php foreach ( busch_get_collections() as $collection ) : ?>

					<?php $image_count = busch_get_image_count_for_collection( $collection->ID ); ?>
					<?php $new_images = busch_get_newest_attachment_ids_for_collection( $collection->ID, get_field( 'image_new_in_days', 'option' ) ); ?>

					<a href="<?php echo esc_url( get_permalink( $collection->ID ) ); ?>"
					   title="View images in this collection"
					   class="flex flex-col bg-white pt-8 px-8 pb-6 shadow space-y-4 text-sky-600 visited:text-gray-500">
						<div class="flex flex-col text-xs ">

							<img src="<?php echo get_the_post_thumbnail_url( $collection->ID, 'large' ); ?>"
							     alt="Thumbnail for image collection"
							     class="aspect-square object-cover shadow"
							/>

							<h3 class="flex flex-row items-center space-x-1 mt-4 font-medium uppercase tracking-wider">
								<?php if ( $collection->post_status !== 'publish' ) : ?>
									<span title="<?php esc_attr_e( $collection->post_status ); ?>">
										<svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5 fill-red-500"
										     viewBox="0 0 448 512"><path
												d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h80V512H0V192H80z"/></svg>
									</span>
								<?php endif; ?>
								<span class="p-0 m-0 leading-none">
									<?php esc_html_e( $collection->post_title ); ?>
								</span>
							</h3>

							<div class="capitalize mt-2 font-sans text-gray-500">

								<?php esc_html_e( $image_count ); ?>
								<?php echo $image_count === 1 ? 'image' : 'images'; ?>
								<?php if ( is_array( $new_images ) && count( $new_images ) > 0 ) : ?>
									<span
										class="bg-teal-100 text-teal-600 font-black px-1 py-0.5 leading-none rounded-sm uppercase text-2xs"><?php esc_html_e( count( $new_images ) ); ?> new</span>
								<?php endif; ?>
							</div>

							<div class="font-sans text-gray-500">
								Updated <?php esc_html_e( date( 'F Y', strtotime( $collection->post_modified ) ) ); ?>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</section>
		<!-- /List of Collections -->
	<?php endif; ?>
</div>
<?php get_footer(); ?>
