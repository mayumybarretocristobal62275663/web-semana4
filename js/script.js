document.addEventListener("DOMContentLoaded", () => {
    // --- 1. MODO NOCHE ---
    const btnTheme = document.createElement("button");
    btnTheme.id = "btnTheme";
    btnTheme.className = "fijo"; 
    document.body.appendChild(btnTheme);

    const modoGuardado = localStorage.getItem("tema");

    if (modoGuardado === "dark") {
        document.body.classList.add("dark");
        btnTheme.innerHTML = "☀️"; 
    } else {
        btnTheme.innerHTML = "🌙";
    }

    btnTheme.onclick = () => {
        document.body.classList.toggle("dark");
        if (document.body.classList.contains("dark")) {
            btnTheme.innerHTML = "☀️";
            localStorage.setItem("tema", "dark");
        } else {
            btnTheme.innerHTML = "🌙";
            localStorage.setItem("tema", "light");
        }
    };

    // --- 2. BOTÓN VOLVER ARRIBA ---
    const btnSubir = document.createElement("button");
    btnSubir.id = "btnSubir";
    btnSubir.innerHTML = "↑";
    btnSubir.className = "fijo-subir"; // Asegúrate de tener este estilo en CSS
    document.body.appendChild(btnSubir);

    // Ocultar botón al inicio
    btnSubir.style.display = "none";

    window.onscroll = () => {
        if (window.scrollY > 300) {
            btnSubir.style.display = "block";
        } else {
            btnSubir.style.display = "none";
        }
    };

    btnSubir.onclick = () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };
});