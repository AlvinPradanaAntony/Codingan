<?php
    $salaries = array( 
    "mohammad" => 2000, 
    "qadir" => 1000, 
    "zara" => 500
    );
    echo "Salary of mohammad is ". $salaries['mohammad'] . "<br />";
    echo "Salary of qadir is ". $salaries['qadir']. "<br />";
    echo "Salary of zara is ". $salaries['zara']. "<br />";

    $salaries['mohammad'] = "high";
    $salaries['qadir'] = "medium";
    $salaries['zara'] = "low";
    echo "Salary of mohammad is ". $salaries['mohammad'] . "<br />";
    echo "Salary of qadir is ". $salaries['qadir']. "<br />";
    echo "Salary of zara is ". $salaries['zara']. "<br />";
?>