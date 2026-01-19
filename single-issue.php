<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : ?>

        <?php the_post(); ?>

        <?php
        // Issue
        $issue_number = (int) get_field( 'issue_number' );
        $guest        = get_field( 'guest' );
        ?>

        <?php get_template_part( 'template-parts/heading', null, [
                'title' => 'Double Exposure',
                'text'  => 'Issue ' . esc_html( $issue_number ) . ' &mdash; Featuring ' . esc_html( $guest ),
        ] ); ?>

        <article class="max-w-6xl mx-auto mb-20 px-0 sm:px-6 space-y-12 sm:space-y-20 flex flex-col">

            <?php if ( have_rows( 'images' ) ) : ?>
                <?php while ( have_rows( 'images' ) ) : ?>
                    <?php the_row(); ?>

                    <?php
                    // Image from Issue repeater
                    $image    = get_sub_field( 'image' );
                    $title    = get_sub_field( 'title' );
                    $thoughts = get_sub_field( 'thoughts' );

                    // Photographer post object
                    $photographer = get_sub_field( 'photographer' );
                    ?>

                    <?php if ( $photographer ) : ?>

                        <?php
                        // Photographer ACF fields
                        $name  = get_field( 'name', $photographer->ID );
                        $bio   = get_field( 'bio', $photographer->ID );
                        $links = get_field( 'links', $photographer->ID );
                        $is_me = boolval( get_field( 'is_me', $photographer->ID ) );
                        ?>

                        <div class="flex flex-col gap-6 lg:gap-7">
                            <a href="<?php echo esc_url( $image['url'] ); ?>"
                               class="flex flex-row items-center justify-center"
                               title="View larger"
                               data-fslightbox>
                                <?php
                                echo wp_get_attachment_image(
                                        $image['ID'],
                                        'full',
                                        false,
                                        [
                                                'class'    => 'border-4 border-white sm:shadow-lg max-h-[88vh] w-auto',
                                                'alt'      => esc_attr( $image['alt'] ?? 'Image by ' . $name ),
                                                'loading'  => 'eager',
                                                'decoding' => 'async',
                                        ]
                                );
                                ?>
                            </a>
                            <div class="grid grid-cols-1 md:grid-cols-5 px-6">
                                <div class="col-span-1 md:col-span-3 bg-white p-6 sm:p-12">
                                    <?php if ( ! empty( $thoughts ) ) : ?>
                                        <div class="prose prose-base">
                                            <?php echo wp_kses_post( $thoughts ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-span-1 md:col-span-2 bg-gray-200/40 p-6 sm:p-12">
                                    <div class="flex flex-col space-y-6">

                                        <?php if ( ! empty( $title ) ) : ?>
                                            <div class="flex flex-col" title="Image title">
                                                <span class="uppercase text-xs tracking-wide text-gray-500/80">Image</span>
                                                <h2 class="font-semibold text-base text-gray-600 italic">
                                                    <?php echo esc_html( $title ); ?>
                                                </h2>
                                            </div>
                                        <?php endif; ?>

                                        <div class="flex flex-col" title="Photographer">
                                            <span class="uppercase text-xs tracking-wide text-gray-500/80">Photographer</span>
                                            <h2 class="font-semibold text-base text-gray-600">
                                                <?php echo esc_html( $name ); ?>
                                            </h2>
                                            <?php if ( ! empty( $bio ) ) : ?>
                                                <div class="photographer-bio mt-1 text-gray-600/90 text-sm">
                                                    <?php echo wp_kses_post( $bio ); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ( $links ) : ?>
                                                <div class="flex-row items-center space-x-1.5 mt-2">
                                                    <?php foreach ( $links as $link ) : ?>
                                                        <a href="<?php echo esc_url( $link['url'] ); ?>"
                                                           target="_blank"
                                                           title="Visit <?php echo esc_attr( $link['channel']['label'] ); ?>"
                                                           rel="noopener"
                                                           class="rounded-full bg-gray-600 px-2.5 py-1 text-xs font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 dark:bg-gray-500 dark:shadow-none dark:hover:bg-gray-400 dark:focus-visible:outline-gray-500">
                                                            <?php echo esc_html( $link['channel']['label'] ); ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <p class="text-gray-500/80 text-xs">
                                            Image copyright &copy; <?php echo esc_html( $name ); ?>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        /**
                         * Divider
                         * <div class="sep max-w-3xl mx-auto px-6 bg-gradient-to-r from-transparent via-gray-300 to-transparent h-px w-3/4"></div>
                         */
                        ?>

                    <?php endif; // if ( $photographer ) : ?>
                <?php endwhile; // while ( have_rows( 'images' ) )  ?>
            <?php endif; // if ( have_rows( 'images' ) ) ?>

        </article>


        <div class="py-24 bg-gray-200/80">
            <div class="prose max-w-3xl mx-auto px-6 lg:px-0 text-gray-600">
                <h3 class="text-gray-600">What is Double Exposure?</h3>
                <p>
                    Double Exposure is a free, bi-weekly email from me. Each issue includes two photos – one of mine and
                    one
                    by a guest photographer – plus a short note on each image.
                </p>
                <p>
                    It’s free to join and you can unsubscribe at any time.
                </p>
                <p>
                    <a href="/double-exposure">Learn more</a>
                    /
                    <a href="/double-exposure">Subscribe</a>
                </p>
            </div>
        </div>

    <?php endwhile; // while ( have_posts() ) ?>
<?php endif; // if ( have_posts() ) ?>

<?php get_footer(); ?>
