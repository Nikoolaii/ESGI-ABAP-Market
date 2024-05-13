// document.addEventListener("DOMContentLoaded", function () {
//     var selectFAQ = document.querySelector('select[name="categories"]');
//     var searchInput = document.getElementById("searchFAQ");

//     selectFAQ.addEventListener("change", filterFAQ);
//     searchInput.addEventListener("input", filterFAQ);


//     function filterFAQ() {
//         var selectedCategory = selectFAQ.value;
//         var searchText = searchInput.value.toLowerCase();

//         var faqCards = document.querySelectorAll(
//             "#faqContainer"
//         );

//         faqCards.forEach(function (card) {
//             var cardCategory = card.getAttribute("data-category");
//             var cardProductName = card
//                 .querySelector(".accordion-button")
//                 .textContent.toLowerCase();

//             if (
//                 (selectedCategory === "AllCategories" ||
//                     selectedCategory === cardCategory) 
//                     &&
//                 (cardProductName.includes(searchText) || searchText === "")
//             ) {
//                 card.style.display = "block";
//             } else {
//                 card.style.display = "none";
//             }
//         });
//     }

//     function resetProducts() {
//         var productCards = document.querySelectorAll(
//             "#faqContainer .faq-card"
//         );
//         productCards.forEach(function (card) {
//             card.style.display = "block";
//         });
//     }

//     // Réinitialiser lorsque "All" est sélectionné
//     selectFAQ.addEventListener("change", function () {
//         if (selectFAQ.value === "AllCategories") {
//             resetProducts();
//         }
//     });

// });
