document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche la soumission normale du formulaire

    let formData = new FormData(this);

    fetch('process_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('response').innerText = data.message;
    })
    .catch(error => console.error('Erreur:', error));
});
