<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('David Aaron Echon', 'echon.davidaaron@auf.edu.ph');
?>
<html>
<head>
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css"rel="stylesheet"/>
    <style>
        h1{
        font-family: Share Tech;
        }
    </style>
  </head>
<body>
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <small style="font-family:Share Tech;font-size:46px">GPYOU</small>
        </a>
        <a class="text-reset me-3" href="shopping-cart.php">
              <span><i class="fas fa-shopping-cart"></i></span>
              <img src="cart-fill.svg" height="20"/>
            </a>
    </div>
    </nav>
    <div
    class="p-5 text-center bg-image"
    style="
      background-image: url(https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/geforce-rtx-turing/2080-ti/gallery/geforce-rtx-2080-ti-gallery-c-641-u@2x.jpg);
      height: 600px;
      width: 1600px;
    "
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Achieve Greater by Being You.</h1>
          <h4 class="mb-3">Welcome! <?php echo $customer->getName(); ?> </h4>
        </div>
      </div>
    </div>
  </div>
    </header>
    <?php foreach ($products as $product): ?>
        <section style="background-color: #eee;">
            <div class="container py-2">
                <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card text-black">
                    <i class="fab fa-gpu fa-lg pt-3 pb-1 px-3"></i>
                    <img src="<?php echo $product->getImage(); ?>"
                        class="card-img-top"
                    />
                    <div class="card-body">
                        <div class="text-center">
                        <h3 class="card-title"><?php echo $product->getName(); ?></h3>
                        <p class="text-muted mb-4"><?php echo $product->getDescription(); ?><br/></p>
                    </div>
                        <div class="d-flex justify-content-between total font-weight-bold mt-4">
                        <span>PHP <?php echo $product->getPrice(); ?></span>
                        <div class="d-flex flex-row">
                    </button>
                    <button type="button" class="btn btn-success flex-fill ms-1">Add to Cart</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
</body>
</html>