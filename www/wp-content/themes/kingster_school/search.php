<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kingster_school
 */
get_header();
?>
    <div class="container">
        <div class="search-wrap">
            <?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <h2 class="page-title">
                        <?php
                        printf( esc_html__( 'Search Results for: "%s"', 'kingster-school' ), '<span id="keyword">' . get_search_query() . '</span>' );
                        ?>
                    </h2>
                </header>
                <?php
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', 'search' );

                endwhile;

                the_posts_navigation();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
        </div>
    </div>
<?php
get_sidebar();
get_footer();
