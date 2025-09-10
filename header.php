<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php include_once get_template_directory() . '/head.php'; ?>

<body <?php body_class( 'bg-gradient-to-b from-gray-50 to-gray-100 bg-fixed font-sans' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<!-- div#page -->
<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

    <header>

        <!-- Navigation -->
        <section class="border-b border-gray-200 bg-white default-margin-b">
            <div
                    class="flex flex-col items-start py-6 sm:flex-row sm:items-center sm:justify-between sm:py-12 default-width default-padding-x">

                <!-- Site Title -->
                <div class="w-full sm:w-3/12">
                    <h1 class="text-center sm:text-left">
                        <a href="<?php echo get_bloginfo( 'url' ); ?>"
                           title="Return to homepage"
                           class="font-heading text-xl font-normal uppercase tracking-lg text-gray-700">
                            <span>Eric</span><span class="font-semibold">Busch</span>
                        </a>
                    </h1>
                </div>
                <!-- /Site Title -->

                <!-- Primary Menu -->
                <div class="w-full sm:w-6/12">
					<?php wp_nav_menu( [
						'container_id'   => 'primary-menu',
						'menu_class'     => 'flex flex-row items-center justify-center space-x-5 font-heading text-sm uppercase tracking-lg sm:mt-0 sm:space-x-3 sm:tracking-widest md:space-x-8 md:tracking-lg',
						'theme_location' => 'primary',
					] ); ?>
                </div>
                <!-- /Primary Menu -->

                <!-- Contact Icons -->
                <div class="w-full sm:w-3/12">
                    <div class="flex flex-row items-center justify-center space-x-3 sm:justify-end">
						<?php if ( $instagram_url = get_field( 'instagram_url', 'option' ) ) : ?>
                            <a href="<?php echo esc_url( $instagram_url ); ?>" class="py-2 leading-none sm:py-1.5"
                               target="_blank" rel="noopener">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-gray-500"
                                     viewBox="0 0 448 512">
                                    <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                </svg>
                            </a>
						<?php endif; ?>
						<?php echo do_shortcode( '[email class="py-2 leading-none sm:py-1.5"]<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-gray-500" viewBox="0 0 512 512"><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>[/email]' ); ?>
                    </div>
                </div>
                <!-- /Contact Icons -->

            </div>
        </section>
        <!-- /Navigation -->

    </header>

    <!-- div#content -->
    <div id="content" class="site-content flex-grow">
		<?php do_action( 'tailpress_content_start' ); ?>
        <main>
