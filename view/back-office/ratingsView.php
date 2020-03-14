<?php $title = 'Liste des avis'; ?>

<?php ob_start(); ?>


    <!--****************************-->
    <!-- DEBUT AFFICHAGE DES $avis-->
    <!--****************************-->
<?php if (!empty($notice_list)) {
    echo '<p>Nombre d\'avis : <b>' . $notice_list->rowCount() . '</b></p>';
} ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Id avis</th>
                <th>Id membre</th>
                <th>Id salle</th>
                <th>Commentaire</th>
                <th>Note</th>
                <th>Date d'enregistrement</th>
            </tr>
            <?php
            while ($avis = $notice_list->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $avis['id_avis'] . '</td>';
                echo '<td>' . $avis['id_membre'] . ' - ' . $avis['email'] . '</td>';
                echo '<td>' . $avis['id_salle'] . ' - ' . $avis['titre'] . '</td>';
                echo '<td>' . $avis['commentaire'] . '</td>';
                echo '<td>' . $avis['note'] . '/5</td>';
                echo '<td>' . $avis['date_enregistrement'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <!--**************************-->
    <!-- FIN AFFICHAGE DES $avis -->
    <!--**************************-->
<?php $content = ob_get_clean(); ?>

<?php
if (!user_is_admin()) {
    $title = 'Accès interdit (ratingsview)';
    $content = '<h1>Vers l\'<a href="?action=listProductsIndex">accueil</a></h1>';
}
?>

<?php require('view/template/template.php'); ?>