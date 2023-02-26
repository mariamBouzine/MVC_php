<center>
    <h1>Formulaire<?= $data==null?" insert":" update"?></h1>
    <form action="<?= $data==null?"store":"../update/".$data->id;?>" method="post">
        <table>
            <tr>
                <td>Nom</td>
                <td><?= $data->nom?></td>
            </tr>
            <tr>
                <td>Prenom</td>
                <td><?= $data->prenom ?></td>
            </tr>
            <tr>
                <td>Specialite</td>
                <td><?= $data->specialite ?></td>
            </tr>
            <tr>
               <td><a href="../../Profs">back</a></td>
            </tr>
        </table>
    </form>
</center> 