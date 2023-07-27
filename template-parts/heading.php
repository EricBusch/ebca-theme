<?php
$title = $args['title'] ?? '';
$text  = $args['text'] ?? '';
?>
<!-- Heading -->
<section id="heading" class="default-width default-padding-x default-margin-b ">
	<div class="mx-auto flex w-full max-w-xl flex-col items-center space-y-4">
		<?php if ( $title ) : ?>
			<h1 class="font-heading text-base font-medium uppercase tracking-xl text-gray-900">
				<?php echo $title; ?>
			</h1>
		<?php endif; ?>
		<div
			class="inline-block h-px w-full max-w-xs rounded-full bg-gradient-to-r from-transparent via-slate-300 to-transparent"></div>
		<?php if ( $text ) : ?>
			<p class="text-center font-sans leading-7 text-gray-600">
				<?php echo $text; ?>
			</p>
		<?php endif; ?>
	</div>
</section>
<!-- /Heading -->