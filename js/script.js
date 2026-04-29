document.addEventListener("DOMContentLoaded", () => {
    // 1. MODO NOCHE (Sin cambios, tal cual lo pediste)
    const btnTheme = document.createElement("button");
    btnTheme.innerHTML = "🌙";
    btnTheme.id = "btnTheme";
    btnTheme.className = "fijo"; 
    document.body.appendChild(btnTheme);

    btnTheme.onclick = () => {
        document.body.classList.toggle("dark");
        btnTheme.innerHTML = document.body.classList.contains("dark") ? "☀️" : "🌙";
    };

    // 2. BOTÓN VOLVER ARRIBA (Corregido)
    const btntop = document.getElementById("btntop"); // Nombre unificado

    window.onscroll = () => {
        // Se muestra al bajar 100px
        if (window.scrollY > 100) {
            btntop.style.display = "block";
        } else {
            btntop.style.display = "none";
        }
    };

    btntop.onclick = () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };

    
});