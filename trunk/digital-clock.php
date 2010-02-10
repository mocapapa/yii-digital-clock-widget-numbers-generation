<center>
<!-- $Id$ -->
<?php
$clockOffsetHx = 33;
$clockOffsetMx = $clockOffsetHx + 42;
$clockOffsetSx = $clockOffsetMx + 42;
$clockOffsetYU = 22;
$clockOffsetYL = $clockOffsetYU + 13;
?>
<div style="position: relative;">
  <img src="<?php echo Yii::app()->request->baseUrl;?>/systemImages/digital-clock-base.png">
    <div class="hourNumberU" style="width:34px;height:13px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/digital-clock-numbers.png);background-repeat:no-repeat;top:<?php echo $clockOffsetYU;?>px;left:<?php echo $clockOffsetHx;?>px;position:absolute;"></div>
    <div class="hourNumberL" style="width:34px;height:13px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/digital-clock-numbers.png);background-repeat:no-repeat;top:<?php echo $clockOffsetYL;?>px;left:<?php echo $clockOffsetHx;?>px;position:absolute;"></div>
    <div class="minuteNumberU" style="width:34px;height:13px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/digital-clock-numbers.png);background-repeat:no-repeat;top:<?php echo $clockOffsetYU;?>px;left:<?php echo $clockOffsetMx;?>px;position:absolute;"></div>
    <div class="minuteNumberL" style="width:34px;height:13px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/digital-clock-numbers.png);background-repeat:no-repeat;top:<?php echo $clockOffsetYL;?>px;left:<?php echo $clockOffsetMx;?>px;position:absolute;"></div>
    <div class="secondNumberU" style="width:34px;height:13px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/digital-clock-numbers.png);background-repeat:no-repeat;top:<?php echo $clockOffsetYU;?>px;left:<?php echo $clockOffsetSx;?>px;position:absolute;"></div>
    <div class="secondNumberL" style="width:34px;height:13px;background-image:url(<?php echo Yii::app()->request->baseUrl;?>/systemImages/digital-clock-numbers.png);background-repeat:no-repeat;top:<?php echo $clockOffsetYL;?>px;left:<?php echo $clockOffsetSx;?>px;position:absolute;"></div>
</div>
<script type="text/javascript">
/*<![CDATA[*/
   $(document).ready(function() {
       var static = /(^o^)/;
       var ch, cm, cs;
       var currentTime = new Date();
       if (!('ph' in static)) static.ph = (currentTime.getHours() + 23)%24;
       if (!('pm' in static)) static.pm = (currentTime.getMinutes() + 59)%60;
       if (!('ps' in static)) static.ps = (currentTime.getSeconds() + 59)%60;

       animation0();
       setInterval(function(){
	   animation0();
       }, 1000);

       function animationH1u() {
	 clearTimeout();
	 $('.hourNumberU').css('background-position', -static.ph*34+'px -26px'); // 1u
       }
       function animationM1u() {
	 clearTimeout();
	 $('.minuteNumberU').css('background-position', -static.pm*34+'px -26px'); // 1u
       }
       function animationS1u() {
	 clearTimeout();
	 $('.secondNumberU').css('background-position', -static.ps*34+'px -26px'); // 1u
       }
       function animationH2u() {
	 clearTimeout();
	 $('.hourNumberU').css('background-position', -static.ph*34+'px -39px'); // 2u
       }

       function animationM2u() {
	 clearTimeout();
	 $('.minuteNumberU').css('background-position', -static.pm*34+'px -39px'); // 2u
       }
       function animationS2u() {
	 clearTimeout();
	 $('.secondNumberU').css('background-position', -static.ps*34+'px -39px'); // 2u
       }

       function animationH3u() {
	 clearTimeout();
	 $('.hourNumberU').css('background-position', -static.ph*34+'px -52px'); // 3u
       }
       function animationM3u() {
	 clearTimeout();
	 $('.minuteNumberU').css('background-position', -static.pm*34+'px -52px'); // 3u
       }
       function animationS3u() {
	 clearTimeout();
	 $('.secondNumberU').css('background-position', -static.ps*34+'px -52px'); // 3u
       }

       function animationH4u() {
	 clearTimeout();
	 $('.hourNumberU').css('background-position', -ch*34+'px 0px'); // 4u
       }
       function animationM4u() {
	 clearTimeout();
	 $('.minuteNumberU').css('background-position', -cm*34+'px 0px'); // 4u
       }
       function animationS4u() {
	 clearTimeout();
	 $('.secondNumberU').css('background-position', -cs*34+'px 0px'); // 4u
       }

       function animationH5l() {
	 clearTimeout();
	 $('.hourNumberL').css('background-position', -static.ph*34+'px -65px'); // 5l
       }
       function animationM5l() {
	 clearTimeout();
	 $('.minuteNumberL').css('background-position', -static.pm*34+'px -65px'); // 5l
       }
       function animationS5l() {
	 clearTimeout();
	 $('.secondNumberL').css('background-position', -static.ps*34+'px -65px'); // 5l
       }

       function animationH6l() {
	 clearTimeout();
	 $('.hourNumberL').css('background-position', -static.ph*34+'px -78px'); // 6l
       }
       function animationM6l() {
	 clearTimeout();
	 $('.minuteNumberL').css('background-position', -static.pm*34+'px -78px'); // 6l
       }
       function animationS6l() {
	 clearTimeout();
	 $('.secondNumberL').css('background-position', -static.ps*34+'px -78px'); // 6u
       }

       function animationH7l() {
	 clearTimeout();
	 $('.hourNumberL').css('background-position', -static.ph*34+'px -91px'); // 7l
       }
       function animationM7l() {
	 clearTimeout();
	 $('.minuteNumberL').css('background-position', -static.pm*34+'px -91px'); // 7l
       }
       function animationS7l() {
	 clearTimeout();
	 $('.secondNumberL').css('background-position', -static.ps*34+'px -91px'); // 7l
       }
       
       function animationH8l() {
	 clearTimeout();
	 $('.hourNumberL').css('background-position', -ch*34+'px -13px'); // 8l
       }
       function animationM8l() {
	 clearTimeout();
	 $('.minuteNumberL').css('background-position', -cm*34+'px -13px'); // 8l
       }
       function animationS8l() {
	 clearTimeout();
	 $('.secondNumberL').css('background-position', -cs*34+'px -13px'); // 8l
       }
       
       function animation0() {
	 currentTime = new Date();
	 ch = currentTime.getHours();
	 cm = currentTime.getMinutes();
	 cs = currentTime.getSeconds();

	 var duration = 40;
	 if (ch != static.ph) {
	   setTimeout(animationH1u, duration);
	   setTimeout(animationH2u, duration*2);
	   setTimeout(animationH3u, duration*3);
	   setTimeout(animationH4u, duration*4);
	   setTimeout(animationH5l, duration*5);
	   setTimeout(animationH6l, duration*6);
	   setTimeout(animationH7l, duration*7);
	   setTimeout(animationH8l, duration*8);
	 }
	 if (cm != static.pm) {
	   setTimeout(animationM1u, duration);
	   setTimeout(animationM2u, duration*2);
	   setTimeout(animationM3u, duration*3);
	   setTimeout(animationM4u, duration*4);
	   setTimeout(animationM5l, duration*5);
	   setTimeout(animationM6l, duration*6);
	   setTimeout(animationM7l, duration*7);
	   setTimeout(animationM8l, duration*8);
	 }
	 if (cs != static.ps) {
	   setTimeout(animationS1u, duration);
	   setTimeout(animationS2u, duration*2);
	   setTimeout(animationS3u, duration*3);
	   setTimeout(animationS4u, duration*4);
	   setTimeout(animationS5l, duration*5);
	   setTimeout(animationS6l, duration*6);
	   setTimeout(animationS7l, duration*7);
	   setTimeout(animationS8l, duration*8);
	 }
	 static.ph = ch;
	 static.pm = cm;
	 static.ps = cs;
       }
   });
/*]]>*/
</script>
</center>
