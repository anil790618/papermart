<?php

// Define the data for the bar graph
$data = array(
    array('label' => 'Category A', 'value' => 20),
    array('label' => 'Category B', 'value' => 35),
    array('label' => 'Category C', 'value' => 15),
    array('label' => 'Category D', 'value' => 45),
);

// Set the dimensions of the graph
$width = 400;
$height = 200;
$barWidth = 200;
$barHeight = 30;
$padding = 10;

// Create a new image
$image = imagecreatetruecolor($width, $height);

// Set the background color
$bgColor = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);

// Set the bar color
$barColor = imagecolorallocate($image, 0, 0, 255);

// Set the font size and color
$fontColor = imagecolorallocate($image, 0, 0, 0);
$fontPath = 'public/public/icons/font-awesome-old/fonts/fontawesome-webfont3e6e3e6e.ttf'; // Change this to the path of your font file

// Calculate the maximum value in the data
$maxValue = 0;
foreach ($data as $item) {
    if ($item['value'] > $maxValue) {
        $maxValue = $item['value'];
    }
}

// Calculate the height of each bar
$barHeights = [];
foreach ($data as $item) {
    $barHeights[] = round(($item['value'] / $maxValue) * ($barWidth - ($padding * 2)));
}

// Output the HTML and CSS
?>
<!DOCTYPE html>
<html>
<head>
    <title>Horizontal Bar Graph</title>
    <style>
        .bar-graph {
            
            flex-direction: column;
            align-items: center;
        }

        .bar-graph-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .bar-graph-label {
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }

        .bar-graph-bar {
            width: <?php echo $barWidth; ?>px;
            height: <?php echo $barHeight; ?>px;
            background-color: blue;
            margin-right: 10px;
        }

        .bar-graph-value {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="bar-graph">
        <?php foreach ($data as $key => $item) { ?>
            <div class="bar-graph-item">
                <div class="bar-graph-label"><?php echo $item['label']; ?></div>
                <div class="bar-graph-bar" style="width: <?php echo $barHeights[$key]; ?>px;"></div>
                <div class="bar-graph-value"><?php echo $item['value']; ?></div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
 <?php

                                // Define the data for the bar graph
                                $data = array(
                                    array('label' => 'Category A', 'value' => 20),
                                    array('label' => 'Category B', 'value' => 35),
                                    array('label' => 'Category C', 'value' => 15),
                                    array('label' => 'Category D', 'value' => 55),
                                );

                                // Set the dimensions of the graph
                                $width = 400;
                                $height = 200;
                                $barWidth = 450;
                                $barHeight = 50;
                                $padding = 10;

                                // Create a new image
                                $image = imagecreatetruecolor($width, $height);

                                // Set the background color
                                $bgColor = imagecolorallocate($image, 255, 255, 255);
                                imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);

                                // Set the bar color
                                $barColor = imagecolorallocate($image, 0, 0, 255);

                                // Set the font size and color
                                $fontColor = imagecolorallocate($image, 0, 0, 0);
                                $fontPath = 'public/public/icons/font-awesome-old/fonts/fontawesome-webfont3e6e3e6e.ttf'; // Change this to the path of your font file

                                // Calculate the maximum value in the data
                                $maxValue = 0;
                                foreach ($data as $item) {
                                    if ($item['value'] > $maxValue) {
                                        $maxValue = $item['value'];
                                    }
                                }

                                // Calculate the height of each bar
                                $barHeights = [];
                                foreach ($data as $item) {
                                    $barHeights[] = round(($item['value'] / $maxValue) * ($barWidth - ($padding * 2)));
                                }


                                ?>
                                <?php foreach ($data as $key => $item) { ?>
                                    <div class="bar-graph-item">
                                        <div class="bar-graph-label"><?php echo $item['label']; ?></div>
                                        <div class="bar-graph-bar" style="width: <?php echo $barHeights[$key]; ?>px;"></div>
                                        <div class="bar-graph-value"><?php echo $item['value']; ?></div>
                                    </div>
                                <?php } ?>