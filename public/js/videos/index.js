document.addEventListener("DOMContentLoaded", () => {
    const moreBtns = document.querySelectorAll("#more-button");

    const openTooltip = (element) => {
        isOneOfTooltipOpen = true;
        element.classList.remove("hidden");
        element.classList.add("flex");
    };

    const closeTooltip = (element) => {
        isOneOfTooltipOpen = false;
        element.classList.remove("flex");
        element.classList.add("hidden");
    };

    moreBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const tooltip = e.target.parentNode.children[1];
            openTooltip(tooltip);

            tooltip.addEventListener("mouseleave", () => {
                closeTooltip(tooltip);
            });
        });
    });

    const buttons = document.querySelectorAll(".btn-edit-modal");
    const closeBtns = document.querySelectorAll(".btn-close-edit-modal");
    const cancelBtns = document.querySelectorAll(".btn-cancel-edit-modal");

    const openModal = (element) => {
        isModalOpen = true;
        element.classList.remove("hidden");
        element.classList.add("flex");
        setTimeout(() => {
            element.classList.remove("opacity-0");
        }, 100);
    };

    const closeModal = (element) => {
        element.classList.add("opacity-0");
        element.addEventListener(
            "transitionend",
            () => {
                isModalOpen = false;
                element.classList.remove("flex");
                element.classList.add("hidden");
            },
            { capture: false, once: true, passive: false }
        );
    };

    closeBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const id = e.target.id.slice(-1);
            const modal = document.getElementById(`edit-form-modal-${id}`);
            closeModal(modal);
        });
    });

    cancelBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const id = e.target.id.slice(-1);
            const modal = document.getElementById(`edit-form-modal-${id}`);
            console.log(modal);
            closeModal(modal);
        });
    });

    buttons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const id = e.target.id.slice(-1);
            const modal = document.getElementById(`edit-form-modal-${id}`);
            openModal(modal);
        });
    });

    const delBtns = document.querySelectorAll(".btn-delete-modal");
    const delCloseBtns = document.querySelectorAll(".btn-close-edit-modal");
    const delCancelBtns = document.querySelectorAll(".btn-cancel-edit-modal");

    delCloseBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const id = e.target.id.slice(-1);
            const modal = document.getElementById(`delete-form-modal-${id}`);
            closeModal(modal);
        });
    });
    delCancelBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const id = e.target.id.slice(-1);
            const modal = document.getElementById(`delete-form-modal-${id}`);
            closeModal(modal);
        });
    });
    delBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const id = e.target.id.slice(-1);
            const modal = document.getElementById(`delete-form-modal-${id}`);
            openModal(modal);
        });
    });
});
