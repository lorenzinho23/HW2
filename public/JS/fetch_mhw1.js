function onResponse(response) {
    return response.json();
}

function onJSONBanche(json) {
    console.log(json);

    const contenuti = document.querySelector("#contenuti");
    contenuti.innerHTML = '';


    for (let i=0; i<3; i++) {  
        const div = document.createElement("div");  
        const foto = document.createElement("img");
        foto.src = json[i].Foto;
        const nome = document.createElement("h1");
        nome.textContent = json[i].Nome;
        const descrizione = document.createElement("p");
        descrizione.textContent = json[i].Descrizione;
        const sede = document.createElement("strong");
        sede.textContent = "SEDE PRINCIPALE: " + json[i].Citta;
        const br = document.createElement("br");
        const codice = document.createElement("strong");
        codice.textContent = "CODICE ABI: " + json[i].Codice;

        contenuti.appendChild(div);
        div.appendChild(foto);
        div.appendChild(nome);
        div.appendChild(descrizione);
        div.appendChild(sede);
        div.appendChild(br);
        div.appendChild(codice);

        foto.classList.add("img");
        nome.classList.add("h1");
        descrizione.classList.add("p");
        sede.classList.add("p");
        codice.classList.add("p");
    }

}

fetch("mhw1Caricamento").then(onResponse).then(onJSONBanche);
