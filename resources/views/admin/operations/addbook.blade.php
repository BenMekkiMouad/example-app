
<form method="post" action="addbook" enctype="multipart/form-data">
    @csrf
    <label for="titre" >titre :</label>
        <input type="text" ><br>
    <label for="slug">slug :</label>
        <input type="text" ><br>
    <label for="auteur" >auteur :</label>
        <input type="text" ><br>
    <label for="description">description :</label>
        <input type="text" ><br>
    <label>qt :</label>
        <input type="text" ><br>
</form>