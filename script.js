document.addEventListener("DOMContentLoaded", function () {
  const toggleDarkMode = document.getElementById("toggle-dark-mode");

  // Función para actualizar el texto del botón
  function updateButtonText() {
    if (document.body.classList.contains("dark-mode")) {
      toggleDarkMode.textContent = "Light"; // Si está en modo oscuro, mostrar "Light"
    } else {
      toggleDarkMode.textContent = "Dark"; // Si está en modo claro, mostrar "Dark"
    }
  }

  // Aplicar el modo oscuro por defecto al cargar la página
  document.body.classList.add("dark-mode");
  updateButtonText(); // Actualizar el texto al cargar la página

  toggleDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
    updateButtonText(); // Actualizar el texto cuando cambia el modo
  });
});

// Para el reloj en tiempo real
document.addEventListener("DOMContentLoaded", function () {
  const clock = document.getElementById("clock");

  function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, "0"); // Asegura que siempre haya 2 dígitos
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");

    clock.textContent = `${hours}:${minutes}:${seconds}`;
  }

  // Actualizar el reloj cada segundo
  setInterval(updateClock, 1000);

  // Llamar la función para inicializar el reloj de inmediato al cargar la página
  updateClock();
});
