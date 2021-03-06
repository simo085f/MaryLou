<!DOCTYPE html>
<html lang="da">
<head>
    <title>Kontakt Marylou Jewellery</title>
    <meta name="description" content="Kontakt MaryLou Jewellery og find hendes butik på Gammel Kongevej 101">
    <link rel="stylesheet" href="kontakt.css" type="text/css">
    <link rel="stylesheet" href="footer.css" type="text/css">



    <?php include "header.html";?>
    <main>

        <section id="main_grid">
            <!--Template til indholdet på kontakt siden, som skal bruges i javascript for at hente det dynamiske indhold ved hjælp af en json fil fra wordpress-->
            <section id="container" class="data-container"></section>
            <template class="data-template">
        <article class="wpPage">
            <h1 class="data-title"></h1>
            <p class="data-text"></p>
            </article>
                 </template>

            <!--Template til kortet på kontakt siden samt en iframe med kort fra google maps-->
            <section id="container1" class="data-container1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8999.202945179293!2d12.53812116172245!3d55.67506515839277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465253a1b0d9261d%3A0xff2d681764e8b880!2sMaryLou+Jewellery!5e0!3m2!1sda!2sdk!4v1545150502820" width="700" height="700" frameborder="0" style="border:0" allowfullscreen></iframe>
            </section>

        </section>
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

        //Hent Json filen ind
        async function hentJson() {
            let jsonData = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/pages?slug=kontakt");
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
