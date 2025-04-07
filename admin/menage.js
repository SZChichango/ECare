/** @format */

// get the table rows
let tableRows = document.querySelectorAll("tr");

// Get the delete buttons
let deleteButtons = document.querySelectorAll(".delete");

// Add event listener to each delete button
deleteButtons.forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();

    // Get the product id from the button's data attribute
    let productId = button.getAttribute("data-id");

    // Send a request to manage-products to delete the product
    fetch("menage.php", {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id: productId }),
    })
      .then((response) => response.json())
      .then((data) => {
        // If the product is deleted successfully, remove the table row
        if (data.success) {
          // Find the closest table row and remove it
          button.closest("tr").remove();
        } else {
          alert("Failed to delete product");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});

// Delete doctors
let deleteDoctors = document.querySelectorAll(".delete-doctor");
deleteDoctors.forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();
    let doctorId = button.getAttribute("data-id");
    fetch("menage.php", {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ doctor_id: doctorId }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          button.closest("tr").remove();
        } else {
          alert("Failed to delete doctor");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});
