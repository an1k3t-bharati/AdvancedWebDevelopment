document.addEventListener("DOMContentLoaded", () => {
    const selectedCategoryInput = document.getElementById("selectedCategory");
    const selectedCategoryTag = document.getElementById("selectedCategoryTag");
    const categoryText = document.getElementById("categoryText");
    const categoryOptions = document.querySelectorAll(".category-option");

    // Select category
    categoryOptions.forEach(option => {
        option.addEventListener("click", () => {
            const label = option.textContent;
            const value = option.getAttribute("data-value");

            selectedCategoryInput.value = value;
            categoryText.textContent = label;
            selectedCategoryTag.classList.remove("d-none");
        });
    });

    // Remove category
    selectedCategoryTag.addEventListener("click", () => {
        selectedCategoryInput.value = "";
        selectedCategoryTag.classList.add("d-none");
    });
});
