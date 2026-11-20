<?php
// Set the time zone and read the current date, time and day
date_default_timezone_set("Asia/Kolkata");

$currentDate = date("d F Y");      // e.g. 15 November 2026
$currentTime = date("h:i:s A");    // e.g. 10:45:30 AM
$currentDay  = date("l");          // e.g. Sunday
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 11 - Current Date, Time and Day</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        }
        .clock {
            width: 400px;
            padding: 34px;
            text-align: center;
            color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4);
        }
        h2 { margin: 0 0 22px; letter-spacing: 1px; }
        .row {
            margin: 12px 0;
            padding: 14px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 12px;
        }
        .label { font-size: 13px; text-transform: uppercase; color: #9fd8e8; }
        .value { margin-top: 4px; font-size: 28px; font-weight: bold; }
        .time  { color: #ffd166; }
    </style>
</head>
<body>

<div class="clock">
    <h2>&#128197; Date, Time &amp; Day</h2>

    <div class="row">
        <div class="label">Current Date</div>
        <div class="value"><?php echo $currentDate; ?></div>
    </div>

    <div class="row">
        <div class="label">Current Time</div>
        <div class="value time"><?php echo $currentTime; ?></div>
    </div>

    <div class="row">
        <div class="label">Day of the Week</div>
        <div class="value"><?php echo $currentDay; ?></div>
    </div>
</div>

</body>
</html>
