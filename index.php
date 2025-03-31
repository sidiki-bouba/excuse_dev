<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excuses de Développeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/index.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color:rgb(23, 197, 174);
    color: #333;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    transition: background-color 0.5s;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
}

h1.title {
    font-size: 3rem;
    margin-bottom: 2rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    animation: fadeIn 1s forwards, moveUp 1s 2s forwards;
}

.excuse-container {
    margin: 2rem 0;
    padding: 2rem;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    min-height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s, transform 0.5s;
}

.excuse-container.show {
    opacity: 1;
    transform: translateY(0);
}

.excuse-text {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    display: none;
}

.initial-message {
    font-style: italic;
    color: #666;
    display: block;
}

.button-container {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-top: 2rem;
}

.btn {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    opacity: 0;
    animation: fadeIn 1s 2s forwards;
}

.btn:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

.btn:active {
    transform: translateY(0);
}

.generate-btn {
    background-color: #3498db;
}

.generate-btn:hover {
    background-color: #2980b9;
}

.add-excuse-btn {
    background-color: #2ecc71;
}

.add-excuse-btn:hover {
    background-color: #27ae60;
}

.loader {
    display: none;
    width: 50px;
    height: 50px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid #3498db;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 2rem auto;
}


.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-content {
    background-color: white;
    padding: 2rem;
    border-radius: 10px;
    width: 90%;
    max-width: 500px;
}

.close {
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    color: #aaa;
}

.close:hover {
    color: #333;
}

.form-group {
    margin-bottom: 1rem;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-group textarea {
    height: 100px;
    resize: vertical;
}

.submit-btn {
    background-color: #2ecc71;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background-color: #27ae60;
}

header {
    background-color:rgb(9, 102, 145);
    color: white;
    padding: 1rem;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.header-title {
    margin: 0;
    font-size: 1.5rem;
}

footer {
    background-color: #2c3e50;
    color: white;
    text-align: center;
    padding: 1rem;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 80px; 
    box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
}

.social-icons {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    margin-top: 0.5rem;
}

.social-icons a {
    color: white;
    font-size: 1.5rem;
    transition: color 0.3s;
}

.social-icons a:hover {
    color: #3498db;
}



@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes moveUp {
    from { 
        top: 50%;
        transform: translate(-50%, -50%);
    }
    to { 
        top: 20%;
        transform: translate(-50%, 0);
    }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
    </style>
</head>

<body>
    <?php
    if(isset($categorie)) {
        for($i = 0; $i < count($categorie); $i++):
            echo $categorie[$i];
        endfor;
    }
    ?>
    <header>
        <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Excuses de Dev</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#" id="home-link">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="excuses-list-link">Liste des excuses</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Catégories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item category-link" href="#" data-category="server">Serveur</a></li>
                                <li><a class="dropdown-item category-link" href="#" data-category="client">Client</a></li>
                                <li><a class="dropdown-item category-link" href="#" data-category="auth">Authentification</a></li>
                                <li><a class="dropdown-item category-link" href="#" data-category="maintenance">Maintenance</a></li>
                                <li><a class="dropdown-item category-link" href="#" data-category="fun">Fun</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container" id="main-container">
        <div class="title-container text-center my-5">
            <h1 class="title">Excuses de Dev</h1>
        </div>
        

        <div class="excuse-display-area">
            <div id="initial-message" class="text-center">
                <p class="lead">
            </div>
            <div id="loader" class="spinner-border text-primary" role="status" style="display: none;">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <div id="excuse-content" class="excuse-content">
                <div id="excuse-text" class="alert alert-info"></div>
            </div>
            
            
            <div id="excuse-list" class="excuse-list">
                <h3 id="list-title"></h3>
                <div id="excuse-list-content"></div>
            </div>
        </div>
        
        
        <div class="button-container text-center">
            <button id="generate-btn" class="btn btn-primary btn-lg mx-2">Générer une excuse</button>
            <button id="add-excuse-btn" class="btn btn-success btn-lg mx-2">Ajouter une excuse</button>
        </div>
    </div>

    
    <div id="add-excuse-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 style="font-size: 1.5rem;">Ajouter une nouvelle excuse</h2>
            <form id="excuse-form">
                <div class="form-group">
                    <label for="http-code">Code HTTP:</label>
                    <input type="number" id="http-code" name="http-code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tag">Catégorie:</label>
                    <input type="text" id="tag" name="tag" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" required style="height: 80px;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary submit-btn">Valider</button>
            </form>
        </div>
    </div>

    
    <footer class="bg-dark text-white py-4">
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
        document.addEventListener('DOMContentLoaded', function() {
            
            if (window.location.pathname.includes('lost.php')) {
                setTimeout(function() {
                    window.location.href = 'error.php';
                }, 5000);
            }
            
            
            if (window.location.pathname.includes('error.php')) {
                setTimeout(function() {
                    
                    const randomCodes = [404, 500, 503, 400, 401, 403, 418, 423];
                    const randomCode = randomCodes[Math.floor(Math.random() * randomCodes.length)];
                    window.location.href = 'http-code.php?code=' + randomCode;
                }, 3000); 
            }

            
            const generateBtn = document.getElementById('generate-btn');
            const addExcuseBtn = document.getElementById('add-excuse-btn');
            const excuseText = document.getElementById('excuse-text');
            const excuseContent = document.getElementById('excuse-content');
            const initialMessage = document.getElementById('initial-message');
            const loader = document.getElementById('loader');
            const modal = document.getElementById('add-excuse-modal');
            const closeBtn = document.querySelector('.close');
            const excuseForm = document.getElementById('excuse-form');
            const excuseList = document.getElementById('excuse-list');
            const excuseListContent = document.getElementById('excuse-list-content');
            const listTitle = document.getElementById('list-title');
            const excusesListLink = document.getElementById('excuses-list-link');
            const homeLink = document.getElementById('home-link');
            const categoryLinks = document.querySelectorAll('.category-link');

            
            let excuses = [
                { http_code: 500, tag: "server", message: "Le serveur a rencontré une erreur inattendue." },
                { http_code: 503, tag: "maintenance", message: "Le service est en maintenance." },
                { http_code: 400, tag: "client", message: "La requête est malformée." },
                { http_code: 401, tag: "auth", message: "Authentification requise." },
                { http_code: 403, tag: "permission", message: "Vous n'avez pas les permissions nécessaires." },
                { http_code: 404, tag: "not-found", message: "La ressource demandée n'existe pas." },
                { http_code: 418, tag: "fun", message: "Je suis une théière." },
                { http_code: 423, tag: "locked", message: "La ressource est verrouillée." }
            ];

            function generateRandomExcuse() {
                if (excuses.length === 0) {
                    return {
                        message: "Aucune excuse disponible. Ajoutez-en une d'abord!",
                        http_code: 404,
                        tag: "error"
                    };
                }
                
                const randomIndex = Math.floor(Math.random() * excuses.length);
                return excuses[randomIndex];
            }

            
            function displayNewExcuse() {
                
                excuseList.style.display = 'none';
                
               
                loader.style.display = 'block';
                initialMessage.style.display = 'none';
                excuseContent.style.display = 'none';
                
                
                setTimeout(function() {
                    const excuse = generateRandomExcuse();
                    excuseText.innerHTML = `
                        <h3>${excuse.message}</h3>
                        <p class="mb-0">Code HTTP: ${excuse.http_code} | Catégorie: ${excuse.tag}</p>
                    `;
                    
                    
                    loader.style.display = 'none';
                    excuseContent.style.display = 'block';
                }, 800);
            }

            function displayAllExcuses() {
                initialMessage.style.display = 'none';
                excuseContent.style.display = 'none';
                loader.style.display = 'none';
                
                listTitle.textContent = 'Liste de toutes les excuses';
                excuseListContent.innerHTML = '';
                
                if (excuses.length === 0) {
                    excuseListContent.innerHTML = '<p>Aucune excuse disponible.</p>';
                } else {
                    excuses.forEach(excuse => {
                        const excuseItem = document.createElement('div');
                        excuseItem.className = 'excuse-item';
                        excuseItem.innerHTML = `
                            <div class="excuse-message">${excuse.message}</div>
                            <div>
                                <span class="excuse-code">Code HTTP: ${excuse.http_code}</span>
                                <span class="excuse-tag">${excuse.tag}</span>
                            </div>
                        `;
                        excuseListContent.appendChild(excuseItem);
                    });
                }
                
                excuseList.style.display = 'block';
            }

            function displayExcusesByCategory(category) {
                initialMessage.style.display = 'none';
                excuseContent.style.display = 'none';
                loader.style.display = 'none';
                
                const filteredExcuses = excuses.filter(excuse => excuse.tag === category);
                listTitle.textContent = `Excuses de la catégorie: ${category}`;
                excuseListContent.innerHTML = '';
                
                if (filteredExcuses.length === 0) {
                    excuseListContent.innerHTML = `<p>Aucune excuse disponible dans la catégorie ${category}.</p>`;
                } else {
                    filteredExcuses.forEach(excuse => {
                        const excuseItem = document.createElement('div');
                        excuseItem.className = 'excuse-item';
                        excuseItem.innerHTML = `
                            <div class="excuse-message">${excuse.message}</div>
                            <div>
                                <span class="excuse-code">Code HTTP: ${excuse.http_code}</span>
                                <span class="excuse-tag">${excuse.tag}</span>
                            </div>
                        `;
                        excuseListContent.appendChild(excuseItem);
                    });
                }
                
                excuseList.style.display = 'block';
            }

            function resetToHome() {
                excuseList.style.display = 'none';
                excuseContent.style.display = 'none';
                loader.style.display = 'none';
                initialMessage.style.display = 'block';
                initialMessage.innerHTML = '<p class="lead">Cliquez sur "Générer une excuse" pour commencer</p>';
            }

           
            generateBtn.addEventListener('click', displayNewExcuse);

            
            addExcuseBtn.addEventListener('click', function() {
                modal.style.display = 'flex';
            });

            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });

            excuseForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const httpCode = parseInt(document.getElementById('http-code').value);
                const tag = document.getElementById('tag').value;
                const message = document.getElementById('message').value;
                
                
                excuses.push({ http_code: httpCode, tag: tag, message: message });
                
              
                excuseForm.reset();
                
                
                modal.style.display = 'none';
                
                
                initialMessage.style.display = 'none';
                excuseContent.style.display = 'block';
                excuseText.innerHTML = '<div class="alert alert-success">Votre ajout d\'excuse a été confirmé avec succès</div>';
                
                
                setTimeout(function() {
                    window.location.href = 'lost.php';
                }, 2000);
            });

            excusesListLink.addEventListener('click', function(e) {
                e.preventDefault();
                displayAllExcuses();
            });

           
            homeLink.addEventListener('click', function(e) {
                e.preventDefault();
                resetToHome();
            });

            
            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const category = this.getAttribute('data-category');
                    displayExcusesByCategory(category);
                });
            });
        });
    </script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>