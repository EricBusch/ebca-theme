<article id="post-<?php the_ID(); ?>" <?php post_class( 'default-width default-padding-x default-margin-b' ); ?>>
	<div class="mx-auto flex w-full flex-col items-center space-y-4">
		<h2 class="font-heading text-base font-medium uppercase tracking-xl text-gray-900"><?php esc_html_e( get_the_title() ); ?></h2>
		<div class="inline-block h-px w-full max-w-xs rounded-full bg-gradient-to-r from-transparent via-slate-300 to-transparent">
		</div>
		<div
			class="prose max-w-xl prose-figure:bg-white prose-figure:px-4 prose-figure:py-4 prose-figure:pb-4 prose-img:my-0 prose-img:shadow prose-figure:shadow prose-figure:md:-mx-12 prose-figcaption:text-center prose-figcaption:pb-2 prose-figcaption:pt-5 prose-a:font-normal prose-h1:text-3xl prose-figcaption:font-handwriting prose-figcaption:text-xl prose-figcaption:text-slate-600 prose-figure:rounded prose-figcaption:leading-none">
			<?php the_content(); ?>
		</div>
</article>
