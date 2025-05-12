<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Reservation.php" method="POST">
     <h1>Réserver un Materiel</h1>
     <!-- Champ pour les Materiels-->
     <label for="nomMateriel">Nom du Materiel :</label>
     <select name="nomMateriel" id="nomMateriel"></select>
     <option value="">-- Selection un Materiel --</option>
     <?php foreach ($materiel as $mat): ?>
         <option value="<?= htmlspecialchars($mat['nomMateriel']) ?>" data-type="<?= htmlspecialchars($mat['type']) ?>">
             <?= htmlspecialchars($mat['nomMateriel']) ?>
         </option>

        <?php endforeach; ?>
    </form>
</body>
</html>