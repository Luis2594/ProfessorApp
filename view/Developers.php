<?php
include_once './reusable/Header.php';
?>
<style type="text/css">

    * {
        margin: 0;
        padding: 0;
    }

    .background-wrap {
        position: fixed;
        z-index: -1000;
        width: 100%;
        height: 100%;
        overflow: hidden;
        top: 0;
        left: 0;
    }

    #video-bg-elem {
        position: absolute;
        top: 0;
        left: 0;
        min-height: 100%;
        min-width: 100%;
    }


</style>

<div class="background-wrap">
    <video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted"> 
        <source src="bg.mp4" type="video/mp4">
        <source src="bg.webm" type="video/webm">
        Sorry That The Amazing video Is Not Supported Please Contact us and tell us which operating system or which browser you use Sorry!
    </video>          
</div>

<div class="row center-block text-center">
    <h1>Equipo de Desarrollo</h1>
</div>
<br/>

<div class="row">
    <div class="col-md-4 text-center center-block">
        <h2>
            Luis Castillo
        </h2>
        <br/>
        <img id="imgDeveloper" style="border-radius: 50%;" width="150px" height="150px" src="./../resource/images/luis.png" class="user-image" alt="Desarrollador" />
        <br/><br/>
        <p>
            Desarrollador.
        </p>
        <br/>
        <a href="#" class="fa fa-facebook" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-twitter"></a>-->
        <a href="#" class="fa fa-google" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-linkedin" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-youtube" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-instagram" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-pinterest" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-snapchat-ghost" style="width: 30px;height: 30px;"></a>-->
        <a href="#" class="fa fa-skype" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-android" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-dribbble" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-vimeo" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-tumblr" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-vine" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-foursquare" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-stumbleupon" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-flickr" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-yahoo" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-reddit"style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-rss" style="width: 30px;height: 30px;"></a>-->
    </div>
    <div class="col-md-4 text-center center-block">
        <h2>
            Kevin Esquivel
        </h2>
        <br/>
        <img id="imgDeveloper" style="border-radius: 50%;" width="150px" height="150px" src="./../resource/images/kevin.png" class="user-image" alt="Desarrollador" />
        <br/><br/>
        <p>
            Desarrollador.
            <br/>

        </p>
        <br/>
        <a href="https://www.fb.com/kevinesquivel21" class="fa fa-facebook" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-twitter"></a>-->
        <a href="https://plus.google.com/+KevinEsquivel" class="fa fa-google" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-linkedin" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-youtube" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-instagram" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-pinterest" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-snapchat-ghost" style="width: 30px;height: 30px;"></a>-->
        <a href="skype:kevin.esquivel.21?userinfo" class="fa fa-skype" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-android" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-dribbble" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-vimeo" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-tumblr" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-vine" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-foursquare" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-stumbleupon" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-flickr" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-yahoo" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-reddit"style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-rss" style="width: 30px;height: 30px;"></a>-->
    </div>
    <div class="col-md-4 text-center center-block">
        <h2>
            David Moreno
        </h2>
        <br/>
        <img id="imgDeveloper" style="border-radius: 50%;" width="150px" height="150px" src="./../resource/images/david.png" class="user-image" alt="Desarrollador" />
        <br/><br/>
        <p>
            Desarrollador Móvil.
        </p>
        <br/>
        <a href="#" class="fa fa-facebook" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-twitter"></a>-->
        <a href="#" class="fa fa-google" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-linkedin" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-youtube" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-instagram" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-pinterest" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-snapchat-ghost" style="width: 30px;height: 30px;"></a>-->
        <a href="#" class="fa fa-skype" style="width: 30px;height: 30px;"></a>
        <!--<a href="#" class="fa fa-android" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-dribbble" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-vimeo" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-tumblr" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-vine" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-foursquare" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-stumbleupon" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-flickr" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-yahoo" style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-reddit"style="width: 30px;height: 30px;"></a>-->
        <!--<a href="#" class="fa fa-rss" style="width: 30px;height: 30px;"></a>-->
    </div>
</div>
<?php

include_once './reusable/Footer.php';
?>