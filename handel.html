<!DOCTYPE html>
<html lang="">
<head>
   <title>Handelsbetingelser</title>
    <meta name="description" content="Handelsbetingelser ved køb af smykker hos MaryLou Jewellery">
    <link rel="stylesheet" href="betingelser.css" type="text/css">
     <link rel="stylesheet" href="footer.css" type="text/css">



    <?php include "header.html"; ?>
    <main>
        <!--Template til indholdet på handelsbetingelser siden, som skal bruges i javascript for at hente det dynamiske indhold ved hjælp af en json fil fra wordpress-->
        <section id="container" class="data-container"></section>
        <template class="data-template">
        <article class="wpPage">
            <h1 class="data-title"></h1>
            <p class="data-text"></p>
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

        //Hent Json filen ind
        async function hentJson() {
            let jsonData = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/pages?slug=handelsbetingelser");
            pages = await jsonData.json();
            visPage();
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
