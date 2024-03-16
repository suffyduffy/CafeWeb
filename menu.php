<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include "inc/head.inc.php";
?>
</head>
<body>
<?php
    include "inc/header.inc.php";
?>
<div class="heading">
   <h3>our menu</h3>
   <p><a href="home.php">Home </a> <span> / Menu</span></p>
</div>

<section class="products">

   <h1 class="title">All Menu</h1>

   <div class="box-container">
      <article class="food-product">
         <h3>Beef Lasagna</h3>
         <figure>
                 <img src="images/Food/Lasagna.jpg" alt="Beef Lasagna" class="food-thumbnail" width="200" height="200"/>
         </figure>
      </article>
      <article class="food-product">
         <h3>Pepperoni Pizza</h3>
         <figure>
                 <img src="images/Food/pizza.jpg" alt="Pizza" class="food-thumbnail" width="200" height="200"/>
         </figure>
      </article>
      <article class="food-product">
         <h3>Spicy Chicken</h3>
         <figure>
                 <img src="images/Food/wholeChicken.png" alt="Chicken" class="food-thumbnail" width="200" height="200"/>
         </figure>
      </article>
      <article class="food-product">
         <h3>Beef Star Burger</h3>
         <figure>
                 <img src="images/Food/beefBurger.png" alt="Burger" class="food-thumbnail" width="200" height="200"/>
         </figure>
      </article>
      <article class="food-product">
         <h3>HomeMade Fruitpunch</h3>
         <figure>
                 <img src="images/Food/drink-4.png" alt="Fruitpunch" class="food-thumbnail" width="200" height="200"/>
         </figure>
      </article>
      <article class="food-product">
         <h3>HomeMade Orange Juice</h3>
         <figure>
                 <img src="images/Food/drink-1.png" alt="Orange" class="food-thumbnail" width="200" height="200"/>
         </figure>
      </article>
      <article class="food-product">
         <h3>White Coffee</h3>
         <figure>
                 <img src="images/Food/drink-2.png" alt="Coffee" class="food-thumbnail" width="200" height="200"/>
         </figure>
      </article>
      <article class="food-product">
         <h3>Strawberry Frappe</h3>
         <figure>
                 <img src="images/Food/dessert-1.png" alt="Frappe" class="food-thumbnail" width="200" height="200"/>
         </figure>
      </article>

   </div>

</section>
<?php
   include "inc/footer.inc.php";
?>
<div class="loader">
   <img src="images/loader.gif" alt="">
</div>

<script src="js/script.js"></script>

</body>
</html>