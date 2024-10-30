<?php
$NPK = $_POST['NPK'];
$soil_type = $_POST['soil_type'];
$weather_conditions = $_POST['weather_conditions'];

// Sample data for prediction logic
$crop_recommendations = [
    "10-5-20" => ["wheat", "barley"],
    "20-10-5" => ["corn", "sorghum"],
    "5-15-10" => ["rice", "soybean"]
];

// Placeholder logic for crop prediction based on NPK
$predicted_crops = [];
foreach ($crop_recommendations as $npk_levels => $crops) {
    if ($NPK == $npk_levels) {
        $predicted_crops = $crops;
        break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Prediction Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .result-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .result-container ul {
            list-style: none;
            padding: 0;
        }
        .result-container li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Recommended Crops</h2>
        <?php if (!empty($predicted_crops)) { ?>
            <ul>
                <?php foreach ($predicted_crops as $crop) { ?>
                    <li><?php echo htmlspecialchars($crop); ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>No specific crop recommendations found for given NPK levels.</p>
        <?php } ?>
    </div>
</body>
</html>
