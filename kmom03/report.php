<?php

include(__DIR__.'/config.php');


$anax['title'] = "Redovisningar";

$anax['header'] = <<<EOD
<img class='sitelogo' src='img/doco.png' alt='Doco Logo'/>
<span class='sitetitle'>Doco webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$anax['main'] = <<<EOD
<h1> Redovisningar </h1>

<h3>kmom02</h3>

<p>
Jag börjar få ganska bra koll på hur objektsorienterad programmering fungerar, framför allt i C++.
Tycker att PHP skiljer sig lite, men C++ kunskaperna hjälper mycket!
Jag jobbade igenom hela oophp20 guiden, den gav mycket bra lärdom.
Skapade dock ingen klass för histogram från början. När jag skulle gå tillbaka och göra det blev allt bara krånligt.
Släppte det helt och hoppade på Tärningspelet 100 istället.
</p>

<p>
Jag löste Tärningspelet 100 genom att göra 3 olika klasser:
-CDice: gör ett tärningsslag
-CRound: plussar ihop tärningsslagen och skapar rondpoäng, håller även koll på antal rundor.
-CGame: håller koll på totala poängen och om man har vunnit spelet eller ej.
</p>

<p>
Sidan dice.php skapar ett CGame objekt och ett CRound objekt. 
Vid varje klick på "Kasta" sparas rund-poängen i session-arrayen.
Vid varje klick på "Spara poäng" så sparas den totala poängen i session-arrayen och rundpoängen nollställs.
</p>

<p>
Det kan hända att jag gjort spelet väldigt konstigt utifrån objektsorienterad synvinkel eller så är denna uppgift bara för att vi ska lära oss.
Men jag valde att spara alla poäng i $_SESSION. I och med att jag gör det så finns det egentligen ingen som helst anledning för 
mig att använda klasser. Men men, nu har jag bättre koll på hur det fungerar i alla fall!
</p>

<p>
Generellt så tycker jag att kursmomentet har flutit på bra och jag är nöjd med resultatet. Det blev dock några färre stopp när man fick tänka till en stund, men det är ju en del av programmeringen.
I fortsättningen skulle jag vilja se uppgifter där jag verkligen kan dra nytta av objektsorienterad programmering!
Hoppas på att det kommer sådana!
</p>


<h3>kmom01</h3>

<p>
Ny läsperiod, nya kursmoment och mycket ny kod.
Efter mos första genomgång i objektsorienterad PHP tyckte jag att allting verkade väldigt rörigt...
Förstod inte riktigt Anax funktion, förutom att det var som en "mall".
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
Min Anax-mall fick namnet Doco (mina initialer). Lätt, enkelt och passar ganska bra eftersom att det är jag som kommer att bygga vidare på mallen!
När jag väl arbetat med Anax ett tag så fick jag förståelse för strukturen och tycker att den är bra!
Jag hoppade över att skapa bildspel. 
Inkluderingen av "source" gick sakta men säkert framåt!
Jag skippade att göra source.css och implementera istället source-funktionen direkt på sidan.
Jag använde mig av CSource objekt för detta!
Inga extra uppgifter är gjorda.
</p>
EOD;

$anax['footer'] = <<<EOD
<p> 
Sida skapad av Daniel Olsson med hjälp av webbtemplatet Doco (som av en ren slump liknar Anax väldigt mycket). 
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
</p>
EOD;


include (ANAX_THEME_PATH);