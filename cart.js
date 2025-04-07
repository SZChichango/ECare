/** @format */
// on DOMContent Loaded
document.addEventListener("DOMContentLoaded", function () {
  // Cart
  const cart = document.getElementsByClassName("cart__link")[0];
  const cartContainer = document.getElementsByClassName("cart__container")[0];
  const cartClose = document.getElementsByClassName("close__cart")[0];
  let cartItem = document.getElementsByClassName("cart__item");

  // Open the cart
  cart.addEventListener("click", () => {
    cartContainer.style.display = "block";
  });

  // Close the cart using the close button or clicking outside
  function closeCart() {
    cartContainer.style.display = "none";
  }

  cartClose.addEventListener("click", closeCart());

  // Event listener for clicking outside the cart
  document.addEventListener("click", (event) => {
    if (!cartContainer.contains(event.target) && !cart.contains(event.target)) {
      closeCart();
    }
  });

  // remove item from cart
  let remove = document.getElementsByClassName("cart__item__remove");

  // for (let i = 0; i < remove.length; i++) {
  //   remove[i].addEventListener("click", function (event) {
  //     event.preventDefault();

  //     let product = this.dataset.productId;
  //     console.log(product);

  //     let xhr = new XMLHttpRequest();
  //     xhr.open("POST", "cart-functions.php", true);
  //     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //     let params = "action=remove&product_id=" + product;

  //     xhr.onreadystatechange = function () {
  //       if (xhr.readyState === 4 && xhr.status === 200) {
  //         let response = xhr.responseText;

  //         if (response == 1) {
  //           // Remove item from cart
  //           cartItem[i].remove();

  //           // Update subtotal
  //           updateSubtotal();

  //           // Update cart count
  //           updateCartCount();
  //         } else {
  //           // Handle the case where the removal was not successful
  //         }
  //       }
  //     };
  //     xhr.send(params);
  //   });
  // }
});
// let remove = document.getElementsByClassName("cart__item__remove");
// for (let i = 0; i < remove.length; i++) {
//   remove[i].addEventListener("click", function (event) {
//     event.preventDefault();

//     let product = this.dataset.productId;
//     console.log(product);

//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "cart-functions.php", true);
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//     let params = "action=remove&product_id=" + product;

//     xhr.onreadystatechange = function () {
//       if (xhr.readyState === 4 && xhr.status === 200) {
//         let response = xhr.responseText;

//         if (response == 1) {
//           // Remove item from cart
//           cartItem[i].remove();

//           // Update subtotal
//           updateSubtotal();

//           // Update cart count
//           updateCartCount();
//         } else {
//           // Handle the case where the removal was not successful
//         }
//       }
//     };
//     xhr.send(params);
//   });
// }
