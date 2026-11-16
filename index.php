
<?php
date_default_timezone_set("Asia/Kolkata");

$currentDate = date("d F Y");
$currentTime = date("h:i:s A");
$currentDay = date("l");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>PHP Date and Time</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="clock-icon">🕒</div>

    <h1>Date & Time</h1>
    <p class="subtitle">Current Date, Time and Day</p>

    <div class="info-box">
        <p class="label">CURRENT DATE</p>
        <h2><?php echo $currentDate; ?></h2>
    </div>

    <div class="info-box">
        <p class="label">CURRENT TIME</p>
        <h2 id="clock"><?php echo $currentTime; ?></h2>
    </div>

    <div class="info-box">
        <p class="label">CURRENT DAY</p>
        <h2><?php echo $currentDay; ?></h2>
    </div>

    <p class="footer">Timezone: Asia/Kolkata (IST)</p>
</div>

<script>
    const serverTime = <?php echo json_encode(time() * 1000); ?>;
    const loadedAt = Date.now();

    function updateClock() {
        const elapsed = Date.now() - loadedAt;
        const now = new Date(serverTime + elapsed);

        document.getElementById("clock").textContent =
            new Intl.DateTimeFormat("en-IN", {
                timeZone: "Asia/Kolkata",
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit",
                hour12: true
            }).format(now);
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>

</body>
</html>
