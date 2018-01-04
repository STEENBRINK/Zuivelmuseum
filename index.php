<?php
$picktures = [];
$counter = 0;
$login = false;
$username = '';

//connect
require_once("reference/reference.php");

if(isset($_SESSION['user_id'])){
    $login = true;
    $username = getUsername();
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Het Zuivelmuseum</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="scripts/scroll.js"></script>
    </head>
    <body>
    <nav id="menu">
        <ul>
            <li><a href="#wiezijnwij">Wie Zijn Wij</a></li>
            <li><a href="#doelstelling">Doelstelling</a></li>
            <li><a href="#nieuws">Nieuws</a></li>
            <li><a href="#links">Links</a></li>
            <li><a href="#boeken">Boeken</a></li>
            <li><a href="photos.php">Foto's</a></li>
            <li id="login">
                <a href="<?php if($login){ echo "account.php"; }else{echo "login.php";} ?>">
                    <?php if($login){ echo $username; }else{echo "Login";} ?>
                </a>
            </li>
        </ul>
    </nav>
    <div class="sections">
        <section id="wiezijnwij" class="filled">
            <br><br>
            <h1>Wie zijn wij?</h1>
            <p>
                De aanzet tot het ontstaan van "De Melkmaten" is geweest de samenvoeging van een tweetal privé-verzamelingen,<br>
                namelijk die van Bram den Braber en die van Jaco Heeren. In de loop der jaren is een flinke collectie opgebouwd,<br>
                waarbij de voorkeur van Bram vooral gericht is op de melkindustrie en die van Jaco op de traditionele melkboer.<br>
                We spreken dan over februari 1995. Door deze samenwerking is een omvangrijke verzameling ontstaan.<br>
                Van 1996-2006 was de collectie tentoongesteld in een pand van 210 m2. <br>
                Helaas is anno 2007 de collectie is wederom opgeslagen op 3 verschillende locaties.<br>
                Er worden diverse mogelijkheden onderzocht om (een deel van) de verzameling onder te brengen in een museum. <br>
            </p>
            <h1>Waaruit bestaat de collectie?</h1>
            <p>
                Natuurlijk uit allerlei soorten flessen, houten en ijzeren kratten, melkbussen, melkemmers, maten en zeven, maar ook uit flescapsules, deksels, <br>
                kroonkurken en eenmalige verpakkingen (zowel oude als nieuwe). Daarnaast hebben we een collectie flessen met fabrieks- en/of gelegenheidsnaam, <br>
                maar ook oude etalageflessen zoals die vroeger te vinden waren in de oude melkwinkels. <br>
                Deze flessen zijn o.a. afkomstig van voormalige bedrijven als VAMI, Sterovita, Hollandia, Verenigde Gooise Melkbedrijven en de Nederlandse MelkUnie. <br>
                Ook bezitten we nog een bonte verzameling van attributen die de melkboer nodig had bij zijn ronde door de wijk. <br>
                Dan bezitten we nog diverse transportmiddelen waar de melkboer vroeger mee ventte, zoals de "ijzeren hond" en de bakfiets.<br><br>
            </p>
            <h1>Verder...</h1>
            <p>
                En dan is er nog de bibliotheek die gestaag groeit. Deze bestaat o.a. uit oude zuivelleerboeken van de FNZ, <br>
                zuiveljaarboeken (uitgegeven door Bolsward), jubileumboeken van bestaande en niet meer bestaande bedrijven, <br>
                personeelsbladen en vakbladen voor de melkdetailhandel vanaf 1946. <br>
                Naast de bibliotheek beschikken we ook over een uitgebreid archief dat bestaat uit circa 70 mappen. <br>
                Hierin bewaren we o.a. (oude) afleverings- en retourbonnen, fakturen, briefhoofden (de oudste is van 1910) en ook boterwikkels, <br>
                flesetiketten, reclame-attributen, loon- en pensioenbrieven, getuigschriften, bedrijfsnieuws en historie. <br>
                Dit alles heeft uiteraard betrekking op de ‘Nederlandse zuivel’ en de melkboer. <br>
                Tenslotte bezitten we veel fotomateriaal van melkbedrijven, van (oude) melkvrachtauto’s <br>
                en van allerlei melkventerskarren zoals die vele jaren het straatbeeld van ons land hebben bepaald.
            </p>
        </section>
        <section id="doelstelling">
            <h1>Wat is onze doelstelling?</h1>
            <p>
                <i>"Het in stand houden van de rijke Nederlandse zuivelhistorie, met daaraan gekoppeld een royale aandacht voor de ouderwetse melkboer en melkhandel."</i><br>
                Want laten we eerlijk zijn; van alles is in Nederland een museum, maar hoe zit het <br>
                dan met het "ambacht" van melkboer en daaraan gekoppeld de Nederlandse zuivelhistorie? <br>
                Om ook voor de toekomst onze doelstelling zeker te stellen, zijn onze belangen ondergebracht in een stichting: <br>
                <i>Melkboeren- en Zuivelmuseum "De Melkmaten". </i><br>
                Om ons financieel te kunnen bedruipen zijn wij afhankelijk van sponsors en/of donaties van bedrijven en particulieren. <br><br>
                Wilt u direct onze doelstelling ondersteunen? <br>
                Stort dan €20,- op rekeningnummer 6187063 van de Postbank t.n.v. Stichting "DE MELKMATEN".<br>
                Voor reacties of vragen betreffende sponsoring, donaties (zowel financieel als materieel), <br>
                kunt u ons bereiken op één van de telefoonnummers in het rechtermenu.<br>
            </p>
            <h1>De collectie</h1>
            <p>
                Het meeste materiaal is door onszelf verzameld, waarbij bijvoorbeeld kranten en vakbladen goede hulpmiddelen waren.<br>
                Maar we hebben ook veel gekregen van (oud)medewerkers en eigenaren van zuivelfabrieken en van (oud)melkboeren. <br>
                Van sommige mensen hebben we dingen in bruikleen gekregen. Ook zijn ons al diverse foto’s, boeken, <br>
                papieren en attributen via notariële overeenkomst toegezegd van mensen die ons museum en initiatief een warm hart toedragen,<br>
                maar nu nog geen afstand van hun spullen kunnen doen. De ervaring leert ons dat er bij overlijden erg veel materiaal verloren gaat,<br>
                omdat nabestaanden er geen interesse in hebben of niet weten waar zij ermee naar toe moeten. <br>
                Via bijvoorbeeld reünies of contactdagen proberen we met mensen uit de zuivelindustrie in gesprek te komen,<br>
                hetgeen al tot menig waardevol contact heeft geleid. <br>
                De oud-melkboeren worden meestal benaderd vanuit oude ledenlijsten van bijvoorbeeld saneringsbureaus, verenigingen of organisaties.<br>
            </p>
        </section>
        <section id="nieuws" class="filled">
            <h1>nieuws</h1>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
            Quia nec honesto quic quam honestius nec turpi turpius. <br>
            Memini vero, inquam; Multa sunt dicta ab antiquis de contemnendis ac despiciendis rebus humanis; <br>
            Beatus autem esse in maximarum rerum timore nemo potest. Immo alio genere;
            <br><br>
            Theophrasti igitur, inquit, tibi liber ille placet de beata vita? Qui est in parvis malis. <br>
            Itaque quantum adiit periculum! ad honestatem enim illum omnem conatum suum referebat, non ad voluptatem. <br>
            Haec para/doca illi, nos admirabilia dicamus. Non potes, nisi retexueris illa. Deinde disputat, <br>
            quod cuiusque generis animantium statui deceat extremum. Ut scias me intellegere, primum idem esse dico voluptatem, <br>
            quod ille don. Illud dico, ea, quae dicat, praeclare inter se cohaerere. <br>
            Quid dubitas igitur mutare principia naturae? Haec igitur Epicuri non probo, inquam.
            <br><br>
            Nam, ut saepe iam dixi, in infirma aetate inbecillaque mente vis naturae quasi per caliginem cernitur; <br>
            Quodcumque in mentem incideret, et quodcumque tamquam occurreret.<br>
            Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. <br>
            Ergo, si semel tristior effectus est, hilara vita amissa est? Tum mihi Piso: Quid ergo?<br>
            Id mihi magnum videtur. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. <br>
            Ita ne hoc quidem modo paria peccata sunt. Praeterea sublata cognitione et scientia tollitur omnis<br>
            ratio et vitae degendae et rerum gerendarum. Respondent extrema primis, media utrisque, omnia omnibus.<br>
            Nunc haec primum fortasse audientis servire debemus. Cui Tubuli nomen odio non est?<br><br>
            </p>
        </section>
        <section id="links">
            <h1>links</h1>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
            Quia nec honesto quic quam honestius nec turpi turpius. <br>
            Memini vero, inquam; Multa sunt dicta ab antiquis de contemnendis ac despiciendis rebus humanis; <br>
            Beatus autem esse in maximarum rerum timore nemo potest. Immo alio genere;
            <br><br>
            Theophrasti igitur, inquit, tibi liber ille placet de beata vita? Qui est in parvis malis. <br>
            Itaque quantum adiit periculum! ad honestatem enim illum omnem conatum suum referebat, non ad voluptatem. <br>
            Haec para/doca illi, nos admirabilia dicamus. Non potes, nisi retexueris illa. Deinde disputat, <br>
            quod cuiusque generis animantium statui deceat extremum. Ut scias me intellegere, primum idem esse dico voluptatem, <br>
            quod ille don. Illud dico, ea, quae dicat, praeclare inter se cohaerere. <br>
            Quid dubitas igitur mutare principia naturae? Haec igitur Epicuri non probo, inquam.
            <br><br>
            Nam, ut saepe iam dixi, in infirma aetate inbecillaque mente vis naturae quasi per caliginem cernitur; <br>
            Quodcumque in mentem incideret, et quodcumque tamquam occurreret.<br>
            Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. <br>
            Ergo, si semel tristior effectus est, hilara vita amissa est? Tum mihi Piso: Quid ergo?<br>
            Id mihi magnum videtur. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. <br>
            Ita ne hoc quidem modo paria peccata sunt. Praeterea sublata cognitione et scientia tollitur omnis<br>
            ratio et vitae degendae et rerum gerendarum. Respondent extrema primis, media utrisque, omnia omnibus.<br>
            Nunc haec primum fortasse audientis servire debemus. Cui Tubuli nomen odio non est?<br><br>
            </p>
        </section>
        <section id="boeken" class="filled">
            <h1>boeken</h1>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
            Quia nec honesto quic quam honestius nec turpi turpius. <br>
            Memini vero, inquam; Multa sunt dicta ab antiquis de contemnendis ac despiciendis rebus humanis; <br>
            Beatus autem esse in maximarum rerum timore nemo potest. Immo alio genere;
            <br><br>
            Theophrasti igitur, inquit, tibi liber ille placet de beata vita? Qui est in parvis malis. <br>
            Itaque quantum adiit periculum! ad honestatem enim illum omnem conatum suum referebat, non ad voluptatem. <br>
            Haec para/doca illi, nos admirabilia dicamus. Non potes, nisi retexueris illa. Deinde disputat, <br>
            quod cuiusque generis animantium statui deceat extremum. Ut scias me intellegere, primum idem esse dico voluptatem, <br>
            quod ille don. Illud dico, ea, quae dicat, praeclare inter se cohaerere. <br>
            Quid dubitas igitur mutare principia naturae? Haec igitur Epicuri non probo, inquam.
            <br><br>
            Nam, ut saepe iam dixi, in infirma aetate inbecillaque mente vis naturae quasi per caliginem cernitur; <br>
            Quodcumque in mentem incideret, et quodcumque tamquam occurreret.<br>
            Cupit enim dícere nihil posse ad beatam vitam deesse sapienti. <br>
            Ergo, si semel tristior effectus est, hilara vita amissa est? Tum mihi Piso: Quid ergo?<br>
            Id mihi magnum videtur. Heri, inquam, ludis commissis ex urbe profectus veni ad vesperum. <br>
            Ita ne hoc quidem modo paria peccata sunt. Praeterea sublata cognitione et scientia tollitur omnis<br>
            ratio et vitae degendae et rerum gerendarum. Respondent extrema primis, media utrisque, omnia omnibus.<br>
            Nunc haec primum fortasse audientis servire debemus. Cui Tubuli nomen odio non est?<br><br>
            </p>
        </section>
    </div>
    </body>
</html>