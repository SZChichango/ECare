<?php
include "../includes/connect.php";

// If the action is equal to edit
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    // Get the id of the user to edit
    $id = $_GET['id'];
    // Get the product data
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="add-product.css" />
    <link rel="stylesheet" href="product.css" />
    <link href="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.css" rel="stylesheet">
</head>

<body>
    <div id="backdrop"></div>
    <?php include_once 'header.php'; ?>
    <main>
        <section>
            <h2>ADD/EDIT PRODUCT</h2>
            <form id="productForm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" min="0.00" max="10000.00" id="price" name="price" class="form-control" step="0.01" />
                </div>
                <div class="form-group">
                    <label for="price">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="OTC Medice">OTC Medice</option>
                        <option value="Skin Care">Skin Care</option>
                        <option value="Allergens">Allergens</option>
                        <option value="Cough Suppressants">Cough Suppressants</option>
                        <option value="Sleep Aids">Sleep Aids</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="product-image">Upload Image</label>
                    <div class="uploader__preview">
                        <a href="#" id="uploader__container__loader">Upload</a>
                        <img src="" alt="image preview" id="imgPreview" width="300px" height="300px" />
                    </div>
                </div>
                <div class="uploader__container" style="display: none;">
                    <div class="uploader__container__text">
                        <p>Upload your Image</p>
                        <div id="close"><i class="fa fa-close"></i></div>
                    </div>
                    <div class="container_flex">
                        <div class="uploader__container__image">
                            <img id="imagePreview" src="https://i.ibb.co/0Y0zX0g/doctor.png" width="300px" alt="doctor" />
                        </div>
                        <div class="uploader">
                            <input type="file" id="product-image" name="file" accept="image/*" required />
                        </div>
                    </div>
                    <div class="bottom__btns">
                        <a href="#" id="crop">Crop</a>
                        <a href="#" id="cancel">Cancel</a>
                    </div>
                </div>
                <button type="submit" id="submit">Add Product</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Admin Panel. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.js"></script>
    <script>
        const image = document.getElementById('imagePreview');
        const input = document.getElementById('product-image');
        const label = document.getElementById('product-image-label');
        const cropButton = document.getElementById('crop');
        const submitButton = document.getElementById('submit');
        let form = document.querySelector("form");
        let cropper;
        let croppedImageBlob; // This will store the cropped image blob

        // Image uploader
        const uploaderContainer = document.getElementsByClassName('uploader__container')[0];
        const backdrop = document.getElementById('backdrop');
        const cancelButton = document.getElementById('cancel');
        const closeButton = document.getElementById('close');
        const openButton = document.getElementById('uploader__container__loader');
        const imgPreview = document.getElementById('imgPreview');

        // Open image uploader
        openButton.addEventListener('click', () => {
            uploaderContainer.style.display = 'block';
            backdrop.style.display = 'block';
        });

        // Close image uploader
        closeButton.addEventListener('click', closeUploader);
        cancelButton.addEventListener('click', closeUploader);

        function closeUploader() {
            uploaderContainer.style.display = 'none';
            backdrop.style.display = 'none';
        }

        input.addEventListener('change', (e) => {
            const files = e.target.files;
            const reader = new FileReader();

            reader.onload = function() {
                image.src = reader.result;
                cropper = new Cropper(image, {
                    aspectRatio: 1, // Set the aspect ratio for cropping
                    viewMode: 2, // Set the view mode for cropping

                    // Set minimum/maximum width and height
                    minCropBoxWidth: 150, // Minimum width of the crop box
                    minCropBoxHeight: 150, // Minimum height of the crop box
                    maxCropBoxWidth: 300, // Maximum width of the crop box
                    maxCropBoxHeight: 300, // Maximum height of the crop box
                });
            };
            reader.readAsDataURL(files[0]);
        });

        cropButton.addEventListener('click', async () => {
            try {
                const croppedCanvas = cropper.getCroppedCanvas();

                // Modern way to get a Blob directly
                croppedImageBlob = await new Promise(resolve => croppedCanvas.toBlob(resolve, 'image/png'));

                // Create a URL for the Blob (temporary representation)
                const objectURL = URL.createObjectURL(croppedImageBlob);

                if (objectURL) {
                    // Update the image preview
                    imgPreview.src = objectURL;
                    imgPreview.style.display = 'block';
                    closeUploader();
                } else {
                    console.error('Error creating image preview URL.');
                }
            } catch (error) {
                console.error('Error cropping/displaying image:', error);
            }
        });

        submitButton.addEventListener('click', async (e) => {
            e.preventDefault(); // Prevent the default form submission

            // Create a new FormData object within the submit event handler
            const formData = new FormData(form);

            // Check if an image has been cropped
            if (!croppedImageBlob) {
                alert('Please select an image and crop it before submitting.');
                return;
            }

            // Append the cropped image to the form data
            formData.append('croppedImage', croppedImageBlob, 'croppedImage.png');

            // Console out formData elements for debugging
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            try {
                const response = await fetch('add-product.php', {
                    method: 'POST',
                    body: formData,
                });

                console.log(response);
                if (response.ok) {
                    const data = await response.json(); // Parse the response as JSON
                    alert(data.message);
                    // Redirect to products page
                    window.location.href = 'products.php';
                } else {
                    alert('Failed to upload image. Please try again later.');
                }
            } catch (error) {
                console.error('Error occurred while uploading the image:', error);
                alert('An error occurred while uploading the image.');
            }
        });
    </script>
</body>

</html>