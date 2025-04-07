/** @format */

// Add click event listeners to toggle dropdowns
// document
//   .getElementById("loginDropdown")
//   .addEventListener("click", toggleDropdown);
// document
//   .getElementById("registerDropdown")
//   .addEventListener("click", toggleDropdown);

// Function to toggle dropdown visibility
function toggleDropdown(event) {
  event.stopPropagation(); // Prevent the dropdown from closing when clicking on it
  let dropdownContent = event.currentTarget.querySelector(".dropdown-content");
  dropdownContent.style.display =
    dropdownContent.style.display === "block" ? "none" : "block";
}

// Close the dropdowns when clicking outside of them
document.addEventListener("click", function (event) {
  closeDropdowns(event.target);
});

function closeDropdowns(clickedElement) {
  let dropdowns = document.querySelectorAll(".dropdown-content");
  dropdowns.forEach(function (dropdown) {
    if (!dropdown.contains(clickedElement)) {
      dropdown.style.display = "none";
    }
  });
}
