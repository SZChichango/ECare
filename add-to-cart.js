/** @format */

document.addEventListener("DOMContentLoaded", function () {
  let addToCartForms = document.querySelectorAll(".add-to-cart");

  // addToCartForms.forEach((form) => {
  //   form.addEventListener("submit", function (event) {
  //     event.preventDefault();

  //     let product_id = form.querySelector("input[name='product_id']").value;
  //     let addToCartButtons = form.querySelectorAll(".add");

  //     addToCartButtons.forEach((button) => {
  //       button.addEventListener("click", function () {
  //         let xhr = new XMLHttpRequest();
  //         xhr.open("POST", `add-to-cart.php`, true);
  //         xhr.setRequestHeader(
  //           "Content-type",
  //           "application/x-www-form-urlencoded"
  //         );

  //         let params = `action=add&product_id=${product_id}`;

  //         xhr.onreadystatechange = function () {
  //           console.log("click");
  //           if (xhr.readyState === 4 && xhr.status === 200) {
  //             let response = xhr.responseText;
  //             let messageContainer = document.querySelector(".message-fade");

  //             if (response == 1) {
  //               messageContainer.innerHTML = `<div class="product-added">
  //                 <div class="add-to-cart__message">
  //                     <p class="success">Product added to cart</p>
  //                 </div>
  //               </div>`;
  //               updateCartCount();
  //             } else if (response == 2) {
  //               messageContainer.innerHTML = `<div class="product-added">
  //                 <div class="add-to-cart__message">
  //                     <p class="success">Product already exists in the cart!</p>
  //                 </div>
  //               </div>`;
  //             } else {
  //               messageContainer.innerHTML = `<div class="product-added__error">
  //                 <div class="add-to-cart__message">
  //                     <p class="success">Error adding product to cart</p>
  //                 </div>
  //               </div>`;
  //             }
  //           }
  //         };
  //         xhr.send(params);
  //       });
  //     });
  //   });
  // });
});
