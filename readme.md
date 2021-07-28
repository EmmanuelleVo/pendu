# Le pendu - maintenir les informations du jeu de requête en requête

Une première difficulté dans la réalisation d’un jeu dont les actions du joueur sont des requêtes HTTP concerne la permanence des données du jeu. HTTP est un protocole amnésique et chaque requête oublie ce qu’il s’est passé à la précédente.

Dans cette première version du pendu, les données du jeu – le nombre d’essais, le mot à retenir, les lettres encore jouables, la chaîne __fantôme__ qui mime le mot à deviner et dont certains caractères sont remplacés par les lettres trouvées – sont mémorisées dans le formulaire de soumission de lettres. Ainsi, chaque fois qu’un joueur essaie une lettre, sans le savoir, il renvoie les données du jeu vers le serveur. Notons que le mot en lui même n’est pas stocké dans le formulaire. On ne stocke qu’un indice numérique qui permet de retrouver le mot sur le serveur dans une liste de mots issue d’un fichier.
