<?php
$title  = str_replace( 'Private: ', '', $args['title'] ?? '' );
$text   = $args['text'] ?? '';
$status = get_post_status();
?>
<!-- Heading -->
<section id="heading" class="default-width default-padding-x default-margin-b ">
	<div class="mx-auto flex w-full max-w-xl flex-col items-center space-y-4">
		<?php if ( $title ) : ?>
			<div class="flex flex-row items-center space-x-2">
				<?php if ( $status === 'private' )  : ?>
					<svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 3-2.5 fill-red-500" viewBox="0 0 448 512">
						<path
							d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h80V512H0V192H80z"></path>
					</svg>
				<?php endif; ?>
				<h1 class="font-heading text-base font-medium uppercase tracking-xl text-gray-900 text-center">
					<?php echo $title; ?>
				</h1>
			</div>
		<?php endif; ?>
		<?php if ( $text ) : ?>
			<div
				class="inline-block h-px w-full max-w-xs rounded-full bg-gradient-to-r from-transparent via-slate-300 to-transparent"></div>
			<p class="text-center font-sans leading-7 text-gray-600">
				<?php echo $text; ?>
			</p>
		<?php endif; ?>
	</div>
</section>
<!-- /Heading -->