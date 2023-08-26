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
					<?php $new_images = busch_get_new_image_ids_for_collection( $collection->ID, get_field( 'image_new_in_days', 'option' ) ); ?>
					<a href="<?php echo esc_url( get_permalink( $collection->ID ) ); ?>"
					   title="View images in this collection"
					   class="grid grid-cols-1 grid-rows-6 gap-2 aspect-square bg-white pt-8 px-8 pb-4 shadow">
						<div
							class="row-span-4 flex h-full w-full flex-row items-start justify-start space-x-1 font-normal text-white bg-cover bg-center bg-no-repeat bg-blend-multiply shadow saturate-[.15]"
							style="background-image: url(<?php echo get_the_post_thumbnail_url( $collection->ID, 'large' ); ?>);">
						</div>
						<div class="row-span-2 flex flex-row items-center h-full">
							<div class="flex flex-col space-y-1">
								<div
									class="m-0 p-0 font-semibold uppercase leading-none tracking-wider">
									<?php esc_html_e( $collection->post_title ); ?>
									<?php if ( $collection->post_status !== 'publish' ) : ?>
										<span
											class="inline-flex items-center rounded-full bg-red-100 px-1.5 py-0.5 text-xs font-medium text-red-700 tracking-tight font-sans lowercase">
												<?php esc_html_e( $collection->post_status ); ?>
											</span>
									<?php endif; ?>
								</div>
								<div
									class="m-0 p-0 text-sm uppercase leading-none tracking-wider text-gray-500">
									<?php $image_count = busch_get_image_count_for_collection( $collection->ID ); ?>
									<?php esc_html_e( $image_count ); ?>
									<?php echo $image_count === 1 ? 'image' : 'images'; ?>
								</div>
								<?php if ( is_array( $new_images ) && count( $new_images ) > 0 ) : ?>
									<div>
											<span
												class="mt-1 inline-flex items-center rounded-md border border-gray-400 px-1.5 py-0.5 text-xs font-medium text-gray-200 shadow">
												<?php esc_html_e( count( $new_images ) ); ?> new
											</span>
									</div>
								<?php endif; ?>
								<div
									class="text-xs uppercase leading-none tracking-wider text-gray-500">
									Updated <?php esc_html_e( date( 'F Y', strtotime( $collection->post_modified ) ) ); ?>
								</div>
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
