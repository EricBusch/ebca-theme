<?php get_header(); ?>
<div>
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<?php get_template_part( 'template-parts/heading', null, [
				'title' => get_the_title(),
				'text'  => strip_tags( get_the_content(), [ 'a', 'strong', 'em', ] ),
			] ); ?>

			<?php if ( have_rows( 'flexible_content' ) ): ?>
				<?php while ( have_rows( 'flexible_content' ) ): ?>

					<?php the_row(); ?>

					<?php if ( get_row_layout() === 'text' ): ?>
						<?php get_template_part( 'template-parts/collection-flexible-content', 'text', [
							'content' => get_sub_field( 'content' ),
						] ); ?>
					<?php endif; ?>

					<?php if ( get_row_layout() === 'gallery' ): ?>
						<?php get_template_part( 'template-parts/collection-flexible-content', 'gallery', [
							'attachment_ids' => array_map( function ( $image ) {
								return absint( $image['attachment_id'] );
							}, get_sub_field( 'images' ) ),
						] ); ?>
					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>


			<!-- Collection Pagination -->
			<?php $prev = busch_get_prev_collection( get_the_ID() ); ?>
			<?php $next = busch_get_next_collection( get_the_ID() ); ?>
			<section class="default-margin-b">
				<div
					class="mx-auto flex flex-col items-center justify-center gap-4 px-8 text-xs uppercase tracking-wider text-gray-500 sm:px-10 sm:text-sm md:text-xs lg:text-sm md:px-12 lg:max-w-6xl md:flex-row">

					<!-- Previous Collection -->
					<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" title="View previous collection"
					   class="group flex w-full flex-row items-center justify-between space-x-4 bg-white p-1.5 shadow
						transition duration-300 hover:bg-transparent hover:text-gray-900 hover:shadow-none lg:w-1/2">
						<div
							class="rounded-full bg-white p-2 transition group-hover:-translate-x-0.5 group-hover:shadow">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="mr-auto h-5 w-5 fill-gray-500 group-hover:fill-gray-900" viewBox="0 0 320 512">
								<path
									d="M-1.9 256l17-17L207 47l17-17L257.9 64 241 81 65.9 256 241 431l17 17L224 481.9l-17-17L15 273l-17-17z"/>
							</svg>
						</div>
						<div class="flex flex-row items-center space-x-4">
							<div class="truncate whitespace-nowrap"><?php esc_html_e( $prev->post_title ); ?></div>
							<?php echo get_the_post_thumbnail(
								$prev->ID,
								'medium',
								[
									'class' => 'aspect-square w-auto h-10 shrink-0 object-cover group-hover:shadow sm:aspect-video sm:h-16 md:h-12 lg:h-16',
									'alt'   => esc_attr( $prev->post_title . ' Collection Image' ),
								]
							); ?>
						</div>
					</a>
					<!-- /Previous Collection -->

					<!-- Next Collection -->
					<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" title="View next collection"
					   class="group flex w-full flex-row items-center justify-between space-x-4 bg-white p-1.5 shadow transition duration-300 hover:bg-transparent hover:text-gray-900 hover:shadow-none lg:w-1/2">
						<div class="flex flex-row items-center space-x-4">
							<?php echo get_the_post_thumbnail(
								$next->ID,
								'medium',
								[
									'class' => 'aspect-square w-auto h-10 shrink-0 object-cover group-hover:shadow sm:aspect-video sm:h-16 md:h-12 lg:h-16',
									'alt'   => esc_attr( $next->post_title . ' Collection Image' ),
								]
							); ?>
							<div class="truncate whitespace-nowrap"><?php esc_html_e( $next->post_title ); ?></div>
						</div>
						<div
							class="rounded-full bg-white p-2 transition group-hover:translate-x-0.5 group-hover:shadow">
							<svg xmlns="http://www.w3.org/2000/svg"
							     class="mr-auto h-5 w-5 fill-gray-500 group-hover:fill-gray-900" viewBox="0 0 320 512">
								<path
									d="M321.9 256l-17 17L113 465l-17 17L62.1 448l17-17 175-175L79 81l-17-17L96 30.1l17 17L305 239l17 17z"/>
							</svg>
						</div>
					</a>
					<!-- /Next Collection -->

				</div>
			</section>
			<!-- /Collection Pagination -->

		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
