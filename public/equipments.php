<?php

$equipments = require __DIR__ . '/../src/Data/equipments.php';
require __DIR__ . '/../src/Helpers/functions.php';

$totalItems = count($equipments);
$totalQuantity = getTotalEquipmentQuantity($equipments);
$availableItems = getAvailableEquipments($equipments);
$availableCount = count($availableItems);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Equipments</title>
</head>
<body>

<h1>Equipment List</h1>

<h2>Statistics</h2>
<ul>
    <li>Total equipment types: <?php echo $totalItems; ?></li>
    <li>Total quantity: <?php echo $totalQuantity; ?></li>
    <li>Available equipment: <?php echo $availableCount; ?></li>
</ul>

<h2>Equipment Details</h2>

<?php foreach ($equipments as $item): ?>
    <div style="border:1px solid #ccc; margin:10px; padding:10px;">
        <p><strong>Name:</strong> <?php echo formatEquipmentName($item['name']); ?></p>
        <p><strong>Category:</strong> <?php echo $item['category']; ?></p>
        <p><strong>Location:</strong> <?php echo $item['location']; ?></p>
        <p><strong>Year:</strong> <?php echo $item['year']; ?></p>
        <p><strong>Quantity:</strong> <?php echo $item['quantity']; ?></p>
        <?php
        $status = getEquipmentStatus($item['quantity']);

        $color = match($status) {
            'Out of stock' => 'red',
            'Low stock' => 'orange',
            default => 'green'
        };
        ?>

        <p>
            <strong>Status:</strong> 
            <span style="color: <?php echo $color; ?>;">
                <?php echo $status; ?>
            </span>
        </p>
    </div>
<?php endforeach; ?>

</body>
</html>