// JavaScript for search bar autocomplete and cart count

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const cartCount = document.getElementById('cart-count');

    // Example medicines for autocomplete (replace with dynamic data)
    const medicines = ['Panadol', 'Aspirin', 'Amoxicillin', 'Ibuprofen', 'Cough Syrup'];

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase();
        const suggestions = medicines.filter(med => med.toLowerCase().includes(query));
        console.log(suggestions);  // Use this to populate autocomplete dropdown
    });

    // Example cart count (replace with dynamic data)
    cartCount.textContent = 2;  // This would be dynamic based on actual cart contents
});

