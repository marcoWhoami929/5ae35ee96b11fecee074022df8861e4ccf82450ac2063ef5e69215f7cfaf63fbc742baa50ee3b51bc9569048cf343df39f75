<?php


function getBoundaries($lat, $lng, $distance)
{
    $return = array();

    // Los angulos para cada dirección
    $cardinalCoords = array(
        'north' => '0',
        'south' => '180',
        'east' => '90',
        'west' => '270'
    );

    $rLat = deg2rad($lat);
    $rLng = deg2rad($lng);
    $rAngDist = $distance / 6371;

    foreach ($cardinalCoords as $name => $angle) {
        $rAngle = deg2rad($angle);
        $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
        $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));

        $return[$name] = array(
            'lat' => (float) rad2deg($rLatB),
            'lng' => (float) rad2deg($rLonB)
        );
    }

    return array(
        'min_lat'  => $return['south']['lat'],
        'max_lat' => $return['north']['lat'],
        'min_lng' => $return['west']['lng'],
        'max_lng' => $return['east']['lng']
    );
}

if (isset($_POST["latitud"])) {

    $latitud = $_POST["latitud"];
} else {

    $latitud = "";
}

if (isset($_POST["longitud"])) {

    $longitud = $_POST["longitud"];
} else {

    $longitud = "";
}




$lat =  $latitud;
$lng = $longitud;
$distance = 4; // Sitios que se encuentren en un radio de 1KM
$box = getBoundaries($lat, $lng, $distance);

$dsn = 'mysql:dbname=sanfranciscodekkerlab;host=localhost';
$usuario = 'root';
$pass = '';
/*
$dsn = 'mysql:dbname=localizador;host=localhost';
$usuario = 'root';
$pass = '';
*/
$db = new PDO($dsn, $usuario, $pass);
$stmt = $db->query('SELECT *, ( 6371 * ACOS( 
                                                     COS( RADIANS(' . $lat . ') ) 
                                                     * COS(RADIANS( lat ) ) 
                                                     * COS(RADIANS( lng ) 
                                                     - RADIANS(' . $lng . ') ) 
                                                     + SIN( RADIANS(' . $lat . ') ) 
                                                     * SIN(RADIANS( lat ) ) 
                                                    )
                                       ) AS distance 
                             FROM stores 
                             WHERE (lat BETWEEN ' . $box['min_lat'] . ' AND ' . $box['max_lat'] . ')
                             AND (lng BETWEEN ' . $box['min_lng'] . ' AND ' . $box['max_lng'] . ')
                             HAVING distance < ' . $distance . '
                             ORDER BY store ASC');

$localizador = $stmt->fetchAll(PDO::FETCH_ASSOC);

$datosJson = '{
             
            "data": [ ';

for ($i = 0; $i < count($localizador); $i++) {
    /*
    $logo = "<img src='" . $localizador[$i]["logo"] . "' alt='IMG' style='width:5%'>";
    $logoImagen = $logo . $localizador[$i]["sucursal"];

    $button = "<a href='https://www.google.com/maps/search/?api=1&query=" . $localizador[$i]["lat"] . "," . $localizador[$i]["lng"] . "&zoom=20' target='_blank'><button class='btn btn-info' type='button'>Ver</button></a>";
    */
    /*=============================================
                DEVOLVER DATOS JSON
                =============================================*/
    $direction = $localizador[$i]["domicile"] . "," . $localizador[$i]["municipality"] . "," . $localizador[$i]["state"] . "," . $localizador[$i]["postalCode"];
    $datosJson   .= '[
                  
                  "' . $localizador[$i]["store"] . '",
                  "' . $direction . '",
                  "' . $localizador[$i]["lat"] . '",
                  "' . $localizador[$i]["lng"] . '",
                  "' . $localizador[$i]["phone"] . '",
                  "' . $localizador[$i]["phone2"] . '"],';
}

$datosJson = substr($datosJson, 0, -1);

$datosJson .=  ']
                  
            }';

echo $datosJson;
