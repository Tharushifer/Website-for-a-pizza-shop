<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: grey;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #474e5d;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="about-section">
  <h1>About Us Page</h1>
  <p>Who we are and What we do.</p>
  <p>WeAreAwesome, a medium-scale
restaurant chain which specializes in pizzas. Restaurants are open daily from 6pm till 12 midnights every day. They have two main types
of pizzas, Traditional Italiano and Modern Magic. A pizza can have different types of toppings
[Mushrooms, Olives, Extra cheese, Pepperoni, Chicken, Pineapple, etc.] And one pizza will
have at most 3 different toppings. There are 3 different sizes of pizzas offered [Personal,
Regular, and Large]. Apart from pizzas WeAreAwesome offers its customers starters, pasta
dishes, desserts and beverages.
WeAreAwesome offers 2 different menu options to its customers [Regular, Promotional]. A
Regular menu contains different food items and a customer may order one or more food items.
The promotional menu contains different set menus for individuals, 2 persons or 4 persons. A
set menu will contain a starter, pizza or pasta dish, dessert and a beverage. </p>
</div>

<h2 style="text-align:center">Our Restaurants.</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="res1.avif" alt="Jane" style="width:100%">
      <div class="container">
        <h2>WeAreAwesome @ Ratnapura</h2>
        <p class="title">Bandaranayake Mawatha, Ratnapura.</p>
        <p>We are open daily from 6pm till 12 midnights.</p>
        <h3><button class="button"><a href="contact.php">Contact</a></button></h3>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="res2.jpg" alt="Mike" style="width:100%">
      <div class="container">
        <h2>WeAreAwesome @ Nugegoda</h2>
        <p class="title">High Level Road, Nugegoda.</p>
        <p>We are open daily from 6pm till 12 midnights.</p>
        <h3><button class="button"><a href="contact.php">Contact</a></button></h3>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="res3.avif" alt="John" style="width:100%">
      <div class="container">
        <h2>WeAreAwesome @ Wattala</h2>
        <p class="title">Negambo Road, Wattala.</p>
        <p>We are open daily from 6pm till 12 midnights.</p>
        <h3><button class="button"><a href="contact.php">Contact</a></button></h3>
      </div>
    </div>
  </div>
</div>

</body>
</html>
