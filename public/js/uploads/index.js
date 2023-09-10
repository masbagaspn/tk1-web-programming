document.addEventListener("DOMContentLoaded", () => {
    const button = document.getElementById("btn-upload");
    const closeBtn = document.getElementById("btn-close-add-modal-100");
    const cancelBtn = document.getElementById("btn-cancel-add-modal");
    const modal = document.getElementById("upload-form-modal");

    const openUploadModal = () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        setTimeout(() => {
            modal.classList.remove("opacity-0");
        }, 100);
    };

    const closeUploadModal = () => {
        modal.classList.add("opacity-0");
        modal.addEventListener(
            "transitionend",
            () => {
                isModalOpen = false;
                modal.classList.remove("flex");
                modal.classList.add("hidden");
            },
            { capture: false, once: true, passive: false }
        );
    };

    button.addEventListener("click", () => {
        openUploadModal();
    });

    closeBtn.addEventListener("click", () => {
        closeUploadModal();
    });

    cancelBtn.addEventListener("click", () => {
        closeUploadModal();
    });
});
