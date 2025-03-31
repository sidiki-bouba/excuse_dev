<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        
        body {
            background-color:rgb(23, 197, 174);
            color: #212529;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        
        main {
            text-align: center;
            padding-top: 3rem;
        }
        
        h1 {
            font-size: 5rem;
            font-weight: 700;
            color: #dc3545;
            margin-bottom: 1rem;
        }
        
        p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            min-height: 80px; 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .navbar-error-message {
            font-weight: 600;
            font-size: 1.5rem; 
            text-align: center;
            width: 100%;
            color: #dc3545;
            animation: pulse 2s infinite;
        }
        
        
        footer {
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }
        
        footer a {
            transition: all 0.3s ease;
        }
        
        footer a:hover {
            transform: translateY(-3px);
            opacity: 0.8;
        }
        
        
        @keyframes pulse {
            0% { opacity: 0.6; }
            50% { opacity: 1; }
            100% { opacity: 0.6; }
        }
    </style>
    
    <script>
       
        const httpCodes = [400, 401, 403, 404, 500, 503];
        
        setTimeout(function() {
            
            const randomCode = httpCodes[Math.floor(Math.random() * httpCodes.length)];
            window.location.href = 'http-code.php?code=' + randomCode;
        }, 3000);
    </script>
</head>
<body class="d-flex flex-column h-100">
    <header class="fixed-top">
        <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <div class="navbar-error-message">
                    L'utilisateur n'a pas la permission d'accéder à la ressource
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0 mt-5 pt-5">
        <div class="container">
            <h1>404</h1>
            <p>Page non trouvée</p>
            <p>Redirection vers une excuse de dev dans 3 secondes...</p>
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