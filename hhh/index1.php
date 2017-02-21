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

        var a1;
        var a2;
        var a3;

        var a4;
        var a5;
        var a6;

        var a7;
        var a8;
        var a9;
        var inputLineId;

        clikButt();

        function clikButt(){

            $('input').click(function(){
                inputLineId = this.id;

                if($("#"+inputLineId).val()==""){
                    $("#"+inputLineId).val(humen);

                    getVal();
                    logik();
                    getVal();
                    chek(a1,a2,a3);
                    chek(a1,a5,a9);
                    chek(a1,a4,a7);
                    chek(a4,a5,a6);
                    chek(a7,a8,a9);
                    chek(a2,a5,a8);
                    chek(a3,a6,a9);
                    chek(a3,a5,a7);

                    if(a1!="" && a2!="" && a3!="" && a4!="" && a5!="" && a6!="" && a7!="" && a8!="" && a9!="")
                    {
                            $('#win').html('Drew').css({"color":"Red"});
                              $('.gameOverDiv').fadeTo("slow", 0.2);
                    }
                }
            });
        }

        function getVal(){
            a1=$('#a1').val();
            a2=$('#a2').val();
            a3=$('#a3').val();

            a4=$('#a4').val();
            a5=$('#a5').val();
            a6=$('#a6').val();

            a7=$('#a7').val();
            a8=$('#a8').val();
            a9=$('#a9').val();
        }
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

            if(a5==""){
            $('#a5').val(computer);
            }else if(a5==""&&((a1=="0"&&a9=="0")||(a2=="0"&&a8=="0")||(a3=="0"&&a7=="0")||(a4=="0"&&a6=="0"))){
                $('#a5').val(computer);
            }else if (a9==""&&((a3=="0"&&a6=="0")||(a1=="0"&&a5=="0")||(a7=="0"&&a8=="0")||(a3=="X"&&a8=="X"))){
                $('#a9').val(computer);
            }else if(a1==""&&((a2=="0"&&a3=="0")||(a4=="0"&&a7=="0")||(a5=="0"&&a9=="0"))){
                $('#a1').val(computer);
            }
            else if(a3==""&&((a1=="0"&&a2=="0")||(a5=="0"&&a7=="0")||(a6=="0"&&a9=="0"))){
                $('#a3').val(computer);
            }
            else if(a2==""&&((a1=="0"&&a3=="0")||(a5=="0"&&a8=="0"))){
                $('#a2').val(computer);
            }
            else if(a4==""&&((a5=="0"&&a6=="0")||(a1=="0"&&a7=="0"))){
                  $('#a4').val(computer);
            }
            else if(a6==""&&((a5=="0"&&a4=="0")||(a3=="0"&&a9=="0"))){
                 $('#a6').val(computer);
            }
            else if(a7==""&&((a1=="0"&&a4=="0")||(a8=="0"&&a9=="0")||(a5=="0"&&a3=="0"))){
                  $('#a7').val(computer);
            }
            else if(a8==""&&((a1=="0"&&a3=="0"&&a4=="0")||(a2=="0"&&a5=="0")||(a7=="0"&&a9=="0"))){
                  $('#a8').val(computer);
            }

//            ---------------------------------- 0000------------------------

            else if(a2==""&&((a3=="X"&&a4=="X"&& a9=="X"&&a1=="X"))){
                $('#a2').val(computer);
            }
            else if(a8==""&&((a1=="X"&&a9=="X"))){
                  $('#a8').val(computer);

            }else if(a7==""&&((a4=="X"&&a9=="X"))){
                  $('#a7').val(computer);

            }else if(a6==""&&((a4=="X"&&a9=="X"&&a3=="X"))){
                  $('#a6').val(computer);

            }else if(a6==""&&((a4=="X"&&a9=="X"&&a3=="X"))){
                  $('#a6').val(computer);

            }else if(a1==""&&((a2=="X"&&a7=="X"&&a6=="X"))){
                  $('#a1').val(computer);
            }
            else if(a3==""&&((a1=="X"&&a2=="X")||(a5=="X"&&a7=="X")||(a6=="X"&&a9=="X"))){
                $('#a3').val(computer);

            }else if(a2==""&&((a1=="X"&&a3=="X")||(a5=="X"&&a8=="X"))){
                $('#a2').val(computer);
            }
            else if(a1==""&&((a2=="X"&&a3=="X")||(a4=="X"&&a7=="X")||(a5=="X"&&a9=="X")||(a2=="X"&&a4=="X"))){
                $('#a1').val(computer);

            }else if(a4==""&&((a5=="X"&&a6=="X")||(a1=="X"&&a7=="X"))){
                $('#a4').val(computer);

            }else if(a5==""&&((a1=="X"&&a9=="X")||(a2=="X"&&a8=="X")||(a3=="X"&&a7=="X")||(a4=="X"&&a6=="X"))){
                $('#a5').val(computer);
            }
            else if(a1==""&&((a6=="X"&&a8=="X"&&a7=="X")||(a6=="X"&&a8=="X"&&a3=="X")||(a6=="X"&&a8=="X"&&a2=="X")||(a6=="X"&&a8=="X"&&a4=="X"))){
                $('#a1').val(computer);

//                --------------------
            }else if(a6==""&&((a5=="X"&&a4=="X")||(a3=="X"&&a9=="X"))){
                $('#a6').val(computer);
            }else if(a7==""&&((a1=="X"&&a4=="X")||(a8=="X"&&a9=="X")||(a5=="X"&&a3=="X"))){
                $('#a7').val(computer);

            }else if(a8==""&&((a1=="X" && a3=="X"&& a4=="X")||(a2=="X"&&a5=="X")||(a7=="X"&&a9=="X"))){
                $('#a8').val(computer);

            }else if(a9==""&&((a3=="X"&&a6=="X")||(a1=="X"&&a5=="X")||(a7=="X"&&a8=="X"))) {
                $('#a9').val(computer);
            }
            else if(a1==""&&((a5=="0"&&a6=="X"&& a8=="X"))){
                $('#a9').val(computer);
            }else if(a7=="X"&&((a8==""&&a6==""))){
                $('#a8').val(computer);
            }

//            else {
//                emptyButtonSearch();
//            }
            else if(a5==""){
                $('#a5').val(computer);
            }else if(a9==""){
                $('#a9').val(computer);
            }else if(a3==""){
                $('#a3').val(computer);
            }else if(a6==""){
                $('#a6').val(computer);
            }else if(a7==""){
                $('#a7').val(computer);
            }else if(a8==""){
                $('#a8').val(computer);
            }else if(a1==""){
                $('#a1').val(computer);
            }else if(a2==""){
                $('#a2').val(computer);
            }else if(a4==""){
                $('#a4').val(computer);
            }
        }
    </script>
</body>
</html>

