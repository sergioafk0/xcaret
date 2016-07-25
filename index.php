<?php
    /* Se hace la consulta para obtener los datos*/
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, 'https://experienciasxcaret.github.io/Developers/api/front.json');
    $result = curl_exec($ch);
    curl_close($ch);

    /* Se obtiene el objeto del json*/
    $obj = json_decode($result)[0];

    /* Se genera el iframe a partir de la url del video para incrustarlo en la página*/
    $obj->videoYTembed = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe src=\"//www.youtube.com/embed/$1?autoplay=0\" frameborder=\"0\" allowfullscreen></iframe>",$obj->videoYT);


/*Funcion para determinar si se recibe el mapa360 en el json consultado */
function tieneMapa($obj){
    if(property_exists($obj,'videoYTembed')){
        if($obj->videoYTembed != '' && !is_null($obj->videoYTembed))
            return true;
    }
    return false;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fichas de producto -UXPin Preview</title>
    <!-- Add Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/vendors/bootstrap/css/bootstrap.min.css">
    <!-- Fuentes utilizadas en el sitio-->
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa:700' rel='stylesheet' type='text/css'>
    <!-- Add fancyBox main JS and CSS files -->
    <link rel="stylesheet" type="text/css" href="vendors/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
    <!-- estilos propios de la página -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
</head>
<body>
    <header>
        <div id="usuario">
            <nav class="navbar">
                <div class="container">
                    <ul class="nav navbar-nav navbar-right">
                        <li>ATENCIÓN AL CLIENTE</li>
                        <li>
                            <img src="http://upload.uxpin.s3.amazonaws.com/files/103822/110843/user.png?1468080138">
                            ACCEDER / REGISTRAR
                        </li>
                        <li>
                            <svg version="1.2" preserveAspectRatio="none" viewBox="0 0 256 256" class="ng-element" style="opacity: 1; width: 16px; height: 13px;" fill="#ffffff"><path d="M245.511,52.267c3.23,0,5.924,1.247,8.048,3.769c2.127,2.494,2.864,5.215,2.212,8.192l-14.993,80.297 c-0.567,2.323-1.786,4.28-3.686,5.838c-1.898,1.588-4.194,2.354-6.887,2.354H79.616l4.847,23.354 c0.369,1.474,1.19,2.721,2.438,3.685s2.608,1.474,4.11,1.474h118.928c1.475,0,2.75,0.511,3.827,1.587 c1.049,1.078,1.587,2.325,1.587,3.827v10.827c0,1.474-0.51,2.721-1.53,3.686c-1.021,0.963-2.324,1.444-3.884,1.444h-22.646H96.708 H82.252c-1.502,0-3.174-0.142-5.074-0.481c-1.898-0.312-3.543-0.766-4.932-1.305c-0.567-0.197-1.219-0.793-1.956-1.813 s-1.445-2.154-2.154-3.401c-0.68-1.247-1.275-2.494-1.729-3.77c-0.481-1.247-0.793-2.239-0.963-2.977L35.571,47.674 c-0.368-1.473-1.19-2.664-2.438-3.599s-2.636-1.389-4.11-1.389H5.413C1.785,42.686,0,40.872,0,37.272V26.701 c0-3.6,1.785-5.414,5.413-5.414h32.085c1.502,0,3.259,0.198,5.299,0.567c2.013,0.369,3.685,0.737,4.988,1.105 c0.568,0.369,1.22,1.048,2.013,2.012c0.794,0.964,1.502,2.069,2.155,3.259c0.652,1.219,1.218,2.438,1.672,3.685 c0.454,1.247,0.793,2.267,0.964,3.004l3.77,17.347H245.511L245.511,52.267z M80.863,218.728c0-4.337,1.531-8.135,4.648-11.31 c3.09-3.202,6.831-4.818,11.196-4.818c4.535,0,8.361,1.616,11.507,4.818c3.174,3.175,4.733,6.973,4.733,11.31 c0,4.365-1.56,8.106-4.733,11.252c-3.146,3.146-6.973,4.733-11.507,4.733c-4.365,0-8.106-1.588-11.196-4.733 C82.395,226.834,80.863,223.093,80.863,218.728z M171.307,218.728c0-4.337,1.559-8.135,4.649-11.31 c3.117-3.202,6.887-4.818,11.336-4.818c4.338,0,8.078,1.616,11.168,4.818c3.117,3.175,4.678,6.973,4.678,11.31 c0,4.365-1.561,8.106-4.678,11.252c-3.09,3.146-6.83,4.733-11.168,4.733c-4.363,0-8.104-1.588-11.252-4.733 C172.895,226.834,171.307,223.093,171.307,218.728z" fill="#ffffff"/></svg>
                            CARRITO
                            <div class="items">
                                2
                            </div>
                        </li>
                        <li>MXN-$</li>
                        <li>
                            <img src="https://uc.uxpin.com/files/103822/110843/usa.jpg?1468080138">
                            IDIOMA
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div id="sitio">
            <div class="container">
                <div id="superior">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="logo">
                                <span id="logo">LOGOTIPO</span>
                                <p>OPERADO POR <strong>EXPERIENCIAS XCARET</strong></p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <svg version="1.2" preserveAspectRatio="none" viewBox="0 -14.553211888782357 706 706" class="ng-element" style="opacity: 1; width: 16px; height: 16px;" fill="#000000"><g><g xmlns:default="http://www.w3.org/2000/svg"><path d="M705.1,349.9L352.5,0L0,349.9l18.4,18.4l44.7-42.1v349.9h578.8V326.2l42.1,42.1L705.1,349.9z M405.2,649.8H299.9V439.4   h105.2V649.8z M615.6,649.8H431.5V413.1H273.6v236.8H89.5V299.9L352.5,36.8l263.1,263.1V649.8z" fill="#000000"/><path d="M273.6,255.2c0,44.7,34.2,78.9,78.9,78.9s78.9-34.2,78.9-78.9s-34.2-78.9-78.9-78.9S273.6,210.5,273.6,255.2z M405.2,255.2   c0,28.9-23.7,52.6-52.6,52.6s-52.6-23.7-52.6-52.6s23.7-52.6,52.6-52.6S405.2,226.3,405.2,255.2z" fill="#000000"/></g></g></svg>
                                    INICIO
                                </li>
                                <li>
                                    <svg version="1.2" preserveAspectRatio="none" viewBox="0 -6.495123780945235 52 52" class="ng-element" style="opacity: 1; width: 16px; height: 16px;" fill="#000000"><g><g><path d="M48,6H34.4L31,0H20l-3.4,6H4c-2.2,0-4,1.8-4,4v25c0,2.2,1.8,4,4,4h44c2.2,0,4-1.8,4-4V10C52,7.8,50.2,6,48,6z M50,35    c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V10c0-1.1,0.9-2,2-2h13.7l0.6-1l2.9-5h8.8l2.8,5l0.5,1H48c1.1,0,2,0.9,2,2V35z M5,5h8    c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H5C4.4,3,4,3.4,4,4C4,4.6,4.4,5,5,5z M43.1,11.8c-1.6,0-2.9,1.3-2.9,2.9c0,1.6,1.3,2.9,2.9,2.9    c1.6,0,2.9-1.3,2.9-2.9C46,13.1,44.7,11.8,43.1,11.8z M43.1,15.7c-0.5,0-0.9-0.4-0.9-0.9c0-0.5,0.4-0.9,0.9-0.9    c0.5,0,0.9,0.4,0.9,0.9C44,15.3,43.6,15.7,43.1,15.7z M24.8,9.7c-7,0-12.7,5.7-12.7,12.7S17.8,35,24.8,35c7,0,12.7-5.7,12.7-12.7    S31.7,9.7,24.8,9.7z M24.8,33c-5.9,0-10.7-4.8-10.7-10.7c0-5.9,4.8-10.7,10.7-10.7c5.9,0,10.7,4.8,10.7,10.7    C35.4,28.2,30.6,33,24.8,33z" fill="#000000"/></g></g><g/></svg>
                                    MIS FOTOS
                                </li>
                                <li>PREGUNTAS FRECUENTES</li>
                                <li>
                                    <svg version="1.2" preserveAspectRatio="none" viewBox="-11.506 0 44 44" class="ng-element" style="opacity: 1; width: 20px; height: 20px;" fill="#000000"><g><path d="M15,44H4V23l-4,0l0-9h4l0.2-4.2c0-4.7,2.6-9.8,10-9.8l7.6,0v9.2H16c-0.6,0-1,0.1-1,0.8v4h6l0,9l-6,0V44z M6,42h7l0.1-21h6.1  L19,16h-6l0.1-5.8c0-2.1,1.5-3,2.9-3h3.8V2l-5.6,0C6.8,2,6.3,8,6.3,9.8L6,16H2v5h4V42z" xmlns:default="http://www.w3.org/2000/svg" fill="#000000"/></g></svg>
                                    <svg version="1.2" preserveAspectRatio="none" viewBox="0 -4.5 49 49" class="ng-element" style="opacity: 1; width: 20px; height: 20px;" fill="#000000"><g><path d="M16.5,40C16.5,40,16.5,40,16.5,40c-4.5,0-8.7-1-12-3c-0.4-0.2-5.1-4-4.5-6.3c0.1-0.5,0.6-1.3,2.2-1.3c0.5,0,1.1,0,1.6,0  c1.8,0,3.5,0,5-0.2c-1.6-1.1-2.8-2.6-3.4-4.2c-0.3-0.6-0.5-1.6-0.5-2.6c-0.6-0.6-1-1.2-1.4-1.9c-1.1-1.9-1.6-4.1-1.5-6.6  c0-0.8,0.2-1.4,0.6-1.8c-0.1-0.3-0.2-0.6-0.2-0.9C2.1,10.2,2,9.1,2.1,7.7C2.2,5,3.1,2.9,5.1,1c0.3-0.3,0.8-0.5,1.2-0.5  c1.3,0,2.4,1.3,3.6,3c0.2,0.3,0.5,0.7,0.6,0.8c2.6,2.5,5.8,4.2,10.4,5.5c0.2-2.3,1.2-4.5,2.9-6.2C26,1.3,29.1,0,32.3,0  c1.2,0,2.3,0.2,3.4,0.5C37,1,38.3,1.7,39.4,2.6c1-0.2,2-0.5,3-1c0.1-0.1,0.3-0.1,0.4-0.2c0.7-0.4,1.6-0.9,2.4-0.9  c0.8,0,1.5,0.5,1.7,1.2c0.3,0.7,0.1,1.6-0.2,2.5c0.5,0,1,0.1,1.3,0.3h0.2l0.3,0.4l0,0c0,0,0,0,0,0.1c0,0,0,0,0,0L48.8,5l0.6,0.8  L49.2,6c0.1,1.4-1,3.1-2.1,4.5c-0.4,0.5-0.9,1-1.4,1.4c-0.8,0.7-1.4,1.2-1.3,1.7c0.4,4.1-1.3,8.3-2.6,11.2  c-3,6.7-8.7,11.6-15.8,13.9C22.9,39.5,19.6,40,16.5,40z M2.1,31.4c0.4,1,2.7,3.4,3.5,3.9c3,1.8,6.8,2.7,10.9,2.7h0  c2.9,0,5.9-0.5,8.7-1.4c6.6-2.1,11.8-6.6,14.6-12.8c1.2-2.6,2.8-6.6,2.4-10.2c-0.1-1.5,1-2.5,2-3.3c0.4-0.4,0.8-0.7,1.1-1.1  c1.6-2.1,1.7-2.9,1.7-3.2c0,0,0,0-0.1,0c-0.3,0-0.7,0.1-1.1,0.2c-0.2,0.1-0.4,0.1-0.5,0.1l-2,0.5l0.8-1.8c0.8-1.8,0.9-2.5,0.9-2.8  c-0.4,0.1-1,0.4-1.3,0.6c-0.2,0.1-0.5,0.3-0.6,0.3c-1.4,0.7-2.8,1.1-4.1,1.3l-0.5,0.1l-0.4-0.3c-1-0.9-2.1-1.6-3.3-1.9  C34.2,2.1,33.2,2,32.3,2c-2.6,0-5.1,1.1-6.9,2.9C23.7,6.6,22.9,8.7,23,11l0.1,1.4L21.7,12c-5.5-1.5-9.5-3.5-12.6-6.4  c-0.2-0.2-0.5-0.6-0.8-1C7.9,4.1,6.9,2.8,6.4,2.5C4.9,4,4.2,5.6,4.1,7.8C4,9,4.1,10,4.3,10.9c0.1,0.5,0.3,1,0.4,1.4l0.5,1.2L4,13.7  c0,0.1,0,0.2,0,0.4c-0.1,2.1,0.4,4,1.2,5.5c0.4,0.7,0.8,1.3,1.4,1.8l0.3,0.3l0,0.5c-0.1,0.6,0.1,1.4,0.4,2.2  c0.7,1.9,2.5,3.5,4.8,4.4l2.6,1L12,30.6c-2.3,0.7-4.6,0.8-6.6,0.8c-0.5,0-1,0-1.5,0c-0.5,0-1,0-1.6,0C2.2,31.4,2.1,31.4,2.1,31.4z" xmlns:default="http://www.w3.org/2000/svg" fill="#000000"/></g></svg>
                                    <svg version="1.2" preserveAspectRatio="none" viewBox="0 -0.5058708414872797 47 47" class="ng-element" style="opacity: 1; width: 20px; height: 20px;" fill="#000000"><g><path d="M42.6,46H4.5C2,46,0,44.1,0,41.7V4.4C0,2,2,0,4.5,0h38.1C45,0,47,2,47,4.4v37.3C47,44.1,45,46,42.6,46z M4.5,1.9  C3.1,1.9,2,3,2,4.4v37.3c0,1.3,1.1,2.4,2.5,2.4h38.1c1.4,0,2.5-1.1,2.5-2.4V4.4c0-1.3-1.1-2.4-2.5-2.4H4.5z M40.4,42H6.6  C5.2,42,4,40.8,4,39.4V21.3c0-0.5,0.4-0.9,1-0.9h7.2c0.3,0,0.6,0.1,0.8,0.4c0.2,0.2,0.2,0.5,0.2,0.8c-0.3,1-0.5,2-0.5,3  c0,5.8,4.9,10.6,10.8,10.6c6,0,10.8-4.7,10.8-10.6c0-1-0.2-2-0.5-3c-0.1-0.3,0-0.6,0.2-0.8c0.2-0.2,0.5-0.4,0.8-0.4h7.2  c0.5,0,1,0.4,1,0.9v18.1C43,40.8,41.8,42,40.4,42z M5.9,22.3v17.1c0,0.4,0.3,0.7,0.7,0.7h33.7c0.4,0,0.7-0.3,0.7-0.7V22.3h-5  c0.2,0.8,0.2,1.6,0.2,2.3c0,6.9-5.7,12.4-12.8,12.4s-12.8-5.6-12.8-12.4c0-0.8,0.1-1.6,0.2-2.3H5.9z M23.5,33.2  c-4.9,0-8.8-3.9-8.8-8.6c0-4.7,4-8.6,8.8-8.6c4.9,0,8.8,3.9,8.8,8.6C32.3,29.4,28.4,33.2,23.5,33.2z M23.5,17.9  c-3.8,0-6.9,3-6.9,6.7c0,3.7,3.1,6.7,6.9,6.7c3.8,0,6.9-3,6.9-6.7C30.4,20.9,27.3,17.9,23.5,17.9z M39.2,15h-5.4  c-1.5,0-2.8-1.1-2.8-2.6V7.6C31,6.1,32.3,5,33.8,5h5.4C40.7,5,42,6.1,42,7.6v4.9C42,13.9,40.7,15,39.2,15z M33.8,7  C33.4,7,33,7.3,33,7.7v4.7c0,0.4,0.3,0.7,0.8,0.7h5.5c0.4,0,0.8-0.3,0.8-0.7V7.7C40,7.3,39.7,7,39.2,7H33.8z" xmlns:default="http://www.w3.org/2000/svg" fill="#000000"/></g></svg>
                                    <svg version="1.2" preserveAspectRatio="none" viewBox="0 -6.498509687034279 51 51" class="ng-element" style="opacity: 1; width: 20px; height: 20px;" fill="#000000"><g><g xmlns:default="http://www.w3.org/2000/svg"><g><path d="M46,0H5C2.2,0,0,2.2,0,5v28c0,2.8,2.2,5,5,5h41c2.8,0,5-2.2,5-5V5C51,2.2,48.8,0,46,0z M49,33c0,1.7-1.3,3-3,3H5    c-1.7,0-3-1.3-3-3V5c0-1.7,1.3-3,3-3h41c1.7,0,3,1.3,3,3V33z M32.4,18.1l-11-5.3c-0.3-0.1-0.7-0.1-1,0.1C20.2,13,20,13.4,20,13.7    v10.6c0,0.3,0.2,0.7,0.5,0.8c0.2,0.1,0.3,0.2,0.5,0.2c0.1,0,0.3,0,0.4-0.1l11-5.3c0.3-0.2,0.6-0.5,0.6-0.9    C33,18.6,32.8,18.3,32.4,18.1z M22,22.7v-7.4l7.7,3.7L22,22.7z" fill="#000000"/></g></g></g></svg>
                                    <svg version="1.2" preserveAspectRatio="none" viewBox="-5.4879999999999995 0 49 49" class="ng-element" style="opacity: 1; width: 20px; height: 20px;" fill="#000000"><g><path d="M9.1,49.8c-0.3,0-0.5-0.1-0.7-0.2c-0.8-0.3-0.9-1-0.9-1.4c-0.2-1.8-0.1-3.7,0-5.5l0-1c0.1-2.4,0.6-4.3,1-6.3l0.1-0.4  c0.4-1.9,0.9-3.7,1.3-5.5c0.5-2,0.9-3.9,1.4-5.9c0-0.1,0.1-0.2,0.1-0.3c0,0,0-0.1,0-0.1c-0.4-1.2-0.7-2.1-0.8-3.2  c-0.1-1.4,0-2.7,0.3-4c0.7-2.5,2.2-4.4,4.2-5c1.3-0.5,3-0.3,4.1,0.3c1.1,0.6,1.8,1.6,2.1,2.9c0.3,1.1,0.2,2.4-0.1,4  c-0.3,1.4-0.7,2.7-1.1,3.8c-0.2,0.8-0.5,1.5-0.7,2.4l0,0.1c-0.3,1-0.5,1.9-0.3,2.7c0.2,0.8,0.6,1.3,1.2,1.8c0.6,0.5,1.3,0.7,2.2,0.7  l0.2,0c1.6-0.1,3-0.9,4.3-2.5c1.6-2,2.6-4.8,3-8.2c0.2-1.4,0.2-2.6,0.1-3.6c-0.1-2.1-0.8-3.9-1.9-5.2c-1.1-1.3-2.5-2.3-4.3-2.9  c-1.9-0.6-4.5-0.8-6.6-0.4c-3.8,0.6-6.8,2.7-8.6,6.1c-1,1.8-1.5,3.8-1.5,5.9c0,1.6,0.4,3,1.1,4.1c0.1,0.1,0.2,0.2,0.3,0.4  c0.2,0.2,0.4,0.5,0.6,0.8c0.5,0.9,0.2,1.8,0,2.6c0,0.1-0.1,0.2-0.1,0.4c0,0.1-0.1,0.3-0.1,0.4c-0.1,0.7-0.5,2.2-2,2.3h0  c-0.9,0-2.2-0.9-2.2-0.9c-2.1-1.6-2.9-2.7-4-5.2c-0.8-2-1.2-5.6-0.8-7.7c0.3-1.8,1.2-4.4,2-6c1.6-2.9,3.9-5.3,6.9-7  c2.3-1.4,4.9-2.2,7.8-2.6C17.9,0.1,19,0.1,20,0c0.3,0,0.6,0,0.9,0c3.4,0,6.1,0.9,7.7,1.6c2.3,1,4.3,2.4,6,4.2c1.7,1.9,2.9,4,3.7,6.6  c0.4,1.3,0.6,2.9,0.6,4.6c0,1.5-0.1,2.8-0.4,4.5c-1,5.6-3.7,10.1-7.7,12.7c-1.1,0.7-2.3,1.3-3.6,1.6c-1.7,0.5-3.1,0.7-4.6,0.6  c-1.5-0.1-2.9-0.5-4.2-1.2c-0.6-0.3-1.1-0.7-1.5-1l0,0.1c-0.2,0.9-0.5,1.9-0.7,2.8L16,37.9c-0.3,1.3-0.7,2.7-1.2,3.9  c-1.2,2.8-2.5,5.1-4,6.8C10.1,49.4,9.7,49.8,9.1,49.8z M16.9,12.6c-0.4,0-0.7,0.1-1,0.2c-1.4,0.5-2.4,1.8-2.9,3.7  c-0.3,1-0.4,2.1-0.2,3.3c0.1,1,0.3,1.8,0.7,2.9c0.2,0.4,0,0.9-0.1,1.2c0,0.1,0,0.1-0.1,0.2c-0.5,2-0.9,4-1.4,5.9  c-0.4,1.8-0.9,3.7-1.3,5.5l-0.1,0.4c-0.4,1.8-0.9,3.7-1,5.9l0,1c-0.1,1.5-0.2,3-0.1,4.3c1.3-1.6,2.5-3.6,3.5-6.1  c0.5-1.1,0.8-2.4,1.1-3.7l0.2-0.8c0.2-0.9,0.5-1.8,0.7-2.8l0.5-2c0.1-0.4,0.4-0.7,0.8-0.7c0.4-0.1,0.8,0.1,1,0.5  c0.5,0.8,1.1,1.4,2.1,1.9c1,0.6,2.1,0.9,3.3,1c1.2,0.1,2.5-0.1,3.9-0.5c1.1-0.3,2.1-0.8,3.1-1.4c3.5-2.3,6-6.3,6.8-11.4  c0.3-1.6,0.4-2.8,0.4-4.2c0-1.5-0.2-2.9-0.5-4c-0.7-2.2-1.7-4.1-3.2-5.8c-1.5-1.6-3.2-2.9-5.3-3.8c-1.6-0.7-4.4-1.6-7.7-1.4  c-1,0-2,0.1-2.9,0.2c-2.6,0.4-4.9,1.2-7,2.4c-2.7,1.6-4.7,3.7-6.2,6.3c-0.6,1.2-1.4,3.5-1.8,5.4c-0.3,1.7,0,4.9,0.7,6.5  c0.9,2.2,1.5,3,3.3,4.4c0.2,0.2,0.6,0.4,0.9,0.5c0.1-0.2,0.1-0.4,0.2-0.6c0-0.2,0.1-0.3,0.1-0.5c0-0.1,0.1-0.3,0.1-0.4  c0.1-0.3,0.3-0.8,0.2-1c-0.1-0.2-0.2-0.3-0.4-0.5c-0.2-0.2-0.3-0.4-0.5-0.6c-1-1.4-1.5-3.2-1.5-5.2c0-2.5,0.6-4.7,1.7-6.8  c2.1-3.9,5.6-6.3,10-7.1c2.5-0.4,5.4-0.2,7.6,0.5c2.1,0.7,3.9,1.9,5.2,3.5c1.4,1.7,2.2,3.9,2.4,6.4c0.1,1.1,0,2.4-0.1,3.9  c-0.4,3.8-1.6,6.9-3.4,9.2c-1.7,2.1-3.6,3.2-5.8,3.3l-0.3,0c-1.3,0-2.4-0.3-3.4-1c-1-0.7-1.7-1.7-2-3c-0.3-1.4,0-2.6,0.3-3.7l0-0.1  c0.2-0.9,0.5-1.7,0.7-2.4c0.4-1.2,0.7-2.3,1-3.7c0.3-1.3,0.3-2.3,0.2-3.1c-0.2-0.8-0.6-1.3-1.2-1.7C18,12.8,17.4,12.6,16.9,12.6z" xmlns:default="http://www.w3.org/2000/svg" fill="#000000"/></g></svg>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="inferior">
                    <div class="row">
                            <div class="col-md-12 secciones text-center">
                            <div class="activo"><span>QUIERO</span></div>
                            <div><span>SABER MAS<br>DEL PARQUE ...</span></div>
                            <div><span>COMPRAR MI<br>ENTRADA A ...</span></div>
                            <div><span>AHORRAR<br>MÁS</span></div>
                            <div><span>VER LA GALERÍA<br>DE ...</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="breadcrumb">
                Inicio <span>/</span> <strong><?php echo $obj->seccion;?> ... </strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div id="contenedor-video">
                            <?php echo $obj->videoYTembed;?>
                        </div>
                    </div>
                </div>
                <div class="text-center" id="menu-galeria">
                    <?php
                        // Si el json no cuenta con el mapa, el botón de ver imágenes ocupa todo el espacio
                        if(tieneMapa($obj)):
                    ?>
                    <div class="col-md-6 open-gallery">
                    <?php else: ?>
                    <div class="col-md-12 open-gallery">
                    <?php endif;?>

                        <svg version="1.2" preserveAspectRatio="none" viewBox="0 -8 56 56" class="ng-element" style="opacity: 1; width: 24px; height: 24px;transform: rotate(0deg) translate(0, 5px)" fill="#ffffff"><g>
                            <g>
                                <path d="M0,0v40h56V0H0z M54,38H2v-4.5l16.6-16.9l15.2,15.2l0,0l0.9,0.8l10.2-10.3l9.1,9.1l0.1-0.1V38z M54,28.6l-9.1-9.1l-1,1    l0,0l-9.2,9.3l-16-16l-1.4,1.4l0,0L2,30.6V2h52V28.6z M36.4,19h0.1c3,0,5.4-2.4,5.4-5.4v-0.1c0-3-2.4-5.4-5.4-5.4h-0.1    c-3,0-5.4,2.4-5.4,5.4v0.1C31,16.6,33.4,19,36.4,19z M33,13.4c0-1.9,1.5-3.4,3.4-3.4h0.1c1.9,0,3.4,1.5,3.4,3.4v0.1    c0,1.9-1.5,3.4-3.4,3.4h-0.1c-1.9,0-3.4-1.5-3.4-3.4V13.4z" fill="#ffffff"/>
                            </g>
                        </g><g/></svg>
                        Ver imágenes
                    </div>
                    <?php
                    // Si el json no cuenta con el mapa, no se muestra el boton
                        if(tieneMapa($obj)):
                    ?>
                    <div class="col-md-6 open-maps">
                        <svg version="1.2" preserveAspectRatio="none" viewBox="0 -7.99868073878628 47 47" class="ng-element" style="opacity: 1; width: 24px; height: 24px; transform: rotate(0deg) translate(0, 5px) rotate(0deg);" fill="#ffffff"><g>
                            <g>
                                <path d="M46.9,13.3L46.9,13.3C46.6,12.7,37.8,0,23.7,0h-0.4C9.2,0,0.4,12.7,0.1,13.2l0.1,0.1L0,13.4c0.1,0.2,2.3,4.4,6.2,8.8    c5.3,5.8,11.2,8.9,17.1,8.9h0.4c5.9,0,11.8-3.1,17.1-8.9c3.9-4.3,6.1-8.6,6.2-8.8L46.9,13.3z M11.9,5.2c3.2-1.8,7-3.2,11.4-3.2    h0.4c4.2,0,8,1.3,11.1,3c0.8,1.7,1.2,3.5,1.2,5.5c0,7-5.7,12.7-12.7,12.7s-12.7-5.7-12.7-12.7C10.7,8.6,11.2,6.8,11.9,5.2z     M23.7,29h-0.4c-11,0-18.8-11.9-21-15.5C3.4,12.1,5.8,9.4,9.2,7c-0.3,1.1-0.5,2.3-0.5,3.5c0,8.1,6.6,14.8,14.6,14.8    c8.1,0,14.6-6.6,14.6-14.8c0-1.3-0.2-2.6-0.5-3.8c3.6,2.5,6,5.4,7.1,6.8C42.5,17.2,34.7,29,23.7,29z M17.9,13.8    c2.5,0,4.6-2.1,4.6-4.6c0-2.5-2.1-4.6-4.6-4.6c-2.5,0-4.6,2.1-4.6,4.6C13.3,11.8,15.4,13.8,17.9,13.8z M17.9,6.6    c1.4,0,2.6,1.2,2.6,2.6c0,1.4-1.2,2.6-2.6,2.6c-1.4,0-2.6-1.2-2.6-2.6C15.3,7.8,16.4,6.6,17.9,6.6z" fill="#ffffff"/>
                            </g>
                        </g><g/></svg>
                        Vista 360°
                    </div>
                    <?php endif;?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <main>
                            <h1><?php echo $obj->tituloH1;?></h1>
                            <hr>
                            <p>
                                <?php echo $obj->descripcion;?>
                            </p>
                        </main>
                        <section>
                            <h2>Atractivos principales</h2>
                            <hr>
                            <?php foreach($obj->atractivos as $atractivo): ?>
                            <article class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo $atractivo->img;?>" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <h3><?php echo $atractivo->titulo;?></h3>
                                    <p>
                                        <?php echo $atractivo->desc;?>
                                    </p>
                                </div>
                            </article>
                            <?php endforeach; ?>
                        </section>
                    </div>
                </div>
            </div>
            <aside class="col-md-3">
                <div class="row">
                    <div class="col-md-12 text-center activo">
                        <h4>COMPRA AQUÍ</h4>
                        <p class="descuento">Y obtén hasta un 15% de descuento</p>
                    </div>
                </div>
                <div class="row">
                    <form class="col-md-12">
                        <h3>NOMBRE DEL PRODUCTO</h3>
                        <p>
                            Precio regular:
                            <span class="precio-regular">$0,000.00 MXN</span>
                        </p>
                        <p class="precio-enlinea">
                            Precio en linea: $0,000.00 MXN
                        </p>
                        <fieldset class="agregar">
                            <input type="checkbox" name="transportacion-redonda" value="1">
                            Agregar transportación redonda desde tu hotel:
                            <strong>
                                $0,000.00 MXN
                            </strong>
                        </fieldset>
                        <fieldset class="agregar">
                            <input type="checkbox" name="foto-pase" value="1">
                            Agregar Foto Pase:
                            <strong>
                                $0,000.00 MXN
                            </strong>
                        </fieldset>
                        <button type="submit" class="btn-lg btn-block btn-black">COMPRAR AHORA</button>
                        <div class="legales">
                            <p>*10% de descuento - reservando con 7-20 días de anticipación.</p>
                            <p>15% de descuento -reservando con 21 días o más de anticipación.</p>
                            <p>*Precios sujetos a cambios sin previo aviso.</p>
                        </div>
                    </form>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <h3>¿Porqué reservar con nosotros?</h3>
                    </div>
                </div>
                <div class="row text-center beneficios">
                    <div class="col-md-4"><p>-10%</p> EN TU COMPRA*</div>
                    <div class="col-md-4"><p>-15%</p> EN TU COMPRA*</div>
                    <div class="col-md-4"><p>-50%</p> EN TU COMPRA*</div>
                </div>
                <div class="row text-center beneficios">
                    <div class="col-md-4">
                        <svg version="1.2" preserveAspectRatio="none" viewBox="0 0 256 256" class="ng-element" style="opacity: 1; width: 19px; height: 18px;" fill="#000000"><path d="M234.75,21.322c5.835,0,10.823,2.097,14.987,6.233C253.902,31.75,256,36.793,256,42.714v170.542 c0,5.837-2.098,10.88-6.263,15.075c-4.164,4.221-9.152,6.346-14.987,6.346H21.393c-5.836,0-10.867-2.096-15.073-6.262 C2.097,224.252,0,219.207,0,213.257V42.714c0-5.837,2.083-10.852,6.248-15.073c4.165-4.222,9.208-6.319,15.145-6.319H234.75 L234.75,21.322z M234.75,42.714H21.393v37.203H234.75V42.714z M234.75,133.412H21.393v79.845H234.75V133.412z M78.755,199.941 H36.112V183.96h42.643V199.941z M155.838,199.941H93.9V183.96h61.938V199.941z" fill="#000000"/></svg>
                        MESES SIN INTERESES
                    </div>
                    <div class="col-md-4">
                        <svg version="1.2" preserveAspectRatio="none" viewBox="0 0 22 22" class="ng-element" style="opacity: 1; width: 17px; height: 17px;" fill="#000000"><g><defs> </defs> <rect height="22" width="22" fill="#000000" display="none"/> <rect height="22" width="22" fill="#000000" display="none" id="_x3C_Slice_x3E__109_"/> <path d="M18,10h-1V6c0-3.313-2.687-6-6-6S5,2.687,5,6v4H4c-0.552,0-1,0.447-1,1v10 c0,0.553,0.448,1,1,1h14c0.552,0,1-0.447,1-1V11C19,10.447,18.552,10,18,10z M15,10H7V6c0-2.209,1.791-4,4-4s4,1.791,4,4V10z" clip-rule="evenodd" fill-rule="evenodd" fill="#000000"/> </g></svg>
                        COMPRA SEGURA
                    </div>
                    <div class="col-md-4">
                        <svg version="1.2" preserveAspectRatio="none" viewBox="0 0 28 28" class="ng-element" style="opacity: 1; width: 17px; height: 17px;" fill="#000000"><g><defs> </defs> <rect height="28" width="28" fill="#000000" display="none"/> <rect height="28" width="28" fill="#000000" display="none" id="_x3C_Slice_x3E__81_"/> <path d="M21.487,17.262c-0.343-0.686-0.808-1.309-1.395-1.87 c-0.586-0.562-1.266-1.074-2.038-1.539c-0.773-0.464-1.595-0.907-2.466-1.328C15.38,12.439,15.196,12.36,15,12.278V5.224 c0.149-0.006,0.299-0.02,0.449-0.02C17.68,5.204,19.582,6.05,21,7V3c-1.196-0.551-3.243-1-5.857-1C15.094,2,15.049,2.008,15,2.008V0 h-2v2.175c-0.391,0.058-0.78,0.112-1.176,0.203c-1.104,0.254-2.088,0.643-2.953,1.166C8.005,4.067,7.308,4.731,6.779,5.536 S5.986,7.288,5.986,8.379c0,0.885,0.154,1.657,0.462,2.315c0.308,0.659,0.732,1.25,1.272,1.773c0.54,0.524,1.176,1.002,1.908,1.434 c0.731,0.432,1.521,0.858,2.37,1.279c0.345,0.146,0.676,0.288,1.001,0.429v7.178c-0.179,0.007-0.342,0.022-0.531,0.022 c-0.499,0-1.045-0.049-1.638-0.146c-0.593-0.097-1.185-0.234-1.777-0.413c-0.593-0.178-1.153-0.396-1.682-0.655 c-0.529-0.26-0.984-0.551-1.368-0.875L6,24.8c0.349,0.205,0.812,0.276,1.381,0.438s1.173,0.3,1.812,0.413 c0.639,0.113,1.263,0.2,1.873,0.259c0.609,0.06,1.372,0.09,1.791,0.09c0.05,0,0.094-0.003,0.143-0.004V28h2v-2.143 c0.385-0.053,0.771-0.115,1.181-0.198c1.127-0.227,2.123-0.593,2.989-1.101c0.865-0.508,1.554-1.166,2.064-1.977 c0.512-0.81,0.767-1.803,0.767-2.979C22.001,18.728,21.83,17.948,21.487,17.262z M11.711,10.646 c-0.447-0.312-0.787-0.658-1.02-1.036s-0.349-0.826-0.349-1.345c0-0.55,0.151-1.02,0.453-1.408c0.303-0.389,0.694-0.708,1.177-0.956 C12.284,5.739,12.634,5.619,13,5.518v5.866C12.512,11.143,12.07,10.897,11.711,10.646z M16.364,21.999 c-0.367,0.232-0.833,0.404-1.364,0.536v-6.012c0.37,0.191,0.719,0.385,1.024,0.585c0.511,0.335,0.908,0.704,1.193,1.109 c0.284,0.404,0.427,0.883,0.427,1.433C17.645,20.677,17.218,21.459,16.364,21.999z" clip-rule="evenodd" fill-rule="evenodd" fill="#000000"/> </g></svg>
                        PRECIO+BAJO GARANTIZADO
                    </div>
                </div>
                <div class="row text-center beneficios">
                    <div class="col-md-4"><p>VIP</p> TAQUILLAS ESPECIALES</div>
                    <div class="col-md-4">
                        <svg version="1.2" preserveAspectRatio="none" viewBox="0 0 28 28" class="ng-element" style="opacity: 1; width: 19px; height: 19px;" fill="#000000"><g><defs> </defs> <rect height="28" width="28" fill="#000000" display="none"/> <rect height="28" width="28" fill="#000000" display="none" id="_x3C_Slice_x3E__109_"/> <path d="M25.744,16.416C25.905,15.803,26,15.163,26,14.5c0-4.143-3.358-7.5-7.5-7.5 c-1.064,0-2.076,0.225-2.993,0.625C14.586,5.494,12.469,4,10,4c-3.313,0-6,2.687-6,6c0,0.223,0.042,0.435,0.066,0.651 C1.667,11.762,0,14.184,0,17c0,3.866,3.134,7,7,7h17c2.209,0,4-1.791,4-4C28,18.419,27.075,17.065,25.744,16.416z" clip-rule="evenodd" fill-rule="evenodd" fill="#000000"/> </g></svg>
                        GARANTIA MAL CLIMA
                    </div>
                    <div class="col-md-4">
                        <svg version="1.2" preserveAspectRatio="none" viewBox="0 0 24 24" class="ng-element" style="opacity: 1; width: 17px; height: 17px;" fill="#000000"><g><defs> </defs> <rect height="24" width="24" fill="#000000" display="none"/> <rect height="24" width="24" fill="#000000" display="none" id="_x3C_Slice_x3E__109_"/> <path d="M12,0C6,7,0,2,0,2v4c0,8,7,18,12,18S24,14,24,6V2C24,2,18,7,12,0z" clip-rule="evenodd" fill-rule="evenodd" fill="#000000"/> </g></svg>
                        SEGURO DE VIAJE
                    </div>
                </div>

            </aside>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <button class="btn-block btn-lg btn-black">
                    <strong>Cotizar mi entrada ahora</strong>
                </button>
            </div>
        </div>
        <div class="tarjetas">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-1 text-center">
                            <strong>HASTA 9 MESES SIN INTERESES</strong>
                        </div>
                        <div class="col-md-8"><img src="https://uc.uxpin.com/files/103822/110843/logo-msi-2-1.png?1468080138" class="img-responsive"> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1 text-center">
                            Con los principales bancos y tarjetas emitidas en México. No aplica con Paypal. <strong>Ver opciones » </strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-superior">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center footer-header">
                        experiencias xcaret
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4"><img src="https://uc.uxpin.com/files/103822/110843/xcaret0.png?1468080138"> </div>
                    <div class="col-md-4"><img src="https://uc.uxpin.com/files/103822/110843/xelha-1.png?1468080138"> </div>
                    <div class="col-md-4"><img src="https://uc.uxpin.com/files/103822/110843/xplor-1.png?1468080138"> </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4"><img src="https://uc.uxpin.com/files/103822/110843/xichen-1.png?1468080138"> </div>
                    <div class="col-md-4"><img src="https://uc.uxpin.com/files/103822/110843/xenotes-1.png?1468080138"> </div>
                    <div class="col-md-4"><img src="https://uc.uxpin.com/files/103822/110843/xoximilco-3.png?1468080138"> </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>ACERCA DE</strong>
                        <ul>
                            <li>Nuestra Empresa</li>
                            <li>Bolsa de trabajo</li>
                            <li>Conoce Quintana Roo</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <strong>DE INTERRÉS</strong>
                        <ul>
                            <li>Afiliados</li>
                            <li>Agencias Online</li>
                            <li>Grupos</li>
                            <li>Bodas</li>
                            <li>Avión + Hotel + Transportación</li>
                            <li>Sala de Prensa</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <strong>LEGAL</strong>
                        <ul>
                            <li>Términos de uso</li>
                            <li>Aviso de privacidad</li>
                            <li>Mapa de sitio</li>
                            <li>Contáctanos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-inferior">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <strong>Atención a Clientes / Ventas:</strong>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Cancún:</strong> 000-000-0000</p>
                                <p><strong>Brasil:</strong> 000-000-0000</p>
                                <p><strong>Colombia:</strong> 000-000-0000</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Playa del Carmen:</strong> 000-000-0000</p>
                                <p><strong>Argentina:</strong> 000-000-0000</p>
                                <p><strong>España:</strong> 000-000-0000</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>USA/Canadá:</strong> 000-000-0000</p>
                                <p><strong>Venezuela:</strong> 000-000-0000</p>
                                <p><strong>Chile:</strong> 000-000-0000</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer purus neque, posuere ac accumsan quis, gravida vitae neque.
                            <br>
                            Sed tristique mi libero, vel facilisis ipsum ultricies nec. Nulla bibendum in urna vehicula bibendum.
                            <br>
                            ©Mauris fringilla auctor vulputate.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="hidden-gallery-images">
        <?php foreach($obj->img as $imagen): ?>
            <a class="product-gallery" href="<?php echo $imagen->source;?>" data-fancybox-group="gallery" title="<?php echo $imagen->alt;?>" rel="gallery"></a>
        <?php endforeach;?>
        <a class="maps fancybox.iframe" href="<?php echo $obj->maps360;?>"></a>
    </div>
    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <script href="vendors/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="vendors/fancybox/jquery.fancybox.js?v=2.1.5"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $fbg = $('.product-gallery');
            $fbm = $('.maps');
            $('.open-gallery').click(function () {
                $.fancybox.open($fbg);
            });
            $('.open-maps').click(function () {
                $.fancybox.open($fbm);
            });
        })
    </script>
</body>
</html>