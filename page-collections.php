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

		<section class="default-width default-padding-x default-margin-b">
			<div class="max-w-3xl mx-auto grid grid-cols-1 gap-6">
				<?php foreach ( busch_get_collections() as $collection ) : ?>

					<?php $new_images = busch_get_new_image_ids_for_collection( $collection->ID, get_field( 'image_new_in_days', 'option' ) ); ?>
					<?php $image_count = busch_get_image_count_for_collection( $collection->ID ); ?>

					<a href="<?php echo esc_url( get_permalink( $collection->ID ) ); ?>"
					   title="View images in this collection"
					   class="flex flex-row items-center p-4 bg-white shadow gap-4">

						<div class="w-40 shrink-0">
							<img src="<?php echo get_the_post_thumbnail_url( $collection->ID, 'medium' ); ?>"
							     alt="Thumbnail for image collection"
							     class="aspect-video object-cover shadow"
							/>
						</div>

						<div class="flex flex-col text-sm">

							<h3 class="font-medium uppercase tracking-wider p-0 m-0 leading-none font-heading">
								<?php esc_html_e( $collection->post_title ); ?>
							</h3>

							<div class="capitalize mt-2 font-sans text-gray-500 text-xs">
								<?php esc_html_e( $image_count ); ?>
								<?php echo $image_count === 1 ? 'image' : 'images'; ?>
								<?php if ( is_array( $new_images ) && count( $new_images ) > 0 ) : ?>
									<span
										class="bg-teal-100 text-teal-600 font-black px-1 py-0.5 leading-none rounded-sm uppercase text-2xs">
										new
									</span>
								<?php endif; ?>
							</div>

							<div class="font-sans text-gray-500 text-xs">
								Updated <?php esc_html_e( date( 'F Y', strtotime( $collection->post_modified ) ) ); ?>
							</div>
						</div>
					</a>

				<?php endforeach; ?>
			</div>
		</section>

		<div class="h-96 flex flex-row items-end"></div>

		<?php get_template_part( 'template-parts/heading', null, [
			'title' => get_the_title(),
			'text'  => strip_tags( get_the_content(), [ 'a', 'strong', 'em', ] ),
		] ); ?>

		<!-- List of Collections -->
		<section class="default-width default-padding-x default-margin-b">
			<div
				class="grid grid-cols-1 gap-6 font-heading sm:grid-cols-2 sm:gap-8 md:gap-8 lg:grid-cols-3 lg:gap-10 xl:gap-12">
				<?php foreach ( busch_get_collections() as $collection ) : ?>
					<?php $new_images = busch_get_new_image_ids_for_collection( $collection->ID, get_field( 'image_new_in_days', 'option' ) ); ?>
					<a href="<?php echo esc_url( get_permalink( $collection->ID ) ); ?>"
					   title="View images in this collection"
					   class="flex flex-col bg-white pt-8 px-8 pb-6 shadow space-y-4">
						<div class="flex flex-col text-xs text-gray-600">

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

							<div class="capitalize mt-1 font-sans text-gray-500">
								<?php $image_count = busch_get_image_count_for_collection( $collection->ID ); ?>
								<?php esc_html_e( $image_count ); ?>
								<?php echo $image_count === 1 ? 'image' : 'images'; ?>
								<?php if ( is_array( $new_images ) && count( $new_images ) > 0 ) : ?>
									<span
										class="bg-teal-100 text-teal-600 font-black px-1 py-0.5 leading-none rounded-sm uppercase text-2xs">new</span>
								<?php endif; ?>
							</div>

							<div class="font-sans text-gray-500">
								Updated <?php esc_html_e( date( 'F Y', strtotime( $collection->post_modified ) ) ); ?>
							</div>


							<div class="hidden">
								<div
									class="mb-1 p-0 text-sm font-semibold uppercase leading-none tracking-wider">
									<?php esc_html_e( $collection->post_title ); ?>
									<?php if ( $collection->post_status !== 'publish' ) : ?>
										<span
											class="inline-flex items-center rounded-full bg-red-100 px-1.5 py-0.5 text-xs font-medium text-red-700 tracking-tight font-sans lowercase">
												<?php esc_html_e( $collection->post_status ); ?>
											</span>
									<?php endif; ?>
								</div>
								<div
									class="m-0 p-0 text-xs uppercase leading-none tracking-wider text-gray-500">
									<?php $image_count = busch_get_image_count_for_collection( $collection->ID ); ?>
									<?php esc_html_e( $image_count ); ?>
									<?php echo $image_count === 1 ? 'image' : 'images'; ?>
								</div>
								<?php $new_images = busch_get_new_image_ids_for_collection( $collection->ID ); ?>
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
