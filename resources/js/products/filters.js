document.addEventListener("DOMContentLoaded", function () {
    var select = document.querySelector('select[name="type"]');
    var searchInput = document.getElementById("search");
    var minPriceInput = document.getElementById("minPrice");
    var maxPriceInput = document.getElementById("maxPrice");
    var sortDropdown = document.getElementById("sortDropdown");


    select.addEventListener("change", filterProducts);
    searchInput.addEventListener("input", filterProducts);
    minPriceInput.addEventListener("input", filterProducts);
    maxPriceInput.addEventListener("input", filterProducts);
    sortDropdown.addEventListener("change", sortProducts);

    function filterProducts() {
        var selectedCategory = select.value;
        var searchText = searchInput.value.toLowerCase();
        var minPrice = parseFloat(minPriceInput.value) || 0;
        var maxPrice =
            parseFloat(maxPriceInput.value) || Number.MAX_SAFE_INTEGER;

        var productCards = document.querySelectorAll(
            "#productsContainer .product-card"
        );

        productCards.forEach(function (card) {
            var cardCategory = card.getAttribute("data-category");
            var cardProductName = card
                .querySelector(".card-title")
                .textContent.toLowerCase();
            var cardPrice =
                parseFloat(
                    card
                        .querySelector(".card-text")
                        .textContent.split(" ")[1]
                        .replace(",", ".")
                ) || 0;

            if (
                (selectedCategory === "All" ||
                    selectedCategory === cardCategory) &&
                (cardProductName.includes(searchText) || searchText === "") &&
                cardPrice >= minPrice &&
                cardPrice <= maxPrice
            ) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }

    function sortProducts() {
        var sortBy = sortDropdown.value;
        var productsContainer = document.getElementById("productsContainer");
        var productCards = document.querySelectorAll("#productsContainer .product-card");

        var sortedCards = Array.from(productCards);

        if (sortBy === "priceLowToHigh") {
            sortedCards.sort(function (a, b) {
                var priceA = parseFloat(a.querySelector(".card-text").textContent.split(" ")[1].replace(",", "."));
                var priceB = parseFloat(b.querySelector(".card-text").textContent.split(" ")[1].replace(",", "."));
                return priceA - priceB;
            });
        } else if (sortBy === "priceHighToLow") {
            sortedCards.sort(function (a, b) {
                var priceA = parseFloat(a.querySelector(".card-text").textContent.split(" ")[1].replace(",", "."));
                var priceB = parseFloat(b.querySelector(".card-text").textContent.split(" ")[1].replace(",", "."));
                return priceB - priceA;
            });
        } else if (sortBy === "popularity") {
            sortedCards.sort(function (a, b) {
                var popularityA = parseInt(a.getAttribute("data-popularity"));
                var popularityB = parseInt(b.getAttribute("data-popularity"));
                return popularityB - popularityA;
            });
        }

        productsContainer.innerHTML = "";
        sortedCards.forEach(function (card) {
            productsContainer.appendChild(card);
        });
    }

    function resetProducts() {
        var productCards = document.querySelectorAll(
            "#productsContainer .product-card"
        );
        productCards.forEach(function (card) {
            card.style.display = "block";
        });
    }

    // Réinitialiser lorsque "All" est sélectionné
    select.addEventListener("change", function () {
        if (select.value === "All") {
            resetProducts();
        }
    });


});
