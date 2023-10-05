<?php
// Include autoloader & define namespace
require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;
// Define IP address
$ip_addr = !empty($_POST['ip_address']) ? $_POST['ip_address'] : $_SERVER["REMOTE_ADDR"];
try {
// Create a new Reader object and specify the path to the database file
$cityDbReader = new Reader('vendor/geoip2/geoip2/src/Database/GeoIP2-City-Test.mmdb');
// Get geolocation data
$geoData = $cityDbReader->city ($ip_addr);
} catch (Exception $e) {
$api_error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title>IP Geolocation with PHP </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Stylesheet file -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Get IP Geolocation Data with PHP</h1>
<div class="wrapper">
    <!-- Status message -->
        <?php if (!empty($api_error)) { ?>
        <div class="alert alert-danger"><?php echo $api_error; ?></div>
        <?php } ?>
    <!-- IP address input form --> 
        <form method="post">
        <div class="input-group">
        <span class="input-group-text">IP Address: </span>
        <input type="text" name="ip_address" class="form-control" value="<?php echo $ip_addr; ?>">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Get Geolocation">
        </form>

        <!-- Geolocation data -->
    <?php if (!empty($geoData)) {?>
    <div class="geo-data">
        <p>IP Address: <b><?php echo !empty($geoData->traits->ipAddress)?$geoData->traits->ipAddress: ''; ?></b></p>
        <p>Network: <b><?php echo !empty($geoData->traits->network) ?$geoData->traits->network: ''; ?></b></p>
        <p>Country Code: <b><?php echo !empty($geoData-> country->isoCode) ? $geoData->country->isoCode: ''; ?></b></p>
        <p>Country Name: <b><?php echo !empty($geoData->country->name)?$geoData->country->name: ''; ?></b></p>
        <p>State Code: <b><?php echo !empty($geoData->mostSpecificSubdivision->isoCode)?
        $geoData->mostSpecificSubdivision->isoCode: ''; ?></b></p>
        <p>State Name: <b> <?php echo !empty($geoData->mostSpecificSubdivision->name)?
        $geoData->mostSpecificSubdivision->name: ''; ?></b></p>
        <p>City Name: <b><?php echo !empty($geoData->city->name) ?$geoData->city->name: ''; ?></b></p>
        <p>Zipcode: <b><?php echo !empty($geoData->postal->code) ? $geoData->postal->code: ''; ?></b></p>
        <p>Latitude: <b><?php echo !empty($geoData->location->latitude) ?$geoData->location->latitude: ''; ?></b></p>
        <p>Longitude: <b><?php echo !empty($geoData->location->longitude)?
        $geoData->location->longitude: ''; ?> </b></p>
    </div>
    <?php } ?> 
    </div>

</body>
</html>