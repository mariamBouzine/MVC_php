<center>
    <h1>Formulaire<?= $data==null?" insert":" update"?></h1>
    <form action="<?= $data==null?"store":"../update/".$data->id;?>" method="post">
        <table>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" value="<?= $data!=null ? $data->nom:"" ?>"></td>
            </tr>
            <tr>
                <td>Prenom</td>
                <td><input type="text" name="prenom" value="<?= $data!=null ? $data->prenom:"" ?>"></td>
            </tr>
            <tr>
                <td>Specialite</td>
                <td><input type="text" name="specialite" value="<?= $data!=null ? $data->specialite:"" ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="envoyer"></td>
                <td><input type="reset" value="annuler"></td>
            </tr>
        </table>
    </form>
</center>