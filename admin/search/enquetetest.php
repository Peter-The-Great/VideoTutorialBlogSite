<?php
require("../../php/database.php");
$result = $database->select("enquetes", ["id", "naam", "email", "kilometer", "min", "middel", "begin", "eind", "opmerkingen"], ["naam[~]" => "%" . $_POST['search'] . "%", "ORDER" => ["date" => "DESC"]]);

if (count($result) == 0){
        echo "<p>De video waar jij naar zocht kon niet worden gevodnen.</p>";
      }
                foreach ($result as $item) {
                echo "<td>" . $item["id"] . "</td><td>" .  $item["naam"] . "</td><td>" .  $item["email"] . "</td><td>" .  $item["kilometer"] . " Kilometer</td><td>" .  $item["min"] . " Minuten</td><td>" .  $item["middel"] . "</td><td>" .  $item["begin"] . "</td><td>" .  $item["eind"] . "</td><td>" .  $item["opmerkingen"] . "</td><tr>";
                }
?>