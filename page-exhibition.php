<?php
/*
 * Template Name: Galeria Exhibition
 * description: >-
  Template Exhibition
 */

get_header('exhibition'); ?>

    <svg class="hidden">
        <symbol id="icon-arrow" viewBox="0 0 24 24">
            <title>arrow</title>
            <polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
        </symbol>
        <symbol id="icon-drop" viewBox="0 0 24 24">
            <title>drop</title>
            <path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
        </symbol>
        <symbol id="icon-menu" viewBox="0 0 24 24">
            <title>menu</title>
            <path d="M24,5.8H0v-2h24V5.8z M19.8,11H4.2v2h15.6V11z M24,18.2H0v2h24V18.2z"/>
        </symbol>
        <symbol id="icon-cross" viewBox="0 0 24 24">
            <title>cross</title>
            <path d="M13.4,12l7.8,7.8l-1.4,1.4l-7.8-7.8l-7.8,7.8l-1.4-1.4l7.8-7.8L2.7,4.2l1.4-1.4l7.8,7.8l7.8-7.8l1.4,1.4L13.4,12z"/>
        </symbol>
        <symbol id="icon-info" viewBox="0 0 20 20">
            <title>info</title>
            <circle style="fill:#fff" cx="10" cy="10" r="9.1"/>
            <path d="M10,0C4.5,0,0,4.5,0,10s4.5,10,10,10s10-4.5,10-10S15.5,0,10,0z M10,18.6c-4.7,0-8.6-3.9-8.6-8.6S5.3,1.4,10,1.4s8.6,3.9,8.6,8.6S14.7,18.6,10,18.6z M10.7,5C10.9,5.2,11,5.5,11,5.7s-0.1,0.5-0.3,0.7c-0.2,0.2-0.4,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3C9.1,6.2,9,6,9,5.7S9.1,5.2,9.3,5C9.5,4.8,9.7,4.7,10,4.7C10.3,4.7,10.5,4.8,10.7,5z M9.3,8.3h1.4v7.2H9.3V8.3z"/>
        </symbol>
    </svg>

    <?php
        $loop = new WP_Query( array(
            'post_type' => 'exposicao',
            'posts_per_page' => -1
            )
        );

        $postAtual = get_the_ID();
        $postAutor = the_author_meta('id');
    ?>

    <div class="container">
        <div class="scroller">

            <?php $primeira = 0 ?>
            <!-- Sala -->
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="room <?php echo $addClass = ($primeira == 0) ? 'room--current' : '' ?>">

                    <div class='room__side room__side--left'>
                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                            <?php if ($i < 4) { ?>
                                <?php if( have_rows("obra_$i") ):
                                    while ( have_rows("obra_$i") ) : the_row();
                                        // Imagem
                                        $imagem_post = (is_int(get_sub_field("imagem_$i"))) ? get_sub_field("imagem_$i") : get_sub_field("imagem_$i")['id'];
                                        $size = 'large'; // (thumbnail, medium, large, full or custom size)
                                        echo wp_get_attachment_image( $imagem_post, $size, '', array( "class" => "room__img" ) );
                                    endwhile;
                                endif;
                            }?>
                        <?php } ?>
                    </div>

                    <div class='room__side room__side--back'>
                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                            <?php if( $i == 4 ) { ?>
                                <?php if( have_rows("obra_$i") ):
                                    while ( have_rows("obra_$i") ) : the_row();
                                        // Imagem
                                        $imagem_post = (is_int(get_sub_field("imagem_$i"))) ? get_sub_field("imagem_$i") : get_sub_field("imagem_$i")['id'];
                                        $size = 'large'; // (thumbnail, medium, large, full or custom size)
                                        echo wp_get_attachment_image( $imagem_post, $size, '', array( "class" => "room__img" ) );
                                    endwhile;
                                endif;
                            }?>
                        <?php } ?>
                    </div>

                    <div class='room__side room__side--right'>
                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                            <?php if ($i >= 5 && $i < 9) { ?>
                                <?php if( have_rows("obra_$i") ):
                                    while ( have_rows("obra_$i") ) : the_row();
                                        // Imagem
                                        $imagem_post = (is_int(get_sub_field("imagem_$i"))) ? get_sub_field("imagem_$i") : get_sub_field("imagem_$i")['id'];
                                        $size = 'large'; // (thumbnail, medium, large, full or custom size)
                                        echo wp_get_attachment_image( $imagem_post, $size, '', array( "class" => "room__img" ) );
                                    endwhile;
                                endif; ?>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <div class="room__side room__side--bottom"></div>
                </div>
            <?php endwhile; wp_reset_query(); ?>

        </div>
    </div><!-- /container -->

    <div class="content">
        <header class="codrops-header">
            <div class="codrops-links">
                <a class="codrops-icon codrops-icon--prev" href="<?= home_url(); ?>" title="Voltar a home">
                    <svg class="icon icon--arrow"><use xlink:href="#icon-arrow"></use></svg>
                </a>
                <a class="codrops-icon codrops-icon--drop" href="#" title="Voltar aos artigos">
                    <svg class="icon icon--drop"><use xlink:href="#icon-drop"></use></svg>
                </a>
            </div>

            <!-- NOME DA PÁGINAS -->
            <h1 class="codrops-header__title"><?= get_the_title($postAtual) ?></h1>

            <!-- Logo -->
            <div class="subject logotipo">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/Exhibition/img/img-logo-crio-art-black.png" alt="Logo Crio.art">
            </div>

            <!-- SOBRE A PÁGINA -->
            <button class="btn btn--info btn--toggle">
                <svg class="icon icon--info"><use xlink:href="#icon-info"></use></svg>
                <svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg>
            </button>

            <!-- MENU SUPERIOR DIREITO -->
            <button class="btn btn--menu btn--toggle">
                <svg class="icon icon--menu"><use xlink:href="#icon-menu"></use></svg>
                <svg class="icon icon--cross"><use xlink:href="#icon-cross"></use></svg>
            </button>
            <div class="overlay overlay--menu">
                <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'exhibition_menu',
                        'menu_class'        => 'menu',
                        'link_before'       => '<li class="menu__item">',
                        'link_after'        => '</li>',
                        'depth'             => 1,
                    ));
                ?>
            </div>

            <!-- SOBRE A PÁGINA | TXT -->
            <div class="overlay overlay--info">
                <p class="info"><?= wp_filter_nohtml_kses( get_the_content('','',$postAtual) ); ?></p>
            </div>

        </header>

        <!-- CONTEUDO DO SLIDE -->
        <div class="slides">

            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="slide">
                <a href="<?= esc_url(get_permalink()) ?>">
                    <h2 class="slide__name"><?= the_title() ?></h2>
                </a>
                <h3 class="slide__title">
                    <?php if( get_field("nomes_dos_artistas") ): ?>
                        <span><?= get_field("nomes_dos_artistas")[0]->post_title; ?></span>
                    <?php endif; ?>
                    <div class="slide__number">
                        <?php
                        $field = get_field_object( 'nomes_dos_curadores' );
                        $curadores = array();

                        if( have_rows('nomes_dos_curadores') ):
                            while( have_rows('nomes_dos_curadores') ): the_row(); 
                                $id = get_row();
                                array_push($curadores, $field['choices'][$id]);
                            endwhile;
                        endif; ?>
                        Curadoria: <?php echo implode( ', ', $curadores ); ?>
                    </div>
                </h3>
                <p class="slide__date"><?php setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Sao_Paulo');

                        // Abertura
                        $dataAbertura = str_replace("/", "-", get_field("abertura") );
                        echo strftime('%d %b %Y', strtotime($dataAbertura));
                    ?> até <?php // Final
                        $dataFinal = str_replace("/", "-", get_field("exposicao") );
                        echo strftime('%d %b %Y', strtotime($dataFinal));
                    ?></p>
                <!-- Autor da Postagem -->
                <div class="slide__author">Por
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <span class="avatar__author">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 22 ); ?>
                    </span>
                    <?php the_author() ?></a>
                </div>
            </div>

            <?php endwhile; wp_reset_query(); ?>

        </div>

        <!-- NAVEGAÇÃO -->
        <nav class="nav">
            <button class="btn btn--nav btn--nav-left">
                <svg class="nav-icon nav-icon--left" width="42px" height="12px" viewBox="0 0 70 20">
                    <path class="nav__triangle" d="M52.5,10L70,0v20L52.5,10z"/>
                    <path class="nav__line" d="M55.1,11.4H0V8.6h55.1V11.4z"/>
                </svg>
            </button>
            <button class="btn btn--nav btn--nav-right">
                <svg class="nav-icon nav-icon--right" width="42px" height="12px" viewBox="0 0 70 20">
                    <path class="nav__triangle" d="M52.5,10L70,0v20L52.5,10z"/>
                    <path class="nav__line" d="M55.1,11.4H0V8.6h55.1V11.4z"/>
                </svg>
            </button>
        </nav>
    </div><!-- /content -->

    <div class="overlay overlay--loader overlay--active">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

<?php get_footer('exhibition'); ?>