<?php
$code = isset($_GET['code']) ? (int)$_GET['code'] : 0;
$excuse = null;

try {
    $pdo = new PDO("mysql:host=localhost;dbname=excuses_dev", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare('SELECT * FROM excuses WHERE http_code = ?');
    $stmt->execute([$code]);
    $excuse = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    
    error_log("Erreur de base de données: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excuse <?php echo htmlspecialchars($code); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(23, 197, 174);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 60px;
        }

        .center-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 160px);
            text-align: center;
            padding: 20px;
        }

        .error-code {
            font-size: 8rem;
            font-weight: 900;
            color: #dc3545;
            margin-bottom: 10px;
            text-shadow: 3px 3px 0 rgba(0,0,0,0.1);
        }

        .error-message {
            font-size: 1.8rem;
            color: #6c757d;
            margin-bottom: 30px;
            max-width: 800px;
            line-height: 1.6;
        }

        .btn-retour {
            display: inline-block;
            padding: 12px 30px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 1.1rem;
        }

        .btn-retour:hover {
            background-color: #bb2d3b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
            color: white;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 56px;
            }
            
            .error-code {
                font-size: 5rem;
            }
            
            .error-message {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <header class="fixed-top">
        <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <span class="navbar-text text-white mx-auto fs-4">
                    <?php echo $excuse ? "Excuse #".htmlspecialchars($excuse['http_code']) : "Aucune excuse trouvée pour ce code"; ?>
                </span>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="center-container">
            <?php if ($excuse): ?>
                <h1 class="error-code"><?php echo htmlspecialchars($excuse['http_code']); ?></h1>
                <p class="error-message"><?php echo htmlspecialchars($excuse['message']); ?></p>
                <a href="index.php" class="btn-retour">Retour à l'accueil</a>
            <?php else: ?>
                <h1 class="error-code"><?php echo htmlspecialchars($code); ?></h1>
                <p class="error-message">Aucune excuse trouvée pour le code <?php echo htmlspecialchars($code); ?>.</p>
                <a href="index.php" class="btn-retour">Retour à l'accueil</a>
            <?php endif; ?>
        </div>
    </main>
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">© 2025 Excuses de Dev. Tous droits réservés.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="https://www.linkedin.com/" target="_blank" class="text-white me-3">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    <a href="https://www.indeed.com/" target="_blank" class="text-white me-3">
                        <i class="fas fa-briefcase fa-lg"></i>
                    </a>
                    <a href="https://github.com/" target="_blank" class="text-white me-3">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="text-white">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>