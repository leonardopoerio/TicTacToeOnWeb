<!DOCTYPE html>
<!-- Made by Leonardo Poerio -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game - Tic Tac Toe on web</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div id="resulter">
        <span id="resulterr"></span>
        <a href="../home.html" class="visitador" id="home" title="Back to homepage"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
        </svg></a>
        <a href="game.html" class="visitador" id="restart" title="Start a new game"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
        </svg></a>
    </div>
    <div id="gameBoard">
        <div class="row">
            <div class="gameCell" id="A1"></div>
            <div class="gameCell" id="B1"></div>
            <div class="gameCell" id="C1"></div>
        </div>
        <div class="row">
            <div class="gameCell" id="A2"></div>
            <div class="gameCell" id="B2"></div>
            <div class="gameCell" id="C2"></div>
        </div>
        <div class="row">
            <div class="gameCell" id="A3"></div>
            <div class="gameCell" id="B3"></div>
            <div class="gameCell" id="C3"></div>
        </div>
    </div>
    <div id="controlPanel">
        <h4>Control Panel</h4>
        <div class="buttonContainer">
            <a href="../home.html">
                <button id="backHome" accesskey="b" title="Back to home (Alt+c)">Back to home</button>
            </a>
            <button id="clearCells" accesskey="c" title="Clear cells (Alt+c)">Clear Cells</button>
        </div>
        <div id="console">
            <p id="consolePrint">Starting the game...</p>
        </div>
    </div>
    <script>
        var count = 1;
        var ccount = 2;
        var cccount = 3;
        var user = "";
        var playerIndex = Math.floor((Math.random() * 2) + 1);
        var randomN = playerIndex;
        if (randomN == 2) {
            user = "0-USER"
            $("#consolePrint").append("<br>The first turn is of " + user);
        } else {
            user = "X-USER"
            $("#consolePrint").append("<br>The first turn is of " + user);
        }

        function nwin() {
            $("#resulter").animate({
                        bottom: 0
                    }, 1000);
                        $("#resulterr").html("Nobody won");
        }

        function xwin() {
            $("#resulter").animate({
                        bottom: 0
                    }, 1000);
                        $("#resulterr").html("X-USER won!!!");
        }

        function owin() {
            $("#resulter").animate({
                        bottom: 0
                    }, 1000);
                        $("#resulterr").html("0-USER won!!!");
        }

        function game() {
            var counter = 0;
            $(".gameCell").click(function () {
                if (playerIndex == 1) {
                    if ($(this).attr("class") == "gameCell") {
                        $(this).addClass("x-selected");
                        $(".x-selected").css("background-image", "url('xplayer.svg')");
                        counter++;
                        playerIndex = 2;
                        $("#consolePrint").html($("#consolePrint").html() + "<br>" + "X-USER clicked on " + $(this).attr("id") + "<br>" + "Now is the turn of 0-USER");
                    }
                    
                }
                if (playerIndex == 2){
                    if ($(this).attr("class") == "gameCell") {
                        $(this).addClass("o-selected");
                        //$(".x-selected").css("background-image", "url('xplayer.svg')");
                        $(".o-selected").css("background-image", "url('oplayer.svg')");
                        counter++;
                        playerIndex = 1;
                        $("#consolePrint").html($("#consolePrint").html() + "<br>" + "0-USER clicked on " + $(this).attr("id") + "<br>" + "Now is the turn of X-USER");
                    }
                }
                
                if (counter != 0) {
                    if ($("#A" + count).attr("class") == "gameCell x-selected" && $("#B" + count).attr("class") == "gameCell x-selected" && $("#C" + count).attr("class") == "gameCell x-selected") {
                        xwin();
                    } else if ($("#A" + count).attr("class") == "gameCell x-selected" && $("#A" + ccount).attr("class") == "gameCell x-selected" && $("#A" + cccount).attr("class") == "gameCell x-selected") {
                        xwin();
                        $("#resulterr").html("X-USER winned!!!");
                    } else if ($("#A" + ccount).attr("class") == "gameCell x-selected" && $("#B" + ccount).attr("class") == "gameCell x-selected" && $("#C" + ccount).attr("class") == "gameCell x-selected") {
                        xwin();
                    } else if ($("#B" + count).attr("class") == "gameCell x-selected" && $("#B" + ccount).attr("class") == "gameCell x-selected" && $("#B" + cccount).attr("class") == "gameCell x-selected") {
                        xwin();
                    } else if ($("#A" + cccount).attr("class") == "gameCell x-selected" && $("#B" + cccount).attr("class") == "gameCell x-selected" && $("#C" + cccount).attr("class") == "gameCell x-selected") {
                        xwin();
                    } else if ($("#C" + count).attr("class") == "gameCell x-selected" && $("#C" + ccount).attr("class") == "gameCell x-selected" && $("#C" + cccount).attr("class") == "gameCell x-selected") {
                        xwin();
                    } else if ($("#A" + count).attr("class") == "gameCell x-selected" && $("#B" + ccount).attr("class") == "gameCell x-selected" && $("#C" + cccount).attr("class") == "gameCell x-selected") {
                        xwin();
                    } else if ($("#A" + cccount).attr("class") == "gameCell x-selected" && $("#B" + ccount).attr("class") == "gameCell x-selected" && $("#C" + count).attr("class") == "gameCell x-selected") {
                        xwin();
                    } else if ($("#A" + count).attr("class") == "gameCell o-selected" && $("#B" + count).attr("class") == "gameCell o-selected" && $("#C" + count).attr("class") == "gameCell o-selected") {
                        owin();
                    } else if ($("#A" + count).attr("class") == "gameCell o-selected" && $("#A" + ccount).attr("class") == "gameCell o-selected" && $("#A" + cccount).attr("class") == "gameCell o-selected") {
                        owin();
                    } else if ($("#A" + ccount).attr("class") == "gameCell o-selected" && $("#B" + ccount).attr("class") == "gameCell o-selected" && $("#C" + ccount).attr("class") == "gameCell o-selected") {
                        owin();
                    } else if ($("#B" + count).attr("class") == "gameCell o-selected" && $("#B" + ccount).attr("class") == "gameCell o-selected" && $("#B" + cccount).attr("class") == "gameCell o-selected") {
                        owin();
                    } else if ($("#A" + cccount).attr("class") == "gameCell o-selected" && $("#B" + cccount).attr("class") == "gameCell o-selected" && $("#C" + cccount).attr("class") == "gameCell o-selected") {
                        owin();
                    } else if ($("#C" + count).attr("class") == "gameCell o-selected" && $("#C" + ccount).attr("class") == "gameCell o-selected" && $("#C" + cccount).attr("class") == "gameCell o-selected") {
                        owin();
                    } else if ($("#A" + count).attr("class") == "gameCell o-selected" && $("#B" + ccount).attr("class") == "gameCell o-selected" && $("#C" + cccount).attr("class") == "gameCell o-selected") {
                        owin();
                    } else if ($("#A" + cccount).attr("class") == "gameCell o-selected" && $("#B" + ccount).attr("class") == "gameCell o-selected" && $("#C" + count).attr("class") == "gameCell o-selected") {
                        owin();
                    } else if (counter == 9) {
                        nwin();
                    }
                }
            });
        }
        game();
        
    </script>
    <script>
        $("#backHome").hover(function() {
            $("#backHome").animate({
                backgroundColor: "#fffff0"
            }, 200);
        }, function () {
            $("#backHome").animate({
                backgroundColor: "#047500"
            }, 200);
        });
        $("#clearCells").hover(function() {
            $("#clearCells").animate({
                backgroundColor: "#fffff0"
            }, 200);
        }, function () {
            $("#clearCells").animate({
                backgroundColor: "#c40000"
            }, 200);
        });
    </script>
    <script>
        $("#clearCells").click(function reset() {
            $(".gameCell").removeClass("x-selected");
            $(".gameCell").removeClass("o-selected");
            $(".gameCell").removeAttr("style");
            $("#consolePrint").html("Starting the game...");
            counter = 0;
            user = "";
            playerIndex = Math.floor((Math.random() * 2));
            randomN = playerIndex;
            if (randomN == 0) {
                user = "0-USER"
                $("#consolePrint").append("<br>The first turn is of " + user);
            } else {
                user = "X-USER"
                $("#consolePrint").append("<br>The first turn is of " + user);
            }
            game();
        });
    </script>
    <script>
        var container = $('#console');
        var scrollTo = $('#consolePrint');
  
        // Calculating new position of scrollbar
        var position = scrollTo.offset().top 
                - container.offset().top 
                + container.scrollTop();
  
        // Setting the value of scrollbar
        container.scrollTop(position);
    </script>
</body>
</html>