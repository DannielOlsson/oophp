<?php

include(__DIR__.'/config.php');


$doco['title'] = "Om mig";

$doco['header'] = <<<EOD
<img class='sitelogo' src='img/doco.png' alt='Doco Logo'/>
<span class='sitetitle'>Doco webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$doco['main'] = <<<EOD
<h1> Hej och välkommen </h1>
<p> Daniel heter jag och är 19 år. Jag kommer ursprungligen från en ö i Göteborgs norra skärgård. 
Där har jag bott hela mitt liv tills jag flyttade hit. Nu bor jag med min kompis Felix i en lägenhet nära stan. 
</p>
<p>
Programmering fick jag upp ögonen för under min gymnasie-tid på IT-Gymnasiet i Göteborg. 
Valde inriktningen "Programmering och Webb" när jag skulle börja tvåan. Efter det så har programmeringen varit en del av vardagen. 
Hur mycket man sitter med det går i perioder. Ibland kan det vara varje dag, men det kan även vara som i sommras då jag inte programmerade någonting under 3 månader. 
Men det är någonting jag kan tänka mig att arbeta med i framtiden. Så det är därför jag är här idag. </p>
EOD;

$doco['footer'] = <<<EOD
{$byline}
EOD;


include (DOCO_THEME_PATH);