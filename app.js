document.addEventListener('DOMContentLoaded', function() {
    const generateBtn = document.getElementById('generate-btn');
    const addExcuseBtn = document.getElementById('add-excuse-btn');
    const excuseText = document.getElementById('excuse-text');
    const loader = document.getElementById('loader');
    const modal = document.getElementById('add-excuse-modal');
    const closeBtn = document.querySelector('.close');
    const excuseForm = document.getElementById('excuse-form');
    
    let excuses = [];
    let lastExcuseIndex = -1;
    
    fetchExcuses();
    
    generateBtn.addEventListener('click', function() {
        generateNewExcuse();
    });
    
    addExcuseBtn.addEventListener('click', function() {
        modal.classList.add('visible');
    });
    
    closeBtn.addEventListener('click', function() {
        modal.classList.remove('visible');
    });
    
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.remove('visible');
        }
    });
    
    excuseForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const httpCode = document.getElementById('http-code').value;
        const tag = document.getElementById('tag').value;
        const message = document.getElementById('message').value;
        addNewExcuse(httpCode, tag, message);
    });
    
    async function fetchExcuses() {
        try {
            const response = await fetch('../api/excuses.php');
            excuses = await response.json();
        } catch (error) {
            console.error('Error fetching excuses:', error);
            excuseText.textContent = "Erreur lors du chargement des excuses. Veuillez réessayer.";
        }
    }
    
    function generateNewExcuse() {
        if (excuses.length === 0) {
            excuseText.textContent = "Aucune excuse disponible.";
            return;
        }
        
        excuseText.classList.add('hidden');
        loader.classList.remove('hidden');
        generateBtn.disabled = true;
        
        const delay = Math.floor(Math.random() * 4000) + 1000;
        
        setTimeout(() => {
            let randomIndex;
            do {
                randomIndex = Math.floor(Math.random() * excuses.length);
            } while (randomIndex === lastExcuseIndex && excuses.length > 1);
            
            lastExcuseIndex = randomIndex;
            const excuse = excuses[randomIndex];
            excuseText.textContent = `${excuse.message} (${excuse.http_code} - ${excuse.tag})`;
            
            loader.classList.add('hidden');
            excuseText.classList.remove('hidden');
            generateBtn.disabled = false;
        }, delay);
    }
    
    async function addNewExcuse(httpCode, tag, message) {
        try {
            const response = await fetch('../api/excuses-add.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    http_code: httpCode,
                    tag: tag,
                    message: message
                })
            });
            
            const result = await response.json();
            
            if (result.success) {
                const newExcuse = {
                    id: result.id,
                    http_code: httpCode,
                    tag: tag,
                    message: message
                };
                excuses.push(newExcuse);
                modal.classList.remove('visible');
                excuseForm.reset();
                alert('Excuse ajoutée avec succès!');
            } else {
                alert('Erreur: ' + (result.error || 'Erreur inconnue'));
            }
        } catch (error) {
            console.error('Error adding excuse:', error);
            alert('Erreur lors de l\'ajout. Veuillez réessayer.');
        }
    }
});