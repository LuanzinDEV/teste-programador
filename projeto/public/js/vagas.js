document.addEventListener("DOMContentLoaded", function () {
    const botaoCandidatar = document.getElementById("btnCandidatar");

    if (botaoCandidatar) {
        const statusVaga = botaoCandidatar.getAttribute("data-status");

        console.log(statusVaga);

        if (statusVaga !== null) {
            const statusVagaNum = parseInt(statusVaga, 10);
            
            if (!isNaN(statusVagaNum) && statusVagaNum === 0 || statusVagaNum == null ) {
                botaoCandidatar.disabled = true;
                botaoCandidatar.style.cursor = "not-allowed";
                botaoCandidatar.style.opacity = "0.5";
            }
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const botaoCandidatar = document.getElementById("btnCandidatar");
    const modal = document.getElementById("modalCandidatar");
    const closeModal = document.querySelector(".close");

    if (botaoCandidatar) {
        botaoCandidatar.addEventListener("click", function () {
            modal.style.display = "flex";
        });
    }

    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    document.getElementById("formCandidatar").addEventListener("submit", function (event) {
        event.preventDefault();
        const email = document.getElementById("email").value;
        alert("E-mail enviado: " + email);
        modal.style.display = "none";
    });
});

