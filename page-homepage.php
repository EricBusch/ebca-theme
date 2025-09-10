<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php include_once get_template_directory() . '/head.php'; ?>
<body>
<div
        class="grid h-screen grid-cols-1 grid-rows-3 bg-black bg-opacity-40 bg-cover bg-center bg-no-repeat text-white bg-blend-multiply"
        style="background-image: url(<?php echo ebca_get_homepage_bg_image( '2048x2048' ); ?>);">

    <div class="mx-auto w-full py-12 pl-[12vw]">
        <h1 class="opacity-90 text-2xl drop-shadow  font-heading font-normal uppercase tracking-lg text-white">
            <span>Eric</span><span class="font-semibold">Busch</span>
        </h1>
    </div>

    <div class="mx-auto w-full pl-[12vw]">
        <div class="flex h-full flex-col items-start justify-center">
            <h1 class="m-0 flex flex-col space-y-1 p-0 font-heading     uppercase leading-none sm:space-y-0">
				<?php if ( $heading_one = get_field( 'heading_one' ) ) : ?>
                    <span class="m-0 p-0 text-lg leading-none tracking-widest drop-shadow sm:text-xl">
						<?php esc_html_e( $heading_one ); ?>
					</span>
				<?php endif; ?>
				<?php if ( $heading_two = get_field( 'heading_two' ) ) : ?>
                    <span class="m-0 p-0 text-2xl leading-none tracking-xl drop-shadow sm:text-3xl">
						<?php esc_html_e( $heading_two ); ?>
					</span>
				<?php endif; ?>
            </h1>
            <a href="<?php echo esc_url( get_field( 'button_url' ) ); ?>"
               title="View image collections"
               class="group mt-12 flex transform flex-row items-center space-x-2 bg-black bg-opacity-40 px-12 py-3 font-heading text-sm font-light uppercase tracking-widest shadow-lg ring-1 ring-white ring-opacity-70 transition duration-300 hover:bg-opacity-50 hover:shadow-none hover:ring-opacity-100"
            ><span><?php esc_html_e( get_field( 'button_text' ) ); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4 fill-gray-300 transition group-hover:translate-x-0.5 group-hover:transform"
                     viewBox="0 0 448 512">
                    <path
                            d="M435.3 267.3L446.6 256l-11.3-11.3-168-168L256 65.4 233.4 88l11.3 11.3L385.4 240 16 240 0 240l0 32 16 0 369.4 0L244.7 412.7 233.4 424 256 446.6l11.3-11.3 168-168z"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="mx-auto w-full pl-[12vw]">
        <div class="flex h-full w-full flex-row items-end justify-start py-12">
            <div class="flex flex-col space-y-2">
                <div class="flex flex-row items-center space-x-3">
					<?php if ( $instagram_url = get_field( 'instagram_url', 'option' ) ) : ?>
                        <a href="<?php echo esc_url( $instagram_url ); ?>" class="py-2 leading-none sm:py-1.5"
                           target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white opacity-80"
                                 viewBox="0 0 448 512">
                                <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                        </a>
					<?php endif; ?>
					<?php if ( $contact_email = get_field( 'contact_email', 'option' ) ) : ?>
                        <a class="ebca-eml py-2 leading-none sm:py-1.5"
                           rel="nofollow noindex"
                           data-eml="<?php echo ebca_convert_email_to_url( $contact_email ); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white opacity-80"
                                 viewBox="0 0 512 512">
                                <path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                            </svg>
                        </a>
					<?php endif; ?>
                </div>
                <div class="text-sm text-white text-opacity-80">
                    &copy;<?php esc_html_e( date_i18n( 'Y' ) ); ?>
					<?php echo get_field( 'fine_print' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>