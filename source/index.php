<?php
require_once("reference/reference.php");
$picktures = [];
$counter = 0;

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
    <div class="m1 menu">
        <div id="menu-center">
            <ul>
                <li><a class="active" href="#wiezijnwij">Wie Zijn Wij</a></li>
                <li><a href="#doelstelling">Doelstelling</a></li>
                <li><a href="#fotos">Foto's</a></li>
                <li><a href="#nieuws">Nieuws</a></li>
                <li><a href="#links">Links</a></li>
                <li><a href="#boeken">Boeken</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
    <div id="index">
        <div id="wiezijnwij">
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
        </div>
        <div id="doelstelling">
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
        </div>
        <div id="fotos">
            <?php

            $handle = opendir(dirname(realpath(__FILE__)).'/images/');
            while($file = readdir($handle)) {
                if ($file !== '.' && $file !== '..') {
                    echo '<img id="'. $file .'" src="images/' . $file . '" alt="' . substr($file, 0, -4) .'" class = "mini"/>';
                    $picktures[$counter] = $file;
                    $counter++;
                }
            }
            ?>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
            <?php
            foreach ($picktures as $image)
                echo '
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("' . $image . '");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        
        modalImg.onclick = function () {
            modal.style.display = "none";
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
    </script>
    '
            ?>
        </div>
        <div id="nieuws">
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
        </div>
        <div id="links">
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
        </div>
        <div id="boeken">
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
        </div>
    </div>
    </body>
</html>