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


document.addEventListener("DOMContentLoaded", function () {
    const btnCandidatar = document.getElementById("btnCandidatar");
    const modal = document.getElementById("modalCandidatar");
    const closeModal = document.querySelector(".close");
    const formCandidatar = document.getElementById("formCandidatar");

    btnCandidatar.addEventListener("click", function () {
        modal.style.display = "block";
    });

    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    formCandidatar.addEventListener("submit", function (event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const vagaId = btnCandidatar.getAttribute("data-vaga-id");

        fetch(`/candidatar/${vagaId}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
            body: JSON.stringify({ email }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                modal.style.display = "none";
            } else if (data.status === "new_user") {
                window.location.href = "/cadastrar-candidato";
            }
        })
        .catch(error => console.error("Erro:", error));
    });
});



