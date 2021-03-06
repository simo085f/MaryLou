<!DOCTYPE html>
<html lang="">

<head>
    <title>Marylou Jewellery</title>
    <meta name="description" content="Velkommen til MaryLou Jewellery som er en dansk smykkedesigner med butik på Frederiksberg">
    <link rel="stylesheet" href="index.css" type="text/css">
     <link rel="stylesheet" href="footer.css" type="text/css">



    <?php include "header.html"; ?>

    <main>
        <!--Templates til indholdet på index, som skal bruges i javascript for at hente det dynamiske indhold ved hjælp af en json fil fra wordpress-->
        <section id="container" class="data-container"></section>
        <template class="data-template">
        <article class="wpPage">
            <h1 class="data-title"></h1>
            <img class="image" src="" alt="">
            </article>
                 </template>


        <section id="container1" class="data-container1">
        </section>
        <template class="data-template1">
        <article class="wpPage">
            <h1 class="data-title1"></h1>
            <img class="image" src="" alt="">
            </article>
        </template>



        <section id="container2" class="data-container2"></section>
        <template class="data-template2">
            <div class="border">
        <article class="wpPage2">
            <h1 class="data-title2"></h1>
            <p class="data-text2"></p>

            </article>
                </div>
                 </template>

        <section id="container3" class="data-container3"></section>
        <template class="data-template3">
        <article class="wpPage">
            <h1 class="data-title3"></h1>
            <img class="image" src="" alt="">
            </article>
                 </template>
        <!--Function der skal gøre at når man klikker på ikonet som er en pil der pejer opad bliver man ført til toppen af siden. Samt styling af ikonet - w3schools - https://www.w3schools.com/icons/tryit.asp?icon=fas_fa-arrow-up&unicon=f062  -->
        <div onclick="topFunction()"> <i style='font-size:24px' class='fas'>&#xf062;</i></div>


    </main>
    <?php include "footer.html"; ?>
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

        let text;
        let textTemplate = document.querySelector(".data-template2");
        let textContainer = document.querySelector(".data-container2");

        let ring;
        let ringTemplate = document.querySelector(".data-template3");
        let ringContainer = document.querySelector(".data-container3");

        //Hent Json filen ind
        async function hentJson() {
            let jsonData = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/pages?slug=home1");
            pages = await jsonData.json();
            visPage();

            let jsonData1 = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/pages?slug=home2");
            billede = await jsonData1.json();
            visBillede();

            let jsonData2 = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/pages?slug=dansk-smykkedesign-og-kunsthandvaerk");
            text = await jsonData2.json();
            visText();

            let jsonData3 = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/pages?slug=home3");
            ring = await jsonData3.json();
            visRing();
        }

        function visPage() {
            console.log(pages);

            //Løb json filen igennem
            pages.forEach(page => {
                let klon = pageTemplate.cloneNode(true).content;
                klon.querySelector(".image").src = page.acf.image;

                //Placer klonen i HTML
                pageContainer.appendChild(klon);
            })
        }

        function visBillede() {
            console.log(billede);

            //Løb json filen igennem
            billede.forEach(billede => {
                let klon = billedeTemplate.cloneNode(true).content;
                klon.querySelector(".image").src = billede.acf.image;

                //Placer klonen i HTML
                billedeContainer.appendChild(klon);
            })
        }



        function visText() {
            console.log(text);

            //Løb json filen igennem
            text.forEach(text => {
                let klon = textTemplate.cloneNode(true).content;
                klon.querySelector(".data-title2").textContent = text.title.rendered;
                klon.querySelector(".data-text2").innerHTML = text.content.rendered;

                //Placer klonen i HTML
                textContainer.appendChild(klon);
            })
        }


        function visRing() {
            console.log(ring);

            //Løb json filen igennem
            ring.forEach(ring => {
                let klon = ringTemplate.cloneNode(true).content;
                klon.querySelector(".image").src = ring.acf.image;

                //Placer klonen i HTML
                ringContainer.appendChild(klon);
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
