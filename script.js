document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.thumbnail');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            mainImage.src = this.src;
        });
    });
});

let cantidad = 1;

function cambiarCantidad(cambio, precioUnitario) {
    cantidad += cambio;
    if (cantidad < 1) {
        cantidad = 1;
    }
    document.getElementById('cantidad').innerText = cantidad;
    actualizarTotal(precioUnitario);
}

function actualizarTotal(precioUnitario) {
    const total = cantidad * precioUnitario;
    document.getElementById('total').innerText = `Total: $${total}.00`;
}

function comprar(precioUnitario) {
    alert(`Compra realizada: ${cantidad} motos por un total de $${cantidad * precioUnitario}.00`);
}

function buscar() {
    var searchTerm = document.getElementById("search-bar").value;

    if (searchTerm.trim() !== "") {
        window.location.href = "Resultados-busqueda.html?q=" + encodeURIComponent(searchTerm);
    } else {
        alert("Por favor, ingresa un término de búsqueda.");
    }
}
//busqueda
document.addEventListener('DOMContentLoaded', function() {
    // Obtén el término de búsqueda de la URL
    var searchTerm = decodeURIComponent(new URLSearchParams(window.location.search).get("q"));

    document.getElementById("resultados-container").innerHTML = "<p>Resultados para: " + searchTerm + "</p>";

    mostrarResultados(searchTerm);
});

function mostrarResultados(searchTerm) {
    var resultadosContainer = document.getElementById("resultados-container");

    // Ejemplos de lógica para diferentes resultados
    if (searchTerm.toLowerCase() === "bobber") {
        agregarMoto("Moto Bobber", "Imagenes/Bobber.png", "$29,000.00", "MotoBobber.html");
    } else if (searchTerm.toLowerCase() === "chopper") {
        agregarMoto("Moto Chopper", "Imagenes/Chopper.png", "$43,799.00", "MotoChopper.html");
    } else if (searchTerm.toLowerCase() === "cruiser") {
        agregarMoto("Moto Cruiser", "Imagenes/Cruiser.png", "$48,300.00", "MotoCruiser.html");
    } else if (searchTerm.toLowerCase() === "motocross") {
        agregarMoto("Motocross", "Imagenes/Cross2.png", "$50,299.00", "Motocross.html");
    } else if (searchTerm.toLowerCase() === "naked") {
        agregarMoto("Moto Naked", "Imagenes/Naked.png", "$45,800.00", "MotoNaked.html");
    } else {
    }
}

function agregarMoto(nombre, imagenSrc, precio, enlace) {
    var motoHTML = `
        <div class="moto">
            <div class="moto-inner">
                <img src="${imagenSrc}" alt="${nombre}">
                <h2>${nombre}</h2>
                <p class="precio-color">Precio: ${precio}</p>
                <p><a href="${enlace}">Ver más</a></p>
            </div>
        </div>
    `;

    var resultadosContainer = document.getElementById("resultados-container");
    resultadosContainer.innerHTML += motoHTML;
}
