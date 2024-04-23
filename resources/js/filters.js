document.addEventListener("DOMContentLoaded", function () {
    var select = document.querySelector('select[name="type"]');
    var searchInput = document.getElementById("search");
    var minPriceInput = document.getElementById("minPrice");
    var maxPriceInput = document.getElementById("maxPrice");
    var sortDropdown = document.querySelector('.dropdown-menu');

    select.addEventListener("change", filterProducts);
    searchInput.addEventListener("input", filterProducts);
    minPriceInput.addEventListener("input", filterProducts);
    maxPriceInput.addEventListener("input", filterProducts);
    sortDropdown.addEventListener("click", sortProducts);

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

    function sortProducts(event) {
        if (event.target.tagName === "A") {
            var sortBy = event.target.textContent;
            var productCards = document.querySelectorAll("#productsContainer .product-card");
            
            if (sortBy === "Price: Low to High") {
                var sortedCards = Array.from(productCards).sort(function (a, b) {
                    var priceA = parseFloat(a.querySelector('.card-text').textContent.split(' ')[1]);
                    var priceB = parseFloat(b.querySelector('.card-text').textContent.split(' ')[1]);
                    return priceA - priceB;
                });
            } else if (sortBy === "Price: High to Low") {
                var sortedCards = Array.from(productCards).sort(function (a, b) {
                    var priceA = parseFloat(a.querySelector('.card-text').textContent.split(' ')[1]);
                    var priceB = parseFloat(b.querySelector('.card-text').textContent.split(' ')[1]);
                    return priceB - priceA;
                });
            }
            
            // Réinsérer les cartes triées dans le conteneur de produits
            var productsContainer = document.getElementById('productsContainer');
            productsContainer.innerHTML = ""; // Vider le conteneur
            sortedCards.forEach(function (card) {
                productsContainer.appendChild(card);
            });
        }
    }
});
