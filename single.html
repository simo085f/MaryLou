<!DOCTYPE html>
<html lang="">
<head>
    <title>Beskrivelse af smykket</title>
    <link rel="stylesheet" href="single.css" type="text/css">
     <link rel="stylesheet" href="footer.css" type="text/css">
    <meta name="description" content="Beskrivelse af det valgte smykke">

<?php include "header.html";?>

    <main>
        <!--Template til indholdet på single siden, som skal bruges i javascript for at hente det dynamiske indhold ved hjælp af en json fil fra wordpress-->
        <section class="data-container">
                <img class="image" src="" alt="">
                <section class="information">
                <h1 class="titel"></h1>
                <div class="langbeskrivelse"></div>
                <div class="pris"></div>
                <div class="kategori"></div>
                <div class="id"></div>
                    <button class="kobnu">Læg i kurven</button>
                </section>
        </section>

        <!--Function der skal gøre at når man klikker på ikonet som er en pil der pejer opad bliver man ført til toppen af siden. Samt styling af ikonet - w3schools - https://www.w3schools.com/icons/tryit.asp?icon=fas_fa-arrow-up&unicon=f062  -->
        <div onclick="topFunction()"> <i style='font-size:24px' class='fas'>&#xf062;</i></div>
    </main>
<?php include "footer.html";?>
    <script>
        //Find DOM Elemterne
        let urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get("id");
        let smykke;

        //Hent Json filen når DOM er loaded
        document.addEventListener("DOMContentLoaded", getJson);

        //Hent Json filen ind
        async function getJson(){
            let jsonData = await fetch("https://camilla-pedersen.dk/kea/MaryLou/wordpress/wp-json/wp/v2/posts");
            alleSmykker = await jsonData.json();
            console.log(alleSmykker);
            visSmykker();
        }

        function visSmykker(){
            let klon = document.querySelector(".data-container");

            //Løb json filen igennem
            alleSmykker.forEach(smykke=>{
                if(smykke.id == id){
                    klon.querySelector(".pris").textContent = smykke.acf.pris + "kr";
                    klon.querySelector(".image").src = smykke.acf.billede;
                    klon.querySelector(".titel").textContent = smykke.title.rendered;
                    klon.querySelector(".langbeskrivelse").innerHTML = smykke.content.rendered;
                }
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
