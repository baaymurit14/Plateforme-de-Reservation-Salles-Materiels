<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Salle</title>
    <style>
                body{
            margin:0;
            padding:0;
            height:100vh;
            display: flex;
            justify-content:center;
            align-items:center;
            background:#eaeaea;
            font-family:'Segoe UI', sans-serif;
        }
        form{
            background:rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius:12px;
            box-shadow:0 0 15px rgba(0, 0, 0, 0.2);
            text-align:center;
            width: 350px;
        }
        h2{
            margin-bottom:30px;
        }
        button {
            width: 100%;
            padding: 12px;
            margin:10px 0;
            background-color:#2c7be5;
            font-size: 16px;
            color:white;
            border: none;
            border-radius:8px;
            cursor:pointer;
            transition: 0.3s ease;
        }
        button:hover{
            background-color:#1a5bb8;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h2>Administration Salle et Materiels</h2>
        <button type="submit" name="action" value="salle">Salle</button>
        <button type="submit" name="action" value="Materiel">Materiel</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]==="POST"){
        if (isset($_POST['action'])) {
            if ($_POST['action']=== 'salle'){
                header("Location:AdminSalle.php");
                exit;
            } elseif  ($_POST['action']==='Materiel'){
                header("Location:AdminMateriel.php");
                exit;
            }

            
        }
    }
    ?>
</body>
</html>