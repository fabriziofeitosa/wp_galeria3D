<?php
/*
 * Template Name: Galeria 3D
 * description: >-
  Template Galeria 3D
 */

get_header('3dgalleryroom');

$entrada = 0; ?>

    <div class="container">

        <!-- Topo -->
        <div class="codrops-top clearfix">
            <a href="<?= $url = home_url( $path = 'exposicoes-online' ); ?>"><strong>&laquo; Voltar exposições</strong></a>

            <span class="right"><a href="<?= $url = home_url(); ?>"><strong>Ir para a Home</strong></a></span>
        </div><!--/ Codrops top bar -->

        <!-- Rodapé -->
        <h1 class="infor-gallery">
            <!-- Nome da exposição -->
            <?= get_the_title() ?>
            <br>
            <!-- Artistas das obras -->
            <?php if( get_field("nomes_dos_artistas") ): ?>
                <div class="item-artista">
                    <?php
                    $artistas = get_field("nomes_dos_artistas");
                    $qtdArtistas = count($artistas);
                    for ($z=0; $z < $qtdArtistas; $z++) {
                        echo "<span class='item'>";
                        echo $artistas[$z]->post_title;
                        if($z < ($qtdArtistas - 1)) echo ", ";
                        echo "</span>";
                    }
                    ?>
                </div>
            <?php endif; ?>
            <div>
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
            </span>
        </h1>

        <h1 class="direita infor-gallery">
            <?php
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
            ?>
            <!-- Datas -->
            <div>De <span style="text-transform: capitalize;">
                <?php // Abertura
                    $dataAbertura = str_replace("/", "-", get_field("de") );
                    echo strftime('%d %b %Y', strtotime($dataAbertura));
                ?></span>
            </div>
            <div>Até <span style="text-transform: capitalize;">
                <?php // Final
                    $dataFinal = str_replace("/", "-", get_field("ate") );
                    echo strftime('%d %b %Y', strtotime($dataFinal));
                ?></span>
            </div>
            <!-- Autor do Post -->
            <div class="avatar__author">
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID',$author_id)); ?>">Por
                    <?php $author_id = $post->post_author; ?>
                    <span><?php echo get_avatar( get_the_author_meta('ID',$author_id), 22 ); ?></span>
                    <?= get_the_author_meta('display_name',$author_id) ?>
                </a>
            </div>
        </h1>

        <div id="gr-gallery" class="gr-gallery">
            <div class="gr-main">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <?php for ($i = 1; $i <= 20; $i++) { ?>

                        <?php if( have_rows("obra_$i") ):
                            while ( have_rows("obra_$i") ) : the_row();
                                // Imagem
                                $imagem_post = (is_int(get_sub_field("imagem_$i"))) ? get_sub_field("imagem_$i") : get_sub_field("imagem_$i")['id'];
                                $size = 'large'; // (thumbnail, medium, large, full or custom size)

                                // Moldura
                                $molduraFinal = '';
                                if(get_sub_field("moldura_$i") != '') $molduraFinal = get_sub_field("moldura_$i");
                                else $molduraFinal = get_field('molduras') ? get_field('molduras') : 'transparent';

                                // Entradas
                                if( $imagem_post ):
                                    $entrada++;
                                ?>
                                    <figure>
                                        <div class="item-quadro"
                                            data-borda='<?= $molduraFinal ?>'
                                            style="border-color: <?= $molduraFinal ?>;">
                                            <?php echo wp_get_attachment_image( $imagem_post, $size ); ?>

                                            <img class="img-original" src="<?php echo wp_get_attachment_url($imagem_post) ?>" alt="Imagem Original" style="z-index: -9999;position: fixed;top: 10px;left: 10px;">
                                        </div>
                                        <figcaption>
                                            <h2>
                                                <span>
                                                    <?= get_sub_field("titulo_$i") ?><br>
                                                    <?php $artista = get_object_vars(get_sub_field("artista_$i")[0]);
                                                    echo $artista['post_title']; ?><br>
                                                    <?= get_sub_field("tecnica_$i") ?><br>
                                                    <?= get_sub_field("ano_$i") ?><br>
                                                </span>
                                            </h2>
                                            <div>
                                                <p><?php
                                                    if( get_sub_field("obra_a_venda_$i") ) {
                                                        $obraLoja = get_object_vars(get_sub_field("obra_a_venda_$i"));
                                                        echo "<a href='" . $obraLoja['guid'] . "'>Comprar ></a>";
                                                    }
                                                ?></p>
                                            </div>
                                        </figcaption>
                                    </figure>
                                <?php
                                endif;
                            endwhile;
                        else :
                            echo "<span>Nada...</span>";
                        endif; ?>

                    <?php }; ?>

                <?php endwhile; else : ?>
                    <p><?php esc_html_e( 'Desculpa, nenhuma obra foi encontrada!' ); ?></p>
                <?php endif; ?>

            </div>
        </div>
    </div><!-- /container -->

    <!-- The Modal -->
    <div id="modalGallery" class="modalGallery">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="closeModalGallery">&times;</span>
            <img id="imgModalGallery" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/Exhibition/img/img-logo-crio-art-black.png">
        </div>
    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/3DGalleryRoom/js/wallgallery.js"></script>
    <script>
        $(function() {

            Gallery.init( {
                //layout : [3,2,3,2]
                <?php
                function breakPar(int $n)
                {
                    $piece = $n / 4;
                    return floor($piece) . ', ' . ceil($piece) . ', ' . floor($piece) .', ' . ceil($piece);
                }

                function breakImpar(int $n)
                {
                    $piece = ($n - 1) / 4;
                    return floor($piece) . ', ' . ceil($piece) . ', ' . floor($piece) .', ' . (ceil($piece) + 1);
                }

                if ($entrada % 2 == 0) {
                    $result = breakPar($entrada);
                } else {
                    $result = breakImpar($entrada);
                }

                echo "layout : [$result]";
                ?>
            } );

        });
    </script>

<?php get_footer('3dgalleryroom'); ?>