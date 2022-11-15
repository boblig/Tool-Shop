<h2>Admin Panel</h2>
<h4>Add An Item</h4>
<form method="POST" action="/AddItem">
   <input type="text" name="name" autocomplete="off" placeholder="Name">
   Manufacturer:
   <select name="manufacturer">
<?php
$admin = new Admin();
$admin->listOptions("SELECT id, name FROM manufacturers");
?>
   </select>
   Category:
   <select name="category">
<?php
$admin->listOptions("SELECT id, name FROM categories");
?>
   </select>
   <input type="number" name="price" autocomplete="off" placeholder="Price">
   <input type="Submit" value="Submit">
</form>
<h4>Add A Manufacturer</h4>
<form method="POST" action="/AddManufacturer">
   <input type="text" name="name" autocomplete="off" placeholder="Name">
   <input type="submit" value="Submit">
</form>
<h4>Add A Category</h4>
<form method="POST" action="/AddCategory">
   <input type="text" name="name" autocomplete="off" placeholder="Name">
   <input type="submit" value="Submit">
</form>
<h4>Delete Items</h4>
<form method="POST" action="/DeleteItem">
   <p>Separate IDs of items you wish to delete with commas.</p>
   <input type="text" name="id" autocomplete="off" placeholder="Item IDs">
   <input type="submit" value="Submit">
</form>
<form method="POST" action="/LogOut">
   <input class="btn-imp" type="submit" value="Logout">
</form>