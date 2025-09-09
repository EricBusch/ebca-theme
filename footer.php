</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>
<!-- / div#content -->

<?php do_action( 'tailpress_content_after' ); ?>

<footer class="bg-white shadow-inner border-t border-gray-200 text-gray-900 text-sans" id="colophon" role="contentinfo">

	<?php do_action( 'tailpress_footer' ); ?>

    <div class="default-width default-padding-x py-12">
        <div class="flex flex-col sm:flex-row items-center justify-between">
            <div class="flex flex-col space-y-1 text-center sm:text-left">
                <div class="font-heading uppercase tracking-widest text-sm">
					<?php echo get_bloginfo( 'name' ); ?> • Fine Art Photography
                </div>
                <div class="text-xs text-gray-600">
                    &copy; <?php echo date_i18n( 'Y' ); ?> • All Rights Reserved
                </div>
            </div>
            <div class="flex flex-row items-center justify-center space-x-3 sm:justify-end">
				<?php if ( $instagram_url = get_field( 'instagram_url', 'option' ) ) : ?>
                    <a href="<?php echo esc_url( $instagram_url ); ?>" class="py-2 leading-none sm:py-1.5"
                       target="_blank" rel="noopener">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-gray-500"
                             viewBox="0 0 448 512">
                            <path
                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                        </svg>
                    </a>
				<?php endif; ?>
				<?php if ( $contact_email = get_field( 'contact_email', 'option' ) ) : ?>
                    <a href="<?php echo antispambot( 'mailto:' . $contact_email ); ?>"
                       class="py-2 leading-none sm:py-1.5" target="_blank" rel="noopener">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-gray-500"
                             viewBox="0 0 512 512">
                            <path
                                    d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                        </svg>
                    </a>
				<?php endif; ?>
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
