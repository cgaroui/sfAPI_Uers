const membres_container = document.querySelector('#membres-container')

fetch('http://localhost:8001/api/membres')
.then((response) => response.json())
.then((data) => {
    const membres = data["hydra:member"];
    membres.forEach(membre => {
        // console.log(membre)
        let membre_box = document.createElement('div');
        membre_box.innerHTML = membre.last.toUpperCase() + ' ' + membre.first;
        membres_container.appendChild(membre_box);
       
    });
})