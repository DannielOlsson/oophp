<?php

include(__DIR__.'/config.php');


$doco['title'] = "Redovisningar";

$doco['header'] = <<<EOD
<img class='sitelogo' src='img/doco.png' alt='Doco Logo'/>
<span class='sitetitle'>Doco webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$doco['main'] = <<<EOD
<h1> Redovisningar </h1>
<p>
Ny läsperiod, nya kursmoment och mycket ny kod.
Efter mos första genomgång i objektsorienterad PHP tyckte jag att allting verkade väldigt rörigt...
Förstod inte riktigt doco funktion, förutom att det var som en "mall".
Men allt eftersom jag läste igenom guiderna som mos publicerat så blev saker och ting klarare.
PHP20 guiden var lite bra repetition inför kursmomentet, jag återfann lite gammal, bortglömd kunskap!
När jag var klar med alla guider (förutom inkludering av scource), så stötte jag på mina första frukansvärt enkla problem 
som ändå tog 30 minuter att lösa.
Ett av problemen var att från min funktions-fil skrevs $ _ SERVER ut på sidan, 2 ggr. Jag gick in och plockade bort anropningsraden.
En av arrayerna försvann, men en återstod. Läste igenom alla mina dokument ungefär 10 gånger innan jag upptäckte 
att jag hade ytterliggare ett funktions-dokument som också skrev ut $ _ SERVER. Det misstaget gör jag förhoppningsvis inte igen.
</p>
<p>
Jag använder WampServer och sitter i Sublime Text 2, har fastnat framför allt för Sublimes utseende. Men det har även några bra funktioner som gör att man kan anpassa
utvecklings miljön väldigt bra för sig själv. Som exempel så har jag nu bundit en tanget (som jag aldrig använder i vanliga fall) till att
skriva "$". Bra att ha istället för att behöva hålla in Alt Gr varjegång man ska använda en variabel.
</p>
<p>
Min doco-mall fick namnet Doco (mina initialer). Lätt, enkelt och passar ganska bra eftersom att det är jag som kommer att bygga vidare på mallen!
När jag väl arbetat med doco ett tag så fick jag förståelse för strukturen och tycker att den är bra!
Jag hoppade över att skapa bildspel. 
Inkluderingen av "source" gick sakta men säkert framåt!
Jag skippade att göra source.css och implementera istället source-funktionen direkt på sidan.
Jag använde mig av CSource objekt för detta!
Inga extra uppgifter är gjorda.
</p>
EOD;

$doco['footer'] = <<<EOD
<p> 
Sida skapad av Daniel Olsson med hjälp av webbtemplatet Doco (som av en ren slump liknar doco väldigt mycket). 
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
</p>
EOD;


include (DOCO_THEME_PATH);