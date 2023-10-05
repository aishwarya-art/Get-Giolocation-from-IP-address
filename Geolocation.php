<?php
require_once 'vendor/autoload.php'; 
use GeoIp2\Database\Reader;

try { 
    // Create a new Reader object and specify the path to the database file 
    $cityDbReader = new Reader('path/to/GeoLite2-City.mmdb'); 
   
    // Get geolocation data 
    $record = $cityDbReader->city($ip_addr); 
  } catch(Exception $e) { 
    $api_error = $e->getMessage(); 
  } 
   
  if(empty($api_error)){ 
    $ip_address = !empty($record->traits->network)?$record->traits->network:''; 
    $country_code = !empty($record->country->isoCode)?$record->country->isoCode:''; 
    $country_name = !empty($record->country->name)?$record->country->name:''; 
    $state_code = !empty($record->mostSpecificSubdivision->isoCode)?$record->mostSpecificSubdivision->isoCode:''; 
    $state_name = !empty($record->mostSpecificSubdivision->name)?$record->mostSpecificSubdivision->name:''; 
    $city_name = !empty($record->city->name)?$record->city->name:''; 
    $zipcode = !empty($record->postal->code)?$record->postal->code:''; 
    $latitude = !empty($record->location->latitude)?$record->location->latitude:''; 
    $longitude = !empty($record->location->longitude)?$record->location->longitude:''; 
   
    echo 'IP Address: '.$ip_address.'<br/>'; 
    echo 'Country Code: '.$country_code.'<br/>'; 
    echo 'Country Name: '.$country_name.'<br/>'; 
    echo 'State Code: '.$state_code.'<br/>'; 
    echo 'State Name: '.$state_name.'<br/>'; 
    echo 'City Name: '.$city_name.'<br/>'; 
    echo 'Zipcode: '.$zipcode.'<br/>'; 
    echo 'Latitude: '.$latitude.'<br/>'; 
    echo 'Longitude: '.$longitude; 
  }else{ 
    echo $api_error; 
  }