async function cargarProyectos() {
  const contenedor = document.getElementById("lista-proyectos");

  if (!contenedor) {
    console.error("No se encontró el contenedor de proyectos.");
    return;
  }

  try {
    const respuesta = await fetch("./proyectos.json");

    if (!respuesta.ok) {
      throw new Error("No se pudo cargar proyectos.json");
    }

    const proyectos = await respuesta.json();

    contenedor.innerHTML = proyectos.map(proyecto => {
      // Normalizamos el nivel para clases CSS (ej: "principiante", "intermedio")
      const nivelClass = proyecto.nivel.toLowerCase().trim();

      return `
        <div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="${nivelClass}">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-image">
              <img
                src="${proyecto.imagen}"
                class="card-img-top img-fluid"
                alt="${proyecto.titulo}"
                loading="lazy"
              >
            </div>

            <div class="card-body d-flex flex-column">
              <span class="tag-nivel ${nivelClass}">${proyecto.nivel}</span>

              <h2 class="h5 mt-2 mb-2 fw-bold">${proyecto.titulo}</h2>

              <p class="card-text text-muted flex-grow-1">${proyecto.descripcion}</p>

              <a
                href="${proyecto.enlace}"
                class="btn btn-outline-cyan mt-auto w-100"
              >
                Ver proyecto →
              </a>
            </div>
          </div>
        </div>
      `;
    }).join("");

  } catch (error) {
    console.error("Error al cargar los proyectos:", error);
    contenedor.innerHTML = `
      <div class="col-12 text-center my-5">
        <p class="text-danger fw-bold">No se pudieron cargar los proyectos. Por favor, intentá nuevamente más tarde.</p>
      </div>
    `;
  }
}

document.addEventListener("DOMContentLoaded", () => {
  cargarProyectos();

  const filtro = document.getElementById("filtro-nivel");

  if (filtro) {
    filtro.addEventListener("change", (e) => {
      const valorFiltro = e.target.value.toLowerCase().trim();
      const tarjetas = document.querySelectorAll("#lista-proyectos .proyecto");

      tarjetas.forEach(tarjeta => {
        const nivelTarjeta = tarjeta.dataset.nivel;
        
        if (valorFiltro === "todos" || nivelTarjeta === valorFiltro) {
          tarjeta.style.display = "block";
          tarjeta.hidden = false;
        } else {
          tarjeta.style.display = "none";
          tarjeta.hidden = true;
        }
      });
    });
  }
});