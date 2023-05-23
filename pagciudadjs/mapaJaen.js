

var map = L.map('mapa').setView([37.7724, -3.7862], 15);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: 14,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


var lista = []
var elementoSeleccionado = 0;



function cargarModal(){
    let elemento = lista[0]

}

fetch("http://localhost/Proyecto%20fin%20de%20grado/test.php?province=Jaen")
    .then(res => res.json())
    .then(data => {
        const tbody = document.querySelector("#listaElementos");
        const template = document.querySelector('#elementoLista');
        for (let i = 0; i < data.length; i++) {
            // Clone the new row and insert it into the table
            const clone = template.content.cloneNode(true);
            let ciudad =clone.getElementById("ciudad")
            let nombre = clone.getElementById('nombre')
            let horario = clone.getElementById('horario')
            let categoria = clone.getElementById('categoria')
            let direccion = clone.getElementById('direccion')
            let telefono = clone.getElementById('telefono')
            let ver = clone.getElementById('ver')
            nombre.textContent = data[i].nombre;
            horario.textContent = data[i].horario;
            categoria.textContent = data[i].categoria;
            direccion.textContent = data[i].direccion;
            telefono.textContent = data[i].telefono;
            ciudad.textContent = data[i].ciudad;
            ver.textContent = data[i].ver;
            if (telefono.textContent != "") {
                telefono.classList.add('tarjeta')
            }
            tbody.appendChild(clone);

            let elemento = {
                nombre: data[i].nombre,
                horario: data[i].horario,
                categoria: data[i].categoria,
                direccion: data[i].direccion,
                telefono: data[i].telefono,
                ciudad: data[i].ciudad,
                ver: data[i].ver,

            }
            lista.push(elemento)
            
            template.addEventListener('click', 
                cargarModal()
            )

            var marcador = L.marker([data[i].x, data[i].y]).addTo(map);
            marcador.bindPopup(`${data[i].nombre}`);

        }


    })






   // http://localhost/Proyecto%20fin%20de%20grado/test.php?province=jaen

    




