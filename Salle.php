<?php
include "base.php"; // Inclure le fichier de connexion à la base de données
session_start(); 
// Récupération des salles pour le champ de sélection
$query = $pdo->query("SELECT nomSalle, capacite FROM salle");
$salle = $query->fetchAll(PDO::FETCH_ASSOC);

if (empty($salle)) {
    echo "Aucune salle trouvée dans la base de données.<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #eaeaea;
        font-family: 'Segoe UI', sans-serif;
        box-sizing: border-box; /* Assure que padding et bordures ne dépassent pas la largeur */
    }

    form {
        background: rgba(255, 255, 255, 0.95);
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 400px;
        box-sizing: border-box; /* Assure que padding et bordures ne dépassent pas la largeur */
        height: auto; /* Ajuste la hauteur automatiquement */
        overflow: hidden; /* Cache le débordement si nécessaire */
    }

    h1 {
        margin-bottom: 30px;
        font-size: 24px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: #555;
        text-align: left;
    }

    input, select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
    }

    input[readonly] {
        background-color: #f5f5f5;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #2c7be5;
        font-size: 16px;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    button:hover {
        background-color: #1a5bb8;
    }
</style>
</head>
<body>

    <form action="Reservation.php" method="POST">
        <h1>Réserver une Salle</h1>
        <!-- Champ pour le nom de la salle -->
        <label for="nomSalle">Nom de la salle :</label>
        <select id="nomSalle" name="nomSalle" required>
        <option value="">-- Sélectionnez une salle --</option>
        <?php foreach ($salle as $s): ?>
            <option value="<?= htmlspecialchars($s['nomSalle']) ?>" data-capacite="<?= htmlspecialchars($s['capacite']) ?>">
                <?= htmlspecialchars($s['nomSalle']) ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br><br>

        <!-- Champ pour la capacité (rempli automatiquement) -->
        <label for="capacite">Capacité :</label>
        <input type="text" id="capacite" name="capacite" readonly>
        <br><br>

        <!-- Champ pour la date de réservation -->
        <label for="date_reservation">Date de réservation :</label>
        <input type="date" id="date_reservation" name="date_reservation" required>
        <br><br>

        <!-- Champ pour l'heure de début -->
        <label for="heure_debut">Heure de début :</label>
        <input type="time" id="heure_debut" name="heure_debut" required>
        <br><br>

        <!-- Champ pour l'heure de fin -->
        <label for="heure_fin">Heure de fin :</label>
        <input type="time" id="heure_fin" name="heure_fin" required>
        <br><br>

        <!-- Bouton pour valider la réservation -->
        <button type="submit">Valider la réservation</button>
    </form>

<script>
        // Script pour mettre à jour automatiquement la capacité en fonction de la salle sélectionnée
        document.getElementById('nomSalle').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const capacite = selectedOption.getAttribute('data-capacite');
            document.getElementById('capacite').value = capacite || '';
        });
</script>
</body>
</html>