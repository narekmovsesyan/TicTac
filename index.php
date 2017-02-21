<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tic Tac</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body>

    <div class="gameOverDiv">
        <p class="gameOverDivText">Game Over</p>
    </div>
    <div class="gamerButtonsStyle">
        <input type = "button" id = "x" class="gamerDefine gamerDefineStyle_X" value="X" >
        <input type = "button" id = "0" class="gamerDefine gamerDefineStyle_0" value="0" >
    </div>

    <ul  class="inp">
        <li>
            <input type = "button" id = "a1" value="">
            <input type = "button" id = "a2" value="">
            <input type = "button" id = "a3" value="">
        </li>
        <li>
           <input type = "button" id="a4" value="">
           <input type = "button" id="a5" value="">
           <input type = "button" id="a6" value="">
        </li>
        <li>
           <input type = "button" id = "a7" value="">
           <input type = "button" id = "a8" value="">
           <input type = "button" id = "a9" value="">
        <li>
    </ul>

    <h1 id="win">Choose "X - 0" and play</h1>
    <input type = "button" id = "resset" value="New Game" class="newGameButton">
    <style>
        .inp{
            text-align: center;
            width: 250px;
            height: 250px;
            margin: 100px auto;
        }
        input{
            width: 70px;
            height: 70px;
            display: block;
            float: left;
            cursor: pointer;
        }
        .gameOverDiv{
            border: 2px solid #02a6f2;
            background-color: #b80a06;
            left: 557px;
            width: 207px;
            height: 208px;
            display: none;
            position: absolute;
        }
        .gameOverDivText{
            color: aquamarine;
            font-size: 42px;
            margin-left: 5px;
            margin-top: 77px;
        }
        .newGameButton{
            width:118px;
            height:50px;
            margin-left: 590px;
        }
        .gamerDefineStyle_X{
            border:3px solid #02a6f2;
        }
        .gamerDefineStyle_0{
            margin-left: 8px;
            border:3px solid #02a6f2;
        }
        .gamerButtonsStyle{
            margin-left: 372px;
        }
        #win{
            margin-top:-131px;
            margin-left: 533px;
        }
        ul{
            width: 213px;
            height: 220px;
            padding: 0px;
        }
        li{
            list-style:none;
        }

    </style>

    <script>
        var humen='';
        var computer='';
        var inputLineId;

        clikButt();

        function clikButt(){

            $('input').click(function(){
                inputLineId = this.id;

                if($("#"+inputLineId).val()==""){
                    $("#"+inputLineId).val(humen);

                    logik();

                    var buttonVars=getVal();

                    chek(buttonVars.button1,buttonVars.button2,buttonVars.button3);
                    chek(buttonVars.button1,buttonVars.button5,buttonVars.button9);
                    chek(buttonVars.button1,buttonVars.button4,buttonVars.button7);
                    chek(buttonVars.button4,buttonVars.button5,buttonVars.button6);
                    chek(buttonVars.button7,buttonVars.button8,buttonVars.button9);
                    chek(buttonVars.button2,buttonVars.button5,buttonVars.button8);
                    chek(buttonVars.button3,buttonVars.button6,buttonVars.button9);
                    chek(buttonVars.button3,buttonVars.button5,buttonVars.button7);

                    if(buttonVars.button1!="" && buttonVars.button2!="" && buttonVars.button3!="" && buttonVars.button4!="" && buttonVars.button5!=""
                        && buttonVars.button6!="" && buttonVars.button7!="" && buttonVars.button8!="" && buttonVars.button9!="")
                    {
                            $('#win').html('Drew').css({"color":"Red"});
                              $('.gameOverDiv').fadeTo("slow", 0.2);
                    }
                }
            });
        }

        function getVal(){
            return{'button1':$('#a1').val(),
                   'button2':$('#a2').val(),
                   'button3':$('#a3').val(),
                   'button4':$('#a4').val(),
                   'button5':$('#a5').val(),
                   'button6':$('#a6').val(),
                   'button7':$('#a7').val(),
                   'button8':$('#a8').val(),
                   'button9':$('#a9').val()
            }
        }
        var buttonVars=getVal();

        function resetVal(){
            $('#a1').val("");
            $('#a2').val("");
            $('#a3').val("");
            $('#a4').val("");
            $('#a5').val("");
            $('#a6').val("");
            $('#a7').val("");
            $('#a8').val("");
            $('#a9').val("");
        }
        gamer();
        function gamer(){
            $('.gamerDefine').click(function(){
                    if ($(this).val() == 'X'){
                        $('#0').fadeOut();
                    $('#x').fadeOut();
                        humen = 'X';
                        computer = '0';
                        $('#win').html('Your gamer figur'+' '+humen).css("color","black");
                    }else if($(this).val() == '0'){
                        $('#x').fadeOut();
                        $('#0').fadeOut();
                        humen = '0';
                        computer = 'X';
                        $('#win').html('Your gamer figur'+' '+humen).css("color","black");
                        getVal();
                        logik();
                    }
            })
        }
        newGame();
        function newGame(){
            $('.newGameButton').click(function(){
                $('#win').html('Choose "X - 0" and play').css("color","black");
                    resetVal();
                    humen = '';
                    computer = '';

                    $('#0').show();
                    $('#x').show();
                    $('.gameOverDiv').hide();
            })
        }
        function chek(var1,var2,var3){
            if(var1==var2 && var2==var3 && var1!="")
            {
                if (var1==humen){
                    $('#win').html(humen+' gamer '+'you win').css({"color":"Red"});

                }else if(var1==computer){
                    $('#win').html(humen+' gamer '+'you lose').css({"color":"Red"});
                }
                $('.gameOverDiv').fadeTo("slow", 0.2);
            }
        }

//        var val;
//        var emptyButton;
//
//        function emptyButtonSearch(){
//                  emptyButton = [a5,a9,a3,a6,a7,a8,a1,a2,a4];
//
//                    emptyButton.forEach(function(val){
//                        if (val ==""){
//                            $('#'+ val).val(computer);
//                        }
//                    })
//                }
        function logik(){
           var buttonVars=getVal();

            if(buttonVars.button5==""){
            $('#a5').val(computer);
            }else if(buttonVars.button5==""&&((buttonVars.button1=="0"&&buttonVars.button9=="0")||(buttonVars.button2=="0"&&buttonVars.button8=="0")||(buttonVars.button3=="0"&&buttonVars.button7=="0")||(buttonVars.button4=="0"&&buttonVars.button6=="0"))){
                $('#a5').val(computer);
            }else if (buttonVars.button9==""&&((buttonVars.button3=="0"&&buttonVars.button6=="0")||(buttonVars.button1=="0"&&buttonVars.button5=="0")||(buttonVars.button7=="0"&&buttonVars.button8=="0")||(buttonVars.button3=="X"&&buttonVars.button8=="X"))){
                $('#a9').val(computer);
            }else if(buttonVars.button1==""&&((buttonVars.button2=="0"&&buttonVars.button3=="0")||(buttonVars.button4=="0"&&buttonVars.button7=="0")||(buttonVars.button5=="0"&&buttonVars.button9=="0"))){
                $('#a1').val(computer);
            }
            else if(buttonVars.button3==""&&((buttonVars.button1=="0"&&buttonVars.button2=="0")||(buttonVars.button5=="0"&&buttonVars.button7=="0")||(buttonVars.button6=="0"&&buttonVars.button9=="0"))){
                $('#a3').val(computer);
            }
            else if(buttonVars.button2==""&&((buttonVars.button1=="0"&&buttonVars.button3=="0")||(buttonVars.button5=="0"&&buttonVars.button8=="0"))){
                $('#a2').val(computer);
            }
            else if(buttonVars.button4==""&&((buttonVars.button5=="0"&&buttonVars.button6=="0")||(buttonVars.button1=="0"&&buttonVars.button7=="0"))){
                  $('#a4').val(computer);
            }
            else if(buttonVars.button6==""&&((buttonVars.button5=="0"&&buttonVars.button4=="0")||(buttonVars.button3=="0"&&buttonVars.button9=="0"))){
                 $('#a6').val(computer);
            }
            else if(buttonVars.button7==""&&((buttonVars.button1=="0"&&buttonVars.button4=="0")||(buttonVars.button8=="0"&&buttonVars.button9=="0")||(buttonVars.button5=="0"&&buttonVars.button3=="0"))){
                  $('#a7').val(computer);
            }
            else if(buttonVars.button8==""&&((buttonVars.button1=="0"&&buttonVars.button3=="0"&&buttonVars.button4=="0")||(buttonVars.button2=="0"&&buttonVars.button5=="0")||(buttonVars.button7=="0"&&buttonVars.button9=="0"))){
                  $('#a8').val(computer);
            }

//            ---------------------------------- 0000------------------------

            else if(buttonVars.button2==""&&((buttonVars.button3=="X"&&buttonVars.button4=="X"&& buttonVars.button9=="X"&&buttonVars.button1=="X"))){
                $('#a2').val(computer);
            }
            else if(buttonVars.button8==""&&((buttonVars.button1=="X"&&buttonVars.button9=="X"))){
                  $('#a8').val(computer);

            }else if(buttonVars.button7==""&&((buttonVars.button4=="X"&&buttonVars.button9=="X"))){
                  $('#a7').val(computer);

            }else if(buttonVars.button6==""&&((buttonVars.button4=="X"&&buttonVars.button9=="X"&&buttonVars.button3=="X"))){
                  $('#a6').val(computer);

            }else if(buttonVars.button6==""&&((buttonVars.button4=="X"&&buttonVars.button9=="X"&&buttonVars.button3=="X"))){
                  $('#a6').val(computer);

            }else if(buttonVars.button1==""&&((buttonVars.button2=="X"&&buttonVars.button7=="X"&&buttonVars.button6=="X"))){
                  $('#a1').val(computer);
            }
            else if(buttonVars.button3==""&&((buttonVars.button1=="X"&&buttonVars.button2=="X")||(buttonVars.button5=="X"&&buttonVars.button7=="X")||(buttonVars.button6=="X"&&buttonVars.button9=="X"))){
                $('#a3').val(computer);

            }else if(buttonVars.button2==""&&((buttonVars.button1=="X"&&buttonVars.button3=="X")||(buttonVars.button5=="X"&&buttonVars.button8=="X"))){
                $('#a2').val(computer);
            }
            else if(buttonVars.button1==""&&((buttonVars.button2=="X"&&buttonVars.button3=="X")||(buttonVars.button4=="X"&&buttonVars.button7=="X")||(buttonVars.button5=="X"&&buttonVars.button9=="X")||(buttonVars.button2=="X"&&buttonVars.button4=="X"))){
                $('#a1').val(computer);

            }else if(buttonVars.button4==""&&((buttonVars.button5=="X"&&buttonVars.button6=="X")||(buttonVars.button1=="X"&&buttonVars.button7=="X"))){
                $('#a4').val(computer);

            }else if(buttonVars.button5==""&&((buttonVars.button1=="X"&&buttonVars.button9=="X")||(buttonVars.button2=="X"&&buttonVars.button8=="X")||(buttonVars.button3=="X"&&buttonVars.button7=="X")||(buttonVars.button4=="X"&&buttonVars.button6=="X"))){
                $('#a5').val(computer);
            }
            else if(buttonVars.button1==""&&((buttonVars.button6=="X"&&buttonVars.button8=="X"&&buttonVars.button7=="X")||(buttonVars.button6=="X"&&buttonVars.button8=="X"&&buttonVars.button3=="X")||(buttonVars.button6=="X"&&buttonVars.button8=="X"&&buttonVars.button2=="X")||(buttonVars.button6=="X"&&buttonVars.button8=="X"&&buttonVars.button4=="X"))){
                $('#a1').val(computer);

//                --------------------
            }else if(buttonVars.button6==""&&((buttonVars.button5=="X"&&buttonVars.button4=="X")||(buttonVars.button3=="X"&&buttonVars.button9=="X"))){
                $('#a6').val(computer);
            }else if(buttonVars.button7==""&&((buttonVars.button1=="X"&&buttonVars.button4=="X")||(buttonVars.button8=="X"&&buttonVars.button9=="X")||(buttonVars.button5=="X"&&buttonVars.button3=="X"))){
                $('#a7').val(computer);

            }else if(buttonVars.button8==""&&((buttonVars.button1=="X" && buttonVars.button3=="X"&& buttonVars.button4=="X")||(buttonVars.button2=="X"&&buttonVars.button5=="X")||(buttonVars.button7=="X"&&buttonVars.button9=="X"))){
                $('#a8').val(computer);

            }else if(buttonVars.button9==""&&((buttonVars.button3=="X"&&buttonVars.button6=="X")||(buttonVars.button1=="X"&&buttonVars.button5=="X")||(buttonVars.button7=="X"&&buttonVars.button8=="X"))) {
                $('#a9').val(computer);
            }
            else if(buttonVars.button1==""&&((buttonVars.button5=="0"&&buttonVars.button6=="X"&& buttonVars.button8=="X"))){
                $('#a9').val(computer);
            }else if(buttonVars.button7=="X"&&((buttonVars.button8==""&&buttonVars.button6==""))){
                $('#a8').val(computer);
            }

//            else {
//                emptyButtonSearch();
//            }
            else if(buttonVars.button5==""){
                $('#a5').val(computer);
            }else if(buttonVars.button9==""){
                $('#a9').val(computer);
            }else if(buttonVars.button3==""){
                $('#a3').val(computer);
            }else if(buttonVars.button6==""){
                $('#a6').val(computer);
            }else if(buttonVars.button7==""){
                $('#a7').val(computer);
            }else if(buttonVars.button8==""){
                $('#a8').val(computer);
            }else if(buttonVars.button1==""){
                $('#a1').val(computer);
            }else if(buttonVars.button2==""){
                $('#a2').val(computer);
            }else if(buttonVars.button4==""){
                $('#a4').val(computer);
            }
        }
    </script>
</body>
</html>

