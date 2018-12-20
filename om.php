<!DOCTYPE html>
<html lang="">
<head>
    <title>Om Marylou Jewellery</title>
    <link rel="stylesheet" href="om.css" type="text/css">
     <link rel="stylesheet" href="footer.css" type="text/css">
    <meta name="description" content="Om side som omhandler Marylou Jewerllery og hvor hendes inspiration til at lave smykker kommer fra">




    <?php include "header.html";?>
    <main>
        <!--Templates til indholdet på om siden, som skal bruges i javascript for at hente det dynamiske indhold ved hjælp af en json fil fra wordpress-->
        <section id="container" class="data-container"></section>
        <template class="data-template">
        <article class="wpPage">
            <h1 class="data-title"></h1>
            <p class="data-text"></p>
        </article>
        </template>

        <section id="container1" class="data-container1"></section>
        <template class="data-template1">
        <article class="wpPage">
            <h1 class="data-title1"></h1>
            <p class="data-text1"></p>
        </article>
        </template>

        <!--Function der skal gøre at når man klikker på ikonet som er en pil der pejer opad bliver man ført til toppen af siden. Samt styling af ikonet - w3schools - https://www.w3schools.com/icons/tryit.asp?icon=fas_fa-arrow-up&unicon=f062  -->
        <div onclick="topFunction()"> <i style='font-size:24px' class='fas'>&#xf062;</i></div>

    </main>

    <?php include "footer.html";?>

    <script>
        //Hent Json filen når DOM er loaded
        document.addEventListener("DOMContentLoaded", hentJson);

        //Find DOM Elemterne
        let pages;
        let pageTemplate = document.querySelector(".data-template");
        let pageContainer = document.querySelector(".data-container");

        let billede;
        let billedeTemplate = document.querySelector(".data-template1");
        let billedeContainer = document.querySelector(".data-container1");

        //Hent Json filen ind
        async function hentJson() {
            let jsonData = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/pages?slug=marylou-jewellery");
            pages = await jsonData.json();
            visPage();

            let jsonData1 = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/pages?slug=776-2");
            billede = await jsonData1.json();
            visBillede();
        }

        function visPage() {
            console.log(pages);

            //Løb json filen igennem
            pages.forEach(page => {
                let klon = pageTemplate.cloneNode(true).content;
                klon.querySelector(".data-title").textContent = page.title.rendered;
                klon.querySelector(".data-text").innerHTML = page.content.rendered;

                //Placer klonen i HTML
                pageContainer.appendChild(klon);
            })
        }

        function visBillede() {
            console.log(billede);

            //Løb json filen igennem
            billede.forEach(billede => {
                let klon = billedeTemplate.cloneNode(true).content;
                klon.querySelector(".data-text1").innerHTML = billede.content.rendered;

                //Placer klonen i HTML
                billedeContainer.appendChild(klon);
            })
        }

        /*JAVASCRIPT TIL IKONET DER SKAL FØRER TIL TOPPEN AF SITET NÅR DER KLIKKES - HJÆLP FRA w3schools https://www.w3schools.com/howto/howto_js_scroll_to_top.asp*/
        //når siden er loaded skal top iconet gemmes indtil der scrolles
        document.addEventListener("DOMContentLoaded", gem);

        function gem() {
            document.querySelector(".fas").style.display = "none";
        }

        //Når brugeren scroller 100px ned skal knappen vises
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.querySelector(".fas").style.display = "block";

            } else {
                document.querySelector(".fas").style.display = "none";
            }
        }

        // når brugeren klikker på iconet skal den automatisk scrolle til toppen af dokumentet
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>
