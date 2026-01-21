<?php
$content = $args['content'] ?? '';
$id      = $args['id'] ?? '';
$next_id = $args['next_id'] ?? null;
?>
<div id="<?php echo esc_attr( $id ); ?>" class="default-width default-padding-x default-margin-b">
	<?php if ( $next_id ): ?>
	<a href="#<?php echo esc_attr( $next_id ); ?>" class="block hover:opacity-90 transition-opacity">
		<?php endif; ?>
		<div class="mx-auto flex w-full flex-col items-center space-y-4">
			<div
				class="prose max-w-xl w-full prose-figure:bg-white prose-figure:px-4 prose-figure:py-4 prose-figure:pb-4 prose-img:my-0 prose-img:shadow prose-figure:shadow prose-figure:md:-mx-12 prose-figcaption:text-center prose-figcaption:pb-2 prose-figcaption:pt-5 prose-a:font-normal prose-h1:text-3xl prose-figcaption:font-handwriting prose-figcaption:text-xl prose-figcaption:text-slate-600 prose-figure:rounded prose-figcaption:leading-none">
				<?php echo $content; ?>
			</div>
		</div>
		<?php if ( $next_id ): ?>
	</a>
<?php endif; ?>
</div>