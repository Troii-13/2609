<?php
require 'C:\xampp\htdocs\proj-final\admin\db_connect.php'; // Include the database connection

// Fetch products from the database
$sql = "SELECT * FROM products WHERE status = 'active'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malditah Online Shop - Catalogue</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7e9fa;
        }

        .navbar {
            background-color: #f6c6fa;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #600060;
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
        }

        .navbar-links a {
            text-decoration: none;
            color: #600060;
            font-weight: bold;
            font-size: 1rem;
        }

        .main-content {
            padding: 2rem;
        }

        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffc1ef;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .filter-options {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .filter-section h3 {
            color: #600060;
            margin: 0;
            font-size: 1.2rem;
        }

        .filter-dropdown select {
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #600060;
            background-color: #ffe6f3;
            color: #600060;
            font-size: 1rem;
        }

        .filter-browse {
            color: #600060;
            font-size: 1rem;
        }

        .search-bar {
            margin-bottom: 2rem;
            text-align: center;
        }

        .search-bar input[type="text"] {
            width: 80%;
            max-width: 600px;
            padding: 0.8rem;
            border-radius: 5px;
            border: 1px solid #600060;
        }

        .search-bar button {
            padding: 0.8rem;
            background-color: #600060;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .scrollable-product-container {
            max-height: 500px;
            overflow-y: auto;
            border: 2px solid #600060;
            border-radius: 10px;
            padding: 1rem;
            background-color: #ffc1ef;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background-color: #ffe6f3;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .product-image {
            width: 100%;
            height: 200px;
            background-color: #d4b2d8;
            border-radius: 10px 10px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #600060;
        }

        .product-info {
            padding: 1rem;
        }

        .product-info h4 {
            margin: 0.5rem 0;
            color: #600060;
        }

        .product-info p {
            color: #800080;
            font-size: 1rem;
        }

        .bottom-banner {
            margin-top: 3rem;
            padding: 2rem;
            background-color: #ffc1ef;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .bottom-banner h2 {
            font-size: 2rem;
            color: #600060;
        }

        .bottom-banner p {
            color: #800080;
            font-size: 1.2rem;
        }

        footer {
            background-color: #fcb3ff;
            padding: 1rem;
            text-align: center;
            color: #600060;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="navbar-logo">
            <img src="logo.png" style="width:150px; height:50px;">
        </div>
        <nav class="navbar-links">
            <a href="indexcatwip.html">HOME</a>
            <a href="aboutus.html">ABOUT US</a>
            <a href="catalogue.php">CATALOGUE</a>
            
        </nav>
    </header>

    <main class="main-content">
        <div class="search-bar">
            <input type="text" placeholder="Search for products...">
            <button type="button">Search</button>
        </div>

        <div class="filter-section">
            <div class="filter-options">
                <h3>Browse By:</h3>
                <p class="filter-browse">All Products | Featured | Sale</p>
            </div>
            <div class="filter-dropdown">
                <select>
                    <option value="a-to-z">A to Z</option>
                    <option value="z-to-a">Z to A</option>
                    <option value="price-low-high">Price: Low to High</option>
                    <option value="price-high-low">Price: High to Low</option>
                </select>
            </div>
        </div>

        <div class="scrollable-product-container">
            <div class="product-grid">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="product-card">
                        <div class="product-image">
    <?php if (!empty($row['image_url'])): ?>
        <img src="http://localhost/proj-final/admin/<?php echo htmlspecialchars($row['image_url']); ?>" alt="Product Image" style="width:100%; height:100%; border-radius:10px 10px 0 0;">

    <?php else: ?>
        No Image
    <?php endif; ?>
</div>
                            <div class="product-info">
                                <h4><?php echo htmlspecialchars($row['name']); ?></h4>
                                <p>$<?php echo htmlspecialchars($row['price']); ?></p>
                                <p><?php echo htmlspecialchars($row['stock']); ?> items in stock</p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No products available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="bottom-banner">
            <h2>Exclusive Offers</h2>
            <p>Sign up now to receive early access to our latest collections and special discounts!</p>
        </div>
    </main>

    <footer>
        &copy; Empowering Style and Confidence - Malditah Online Shop 2024.
    </footer>
</body>
</html>
