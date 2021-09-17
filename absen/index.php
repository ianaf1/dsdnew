<?php
require("../config/database.php");
require("../config/function.php");
require("../config/functions.crud.php");
require("../config/tahun.ajaran.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WebCodeCamJS</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="page-header text-center">
        <h1 style="color: cadetblue;">WebCodeCamJS 2.7.0<br>&amp;<br>
            WebCodeCamJQuery 2.7.0<br>
            <small>Download from:
                <a href="https://github.com/andrastoth/WebCodeCamJS" target="_blank"> GitHub </a> Or
                <a href="http://www.jsclasses.org/package/446-JavaScript-Qr-and-barcode-decoder.html" target="_blank"> JSclasses </a>
            </small>
        </h1>
        <p style="font-style: italic;">
            <span class="glyphicon glyphicon-info-sign"></span>
            News in this version 2.7.0 fully works on Edge, Chrome, Fiirefox, Opera
            <span class="glyphicon glyphicon-info-sign"></span><br>
            News in this version 2.1.0 extend BuildSelectMenu function
            <span class="glyphicon glyphicon-info-sign"></span><br>
            <span class="glyphicon glyphicon-info-sign"></span>
            News in this version 2.0.5 Add parameter tryVertical to options
            <span class="glyphicon glyphicon-info-sign"></span><br>
            <span class="glyphicon glyphicon-info-sign"></span>
            News in this version 2.0.1 Add successTimeout, codeRepetition parameters to options
            <span class="glyphicon glyphicon-info-sign"></span><br>
            <span class="glyphicon glyphicon-info-sign"></span>
            News in this version 2.0.0: Add UPC-A, UPC-E support.
            <span class="glyphicon glyphicon-info-sign"></span><br>
            <span class="glyphicon glyphicon-info-sign"></span>
            News in this version 1.9.0: Decode from url.
            <span class="glyphicon glyphicon-info-sign"></span><br>
            <span class="glyphicon glyphicon-info-sign"></span>
            News in this version 1.8.0: Decode local image.
            <span class="glyphicon glyphicon-info-sign"></span>
        </p>
        <p>
            New versions of popular WebCodeCam jQuery plugin
            Available jquery or javascript version.<br>
        <ul style="display:inline-block;"><span style="font-weight:bold;">Advantages compared to the previous version:</span>
            <li>Built in camera selector menu creation</li>
            <li>Faster</li>
            <li>Lower CPU and Memory usage</li>
            <li>More configurable</li>
        </ul>
        </p>
    </div>
    <div class="container text-center">
        <h2>Compatibility Table</h2>
        <p>Current state of browser compatibility 2017-10-01</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Functions</th>
                    <th><a>IOS Safari</a><img src="css/safari-icon.png"></th>
                    <th><a>Microsoft IE 11</a><img src="css/Internet_Explorer_9.png"></th>
                    <th><a>MS Edge latest</a><img src="css/949320192f43b9d8.png"></th>
                    <th><a>Chrome latest</a><img src="css/google-chrome.png"></th>
                    <th><a>Firefox latest</a><img src="css/mozilla_firefox.png"></th>
                    <th><a>Opera latest</a><img src="css/opera.png"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong><a>Media stream capture &amp; decode</a></strong></td>
                    <td class="danger">No</td>
                    <td class="danger">No</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                </tr>
                <tr>
                    <td><strong><a>Build select menu</a></strong></td>
                    <td class="danger">No</td>
                    <td class="danger">No</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                </tr>
                <tr>
                    <td><strong><a>Decode image(url/local)</a></strong></td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                    <td class="success">Yes</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container" id="QR-Code">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="navbar-form navbar-left">
                    <h4>WebCodeCamJS.js Demonstration</h4>
                </div>
                <div class="navbar-form navbar-right">
                    <select class="form-control" id="camera-select"></select>
                    <div class="form-group">
                        <input id="image-url" type="text" class="form-control" placeholder="Image url">
                        <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                        <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                        <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                        <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                        <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                    </div>
                </div>
            </div>
            <div class="panel-body text-center">
                <div class="col-md-6">
                    <div class="well" style="position: relative;display: inline-block;">
                        <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                    </div>
                    <div class="well" style="width: 100%;">
                        <label id="zoom-value" width="100">Zoom: 2</label>
                        <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                        <label id="brightness-value" width="100">Brightness: 0</label>
                        <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                        <label id="contrast-value" width="100">Contrast: 0</label>
                        <input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
                        <label id="threshold-value" width="100">Threshold: 0</label>
                        <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                        <label id="sharpness-value" width="100">Sharpness: off</label>
                        <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                        <label id="grayscale-value" width="100">grayscale: off</label>
                        <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                        <br>
                        <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                        <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                        <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                        <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="thumbnail" id="result">
                        <div class="well" style="overflow: hidden;">
                            <img width="320" height="240" id="scanned-img" src="">
                        </div>
                        <div class="caption">
                            <h3>Scanned result</h3>
                            <p id="scanned-QR"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/filereader.js"></script>
        <!-- Using jquery version: -->
        <!--
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/qrcodelib.js"></script>
            <script type="text/javascript" src="js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="js/mainjquery.js"></script>
        -->
        <script type="text/javascript" src="js/qrcodelib.js"></script>
        <script type="text/javascript" src="js/webcodecamjs.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
</body>

</html>