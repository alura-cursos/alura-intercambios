<?php
$estiloPagina = 'destinos.css';
require_once 'header.php';
?>
<form action="#" class="container-alura formulario-pesquisa-paises">
    <h2>Conheça nossos destinos</h2>
    <select name="paises" id="paises">
        <option value="">--Selecione--</option>
        <?php
            $paises = get_terms(array('taxonomy' => 'paises'));
            foreach($paises as $pais):?>
                <option value="<?= $pais->name ?>"><?= $pais->name ?></option>
            <?php endforeach;
        ?>
    </select>
    <input type="submit" value="Pesquisar">
</form>
<?php
$args = array('post_type' => 'destinos' );
$query = new WP_Query($args);
if ($query->have_posts()):
    echo '<main class="page-destinos">';
    echo '<ul class="lista-destinos container-alura">';
    while($query->have_posts()): $query->the_post();
        echo '<li class="col-md-3 destinos" >';
        the_post_thumbnail();
        the_title('<p class="titulo-destino">','</p>');
        the_content();
        echo '</li>';
    endwhile;
    echo '</ul>';
    echo '</main>';
endif;
require_once 'footer.php';