document.addEventListener("DOMContentLoaded", () => {
    const cartTable = document.getElementById("cart-table");
    if(!cartTable) return;


    //Remove item
    cartTable.querySelectorAll(".remove-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            const row = this.closest("tr");
            const id = row.dataset.id;

            fetch(`${BASE_URL}cart_action.php`, {
                method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=remove&id=${id}`,
            })
            .then((res) => res.json())
            .then((data) => {
                if(data.success) {
                    row.remove();
                    updateGrandTotal(data.grand_total);
                    if(cartTable.ariaRowSpan.length <= 2) {
                        location.reload();
                    }
                }
            })
            .catch(console.error)
        });
    });

     // Update quantity
  cartTable.querySelectorAll(".qty-input").forEach((input) => {
    input.addEventListener("change", function () {
      const row = this.closest("tr");
      const id = row.dataset.id;
      const qty = this.value;

      fetch(`${BASE_URL}cart_action.php`, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `action=update&id=${id}&qty=${qty}`,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.success) {
            const price = parseFloat(
              row.cells[1].textContent.replace("R ", "")
            );
            const subTotal = price * qty;
            row.querySelector(".sub-total").textContent =
              "R " + subTotal.toFixed(2);
            updateGrandTotal(data.grand_total);
          }
        })
        .catch(console.error);
    });
  });

  // Helper to update the total visually
  function updateGrandTotal(value) {
    const grandTotal = document.getElementById("grand-total");
    if (grandTotal) {
      grandTotal.textContent = "R " + parseFloat(value).toFixed(2);
      grandTotal.style.transition = "background 0.3s";
      grandTotal.style.background = "#e0f7fa";
      setTimeout(() => (grandTotal.style.background = "transparent"), 400);
    }
  }
})