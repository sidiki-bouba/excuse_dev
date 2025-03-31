<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I'm lost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color:rgb(23, 197, 174);
        }
        
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem 0;
        }
        
        .lost-container {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="d-flex flex-column h-100">
    <header class="fixed-top">
        <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Gateway Timeout (Délai d'attente de la passerelle)</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-shrink-0 mt-5 pt-4">
        <div class="lost-container">
            <h1>I'm lost</h1>
            <img src="https://media.giphy.com/media/l0HU7JI1QOlYpMtIQ/giphy.gif" alt="Lost gif" class="img-fluid">
            <p class="mt-3">Redirection dans 5 secondes...</p>
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

    <script>
        setTimeout(() => {
            window.location.href = 'error.php';  
        }, 5000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>