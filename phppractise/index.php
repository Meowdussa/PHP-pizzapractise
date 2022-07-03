<?php

include('config/db_connect.php');

// query for all pizza
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); // FETCHING THE RESULT AND DISPLAY IT AS AN ARRAY IN MYSQLI_ASSOC

// free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

//explode(',', $pizzas[0]['ingredients']);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas~</h4>
<div class="container">
  <div class="row">

    <!-- shaun's code -->

    <?php foreach ($pizzas as $pizza) : ?>

      <div class="col s6 md3">
        <div class="card z-depth-0">
          <img src="img/pizza.png" alt="" class="pizza">
          <div class="card-content center">
            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
            <ul class="grey-text">
              <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                <li><?php echo htmlspecialchars($ing); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="card-action right-align">
            <a class="brand-text" href="details.php?id=<?php echo $pizza['id'] ?>">more info</a>
          </div>
        </div>
      </div>

    <?php endforeach; ?>
    <!-- using this instead of {} so that it is easier to read -->

    <?php if (count($pizzas) >= 3) : ?>
      <p>There is more than 3 pizza</p>
    <?php else : ?>
      <p>There are fewer than 3 pizzas</p>
    <?php endif; ?>

  </div>
</div>
<?php include('templates/footer.php'); ?>


</html>