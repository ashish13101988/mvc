<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table, th, td {
        border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>car</h1>
    <table  style="cell-border=1">
    <?php 
        foreach($this->view_data as $cars){
            $cardetails = explode(',',$cars);
            echo '<tr>';
                foreach($cardetails as $details){
                    echo "<td>".$details."</td>";
                }
            echo '</tr>';
        }
      
    
    ?>
    </table>  
</body>
</html>