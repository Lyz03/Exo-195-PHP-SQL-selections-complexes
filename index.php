<?php

/**
 * Utilisez la base de données que vous avez utilisé dans l'exo 194.
 * Utilisez aussi le CSS que vous avez écris ( div contenant l'utilisateur ).
 * Pour chaque sélection, vous utiliserez un div par utilisateur:
 * ex:  <div class="classe-css-utilisateur">
 *          utilisateur 1, données ( nom, prenom, etc ... )
 *      </div>
 *      <div class="classe-css-utilisateur">
 *          utilisateur 2, données ( nom, prenom, etc ... )
 *      </div>
 *
 * -- Sélections complexes --
 * Une seule requête est permise pour chaque point de l'exo.
 */

// TODO Commencez par créer votre objet de connexion à la base de données, vous pouvez aussi utiliser l'objet statique ou autre qu'on a créé ensemble.
$db = new PDO('mysql:host=localhost;dbname=bdd_cours;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
// TODO votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE nom = 'Conor'");

function printInfo($stmt) {
    if ($stmt->execute()) {
        foreach ($stmt->fetchAll() as $value) {
            echo '<div style="background-color:rgba(211,210,210,0.51); margin: 1rem; padding: 1rem">';
            foreach ($value as $item) {
                echo $item .  '<br>';
            }
            echo '</div>';
        }

        echo '<br><br>';
    }
}

printInfo($stmt);

/* 2. Sélectionnez et affichez tous les utilisateurs dont le prénom est différent de 'John' */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE prenom != 'John'");

printInfo($stmt);

/* 3. Sélectionnez et affichez tous les utilisateurs dont l'id est plus petit ou égal à 2 */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE id <= 2");

printInfo($stmt);

/* 4. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand ou égal à 2 */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE id >= 2");

printInfo($stmt);

/* 5. Sélectionnez et affichez tous les utilisateurs dont l'id est égal à 1 */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE id = 1");

printInfo($stmt);

/* 6. Sélectionnez et affichez tous les utilisateurs dont l'id est plus grand que 1 ET le nom est égal à 'Doe' */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE id > 1 AND nom = 'Doe'");

printInfo($stmt);

/* 7. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Doe' ET le prénom est 'John'*/
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE nom = 'Doe' AND prenom = 'John'");

printInfo($stmt);

/* 8. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' OU le prénom est 'Jane' */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE nom = 'Conor' OR prenom = 'Jane'");

printInfo($stmt);

/* 9. Sélectionnez et affichez tous les utilisateurs en limitant les réultats à 2 résultats */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user LIMIT 2");

printInfo($stmt);

/* 10. Sélectionnez et affichez tous les utilisateurs par ordre croissant, en limitant le résultat à 1 seul enregistrement */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user LIMIT 1");

printInfo($stmt);

/* 11. Sélectionnez et affichez tous les utilisateurs dont le nom commence par C, fini par r et contient 5 caractères ( voir LIKE )*/
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE nom LIKE 'C___r'");

printInfo($stmt);

/* 12. Sélectionnez et affichez tous les utilisateurs dont le nom contient au moins un 'e' */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE nom LIKE '%e%'");

printInfo($stmt);

/* 13. Sélectionnez et affichez tous les utilisateurs dont le prénom est ( IN ) (John, Sarah) ... voir IN , pas OR '' */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE prenom IN ('John', 'Sarah')");

printInfo($stmt);

/* 14. Sélectionnez et affichez tous les utilisateurs dont l'id est situé entre 2 et 4 */
// TODO Votre code ici.
$stmt = $db->prepare("SELECT * FROM user WHERE id BETWEEN 2 AND 4");

printInfo($stmt);
