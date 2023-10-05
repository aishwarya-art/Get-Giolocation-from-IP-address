# Get-Giolocation-from-IP-address using PHP

    Get the IP address of the current user.
    Get geolocation information from the IP address using PHP.
    Detect the visitor’s country, state (regions), city, and postal code associated with their IPv4 and IPv6 addresses.

## Requirements

1.GeoLite2 Geolocation Database:

  Before getting started, you need to download the latest GeoLite2-City database from the MaxMind account.
  
  Place this GeoLite2 database binary file (GeoLite2-City.mmdb) in your project directory.
  
  For Testing purpose I have added atest database,for readable purpose csv file is also attached.

2.Download & Install GeoIp2 Library:

  The GeoIp2 library helps to retrieve the geolocation data from GeoLite2 binary database based on the IP address using PHP.
  
  Run the following command to download and install the GeoIp2 PHP library via Composer.
  
  composer require geoip2/geoip2

## Features 

This IP Geolocation script provides an easy way to get the location of IP address using PHP.

The following geolocation data will be returned from the database based on the given IP address.

    IP Address (traits->network)
    Country Code (country->isoCode)
    Country Name (country->name)
    State Code (mostSpecificSubdivision->isoCode)
    State Name (mostSpecificSubdivision->name)
    City Name (city->name)
    Zipcode (postal->code)
    Latitude (location->latitude)
    Longitude (location->longitude)


![Gioloaction](https://github.com/aishwarya-art/Get-Giolocation-using-IP-address/assets/113532088/84b315a1-5e4c-4df5-925b-ef243b2473f0)

## credits 
Created by Aishwarya MS
