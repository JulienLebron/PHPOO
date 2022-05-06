<?php

// echo '<pre>'; print_r($data); echo '</pre>';

?>


<div class="container text-center mt-5">
    <div class="card" style="width: 18rem; margin: 0 auto;">
        <?php
            if($data['sexe'] == 'm')
            {
                echo '<img src="https://picsum.photos/id/1005/200/150" alt="photo de l\'employé" class="card-img-top">';
            }
            else
            {
                echo '<img src="https://picsum.photos/id/1011/200/150" alt="photo de l\'employé" class="card-img-top">';
            }
        ?>
        <div class="card-body">
            <h5 class="card-title"><?= $data['prenom'] . ' ' . $data['nom'] ?></h5>
            <ul style="list-style: none;">
                <li><b>Id_employé</b> : <?= $data['id_employes'] ?></li>
                <li><b>Sexe</b> : <?= $data['sexe'] ?></li>
                <li><b>Service</b> : <?= $data['service'] ?></li>
                <li><b>Date embauche</b> : <?= $data['date_embauche'] ?></li>
                <li><b>Salaire</b> : <?= $data['salaire'] . ' € ' ?></li>
            </ul>
            <a href="?op=delete&id=<?= $data[$id] ?>" class="btn btn-danger mt-4" onclick="return(confirm('Vous êtes sur le point de supprimer cet employé. En êtes vous certain ?'))">Supprimer</a>
        </div>
    </div>

    <div class="container text-center mt-4">
        <a href="?op=null" class="btn btn-primary mt-4">Retour au tableau des employés</a>
    </div>

</div>