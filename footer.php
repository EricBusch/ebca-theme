</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>
<!-- / div#content -->

<?php do_action( 'tailpress_content_after' ); ?>

<footer class="bg-white shadow-inner border-t border-gray-200 text-gray-600 text-sans" id="colophon" role="contentinfo">

	<?php do_action( 'tailpress_footer' ); ?>

	<div class="default-width default-padding-x py-12">
		<div class="flex flex-row items-center justify-between">
			<div class="flex flex-col space-y-1">
				<div class="font-heading uppercase tracking-widest text-sm"><?php echo get_bloginfo( 'name' ); ?> Photography</div>
				<div class="text-xs">&copy; <?php echo date_i18n( 'Y' ); ?> &bull; All Rights Reserved</div>
			</div>
			<div class="flex flex-col space-x-2">
				icons
			</div>
		</div>
	</div>

	<div class="bg-gradient-to-r from-gray-700 via-gray-700/90 to-gray-700 text-white text-opacity-80 text-lg font-handwriting tracking-wide w-full p-3">
		<p class="text-center">
			Website designed and developed by
			<a href="<?php echo get_bloginfo( 'url' ); ?>" class="underline">Eric</a>
		</p>
	</div>

</footer>

</div>
<!-- /div#page -->

<?php wp_footer(); ?>

</body>
</html>
