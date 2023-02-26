<center>
    <h1>La liste des profs</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Specialite</th>
            <th colspan="3"><a href="Profs/create">Ajouter</a></th>
        </tr>
        <?php 
            foreach($data as $prof){
        ?>
            <tr>
                <td><?= $prof->id?></td>
                <td><?= $prof->nom?></td>
                <td><?= $prof->prenom?></td>
                <td><?= $prof->specialite?></td>
                <td><a href="Profs/edit/<?= $prof->id?>">edit</a></td>
                <td><a href="Profs/show/<?= $prof->id?>">show</a></td>
                <td><a href="Profs/destroy/<?= $prof->id?>">delete</a></td>
            </tr>
        <?php }?>
    </table>
</center>