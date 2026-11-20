document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll(".ajax-form");

    forms.forEach(form => {
        
        const submitBtn = form.querySelector("button[type='submit']");
        
        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            // 🔒 Bloquear botón mientras se envía
            submitBtn.disabled = true;
            submitBtn.textContent = "Enviando...";
            submitBtn.style.opacity = "0.6";
            submitBtn.style.cursor = "not-allowed";
            
            let actionURL = form.getAttribute("action");
            let formData = new FormData(form);

            try {
                const response = await fetch(actionURL, {
                    method: "POST",
                    body: formData
                });

                const result = await response.json();

                // Mostrar toast
                showToast(result.message, result.status);

                // Limpiar formulario si fue exitoso
                if (result.status === "success") {
                    form.reset();
                }

            } catch (error) {
                showToast("Error inesperado. Intenta nuevamente.", "error");
            }
            
            // 🔓 Volver a habilitar el botón después de la respuesta
            submitBtn.disabled = false;
            submitBtn.textContent = "Enviar";
            submitBtn.style.opacity = "1";
            submitBtn.style.cursor = "pointer";
        });
    });
});


// --------------------------------------
// 🟦 Función universal de toast
// --------------------------------------
function showToast(message, type = "info") {
    const toastBox = document.getElementById("toastBox");
    const toastMessage = document.getElementById("toastMessage");
    
    // 🔄 Reiniciar animación si el toast ya estaba visible
    toastBox.classList.remove("show");
    void toastBox.offsetWidth; // fuerza al navegador a "recalcular" el elemento permitiendo que la animación se reinicie
   
    toastMessage.textContent = message;

    toastBox.style.background = 
        type === "success" ? "#28a745" :
        type === "error" ? "#dc3545" :
        "#236fa1";

    toastBox.classList.add("show");

    // Cerrar al hacer click en el botón
    document.getElementById("toastClose").onclick = () => {
        toastBox.classList.remove("show");
    };

    // Auto cerrar
    setTimeout(() => {
        toastBox.classList.remove("show");
    }, 4000);
}
