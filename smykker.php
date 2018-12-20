<!DOCTYPE html>
<html lang="da">
<head>
    <title>Shop smykker online</title>
    <meta name="description" content="MaryLou Jewellerys webshop med et udvalg af unikke smykker, som der findes få af. Køb smykker online">
    <link rel="stylesheet" href="smykker.css" type="text/css">
     <link rel="stylesheet" href="footer.css" type="text/css">


    <?php include "header.html";?>
    <nav>
        <!--Filtreringsmenu i ipad og desktop strørrelse som skal ligge under navigationen fra header.html-->
        <section id="filtrering">
            <div class="knapper">
                <div class="menu_item" data-kategori="alle">ALLE</div>
                <div class="menu_item" data-kategori="Ringe">RINGE</div>
                <div class="menu_item" data-kategori="Øreringe">ØRERINGE</div>
                <div class="menu_item" data-kategori="Armbånd">ARMBÅND</div>
                <div class="menu_item" data-kategori="Vedhæng">VEDHÆNG</div>
                <h1></h1>
                <!--Ikon som er en indkøbskurv, den vil ikke kunne klikkes på da webshoppen er produtype.
                Ikonet er hentet fra w3schools - https://www.w3schools.com/icons/tryit.asp?icon=fas_fa-shopping-basket&unicon=f291-->
                <i class='fas fa-shopping-basket' style='font-size:18px; color:#F18FAB; width: 20px; height: 20px; margin-top: 8px;'></i>
            </div>
        </section>
    </nav>
    <!--Function der skal gøre at når man klikker på ikonet som er en pil der pejer opad bliver man ført til toppen af siden. Samt styling af ikonet - w3schools - https://www.w3schools.com/icons/tryit.asp?icon=fas_fa-arrow-up&unicon=f062  -->
    <div onclick="topFunction()"> <i class='fas fa-arrow-up' style='font-size:24px'></i></div>

    <main>
        <!--Filtrerings knap med dropdown funktion knappen vil fungere både som åben og luk knap-->
        <div class="dropdown">
            <button onclick="dropFunction()" class="dropknap">FILTRERING</button>
            <!--De filtrerings muligheder som vil blive vist og skjult ved klik på filtreringsknappen-->
            <div id="drop" class="content">
                <div class="menu_item" data-kategori="alle">ALLE</div>
                <div class="menu_item" data-kategori="Ringe">RINGE</div>
                <div class="menu_item" data-kategori="Øreringe">ØRERINGE</div>
                <div class="menu_item" data-kategori="Armbånd">ARMBÅND</div>
                <div class="menu_item" data-kategori="Vedhæng">VEDHÆNG</div>
            </div>
        </div>

        <!--Template til indholdet på smykke siden, som skal bruges i javascript for at hente det dynamiske indhold ved hjælp af en json fil fra wordpress-->
        <section class="smykker"></section>
        <template class="smykke-template">
        <article class="smykke-container">
            <img class="image" src="" alt="">
            <div id="text1">
            <div class="titel"></div>
            <div class="pris"></div>
            <button class="koeb">Læs mere</button>
                </div>
            <div class="kategori"></div>
        </article>
        </template>
    </main>
<?php include "footer.html";?>
    <script>
        //Hent Json filen når DOM er loaded
        document.addEventListener("DOMContentLoaded", getJson);

        //Find DOM Elemterne
        let alleSmykker;
        let smykkeTemplate = document.querySelector(".smykke-template");
        let smykkeContainer = document.querySelector(".smykker");
        let clickState = 0;

        smykkeFilter = "alle";

        //Hent Json filen ind
        async function getJson() {
            let jsonData = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/posts?per_page=38");
            alleSmykker = await jsonData.json();
            console.log(alleSmykker);
            visSmykker();
        }

        //Når der klikkes på et af menu_item skal function filtreringen starte
        document.querySelectorAll(".menu_item").forEach(knap => {
            knap.addEventListener("click", filtrering);
        })

        function filtrering() {
            //Produkterne bliver indelt i deres kategorier så de bliver filtreret og vist
            smykkeContainer.textContent = "";
            smykkeFilter = this.getAttribute("data-kategori");
            visSmykker();
        }

        function visSmykker() {
            console.log(visSmykker + smykkeFilter);
            //Løb json filen igennem og hvis det er klikket på en kategori skal de vises ellers vises alle
            alleSmykker.forEach(smykke => {
                if (smykkeFilter == smykke.acf.kategori) {
                    udskriv();
                } else if (smykkeFilter == "alle") {
                    udskriv();
                }


                function udskriv() {
                    //Det content som hentes fra json filen og vises
                    let klon = smykkeTemplate.cloneNode(true).content;
                    klon.querySelector(".pris").textContent = smykke.acf.pris + "kr";
                    klon.querySelector(".image").src = smykke.acf.billede;
                    klon.querySelector(".titel").textContent = smykke.title.rendered;

                    //Når der klikkes på button skal der åbenes et nyt vindue som er single.php
                    klon.querySelector("button").addEventListener("click", () => {
                        window.location.href = "single.php?id=" + smykke.id;

                    });

                    //Placer klonen i HTML
                    smykkeContainer.appendChild(klon);
                }
            })
        }


        /*Til at få contentet på siden til at rykke ned når menu-itemsne vises og til at rykke contentet tilbage igen når menu-itemsne fjernes har jeg brugt denne kode fra codepen - https://codepen.io/html5andblog/pen/BpzvZW*/
        function dropFunction() {
            if (clickState == 0) {
                /*Ryk content(.smykker) ned og vis content/menu-knapper*/
                document.querySelector(".smykker").style.marginTop = "220px";
                document.querySelector("#drop").classList.add("visContent");
                clickState = 1;
            } else {
                /*Ryk content(.smykker) op og skjul content/menu-knapper*/
                document.querySelector(".smykker").style.marginTop = "20px";
                document.querySelector("#drop").classList.remove("visContent");
                clickState = 0;
            }
        }

        /*JAVASCRIPT TIL IKONET DER SKAL FØRER TIL TOPPEN AF SITET NÅR DER KLIKKES - HJÆLP FRA w3schools https://www.w3schools.com/howto/howto_js_scroll_to_top.asp*/
        //når siden er loaded skal top iconet gemmes indtil der scrolles
        document.addEventListener("DOMContentLoaded", gem);

        function gem() {
            document.querySelector(".fa-arrow-up").style.display = "none";
        }

        //Når brugeren scroller 100px ned skal knappen vises
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.querySelector(".fa-arrow-up").style.display = "block";

            } else {
                document.querySelector(".fa-arrow-up").style.display = "none";
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
