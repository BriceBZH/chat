document.getElementById('message').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('index.php?route=postMessage', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const messagesDiv = document.getElementById('messages');
            const newMessage = document.createElement('p');
            const now = new Date();
            const time = now.getHours() + ':' + now.getMinutes();
            newMessage.innerHTML = `<span>(${time})</span> ${formData.get('pseudo')} : ${formData.get('message')}`;
            messagesDiv.appendChild(newMessage);

            document.getElementById('message').reset();
        } else {
            console.error('Erreur: ', data.message);
        }
    })
    .catch(error => console.error('Erreur:', error));
});