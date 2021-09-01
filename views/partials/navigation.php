<div role="navigation">
    <a href="?action=create&resource=team">Ajouter une équipe</a> -
    <a href="?action=create&resource=match">Ajouter un match</a> -
    <a href="?action=delete&resource=match">Supprimer un match</a>
</div>

<div>
    <form action="index.php" method="post">
        <input type="submit" value="Se déconnecter">
        <input type="hidden" name="action" value="logout">
        <input type="hidden" name="resource" value="user">
    </form>
</div>
