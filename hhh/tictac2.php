<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tic Tac</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body>
<!--    <div>-->
<!--        <div>-->
<!--        </div><div>-->
<!--        </div><div>-->
<!--        </div>-->
<!--        -->
<!--    </div>-->
    <div class="game">
        <p class="gameDiv">Game Over</p>
    </div>
    <div style="margin-left: 372px;">
        <input type = "button" id = "x" style="border:3px solid #02a6f2;" value="X" onClick = "gamer('x')" >
        <input type = "button" id = "0" style="margin-left: 8px;border:3px solid #02a6f2;" value="0" onClick = "gamer('0')" >
    </div>
    <p class="inp">
        <input type = "button" id = "a1" value="" onClick = "clikButt(1)" >
        <input type = "button" id = "a2" value="" onClick = "clikButt(2)" >
        <input type = "button" id = "a3" value="" onClick = "clikButt(3)" >
   <br>
        <input type = "button" id="a4" value="" onClick = "clikButt(4)" >
        <input type = "button" id="a5" value="" onClick = "clikButt(5)" >
        <input type = "button" id="a6" value="" onClick = "clikButt(6)" >
   <br>

        <input type = "button" id = "a7" value="" onClick = "clikButt(7)" >
        <input type = "button" id = "a8" value="" onClick = "clikButt(8)" >
        <input type = "button" id = "a9" value="" onClick = "clikButt(9)" >

    </p>
    <h1 id="win1" style="margin-top:-131px ;margin-left: 591px">Games</h1>
    <input type = "button" id = "ress" value="New Game" style="width:118px;height:50px;margin-left: 590px" onClick = "newGame()" >


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
        .game {
            border: 2px solid #02a6f2;
            background-color: #b80a06;
            left: 557px;
            width: 207px;
            height: 208px;
            display: none;
            position: absolute;
        }
        .gameDiv{
            color: aquamarine;
            font-size: 42px;
            margin-left: 5px;
            margin-top: 77px;
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


        function clikButt(a){

            if($("#a" + a).val()==""){
                $("#a" + a).val(humen);
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

            if(a1!="" && a2!="" && a3!="" && a4!="" && a5!="" && a6!="" && a7!="" && a8!="" && a9!=""){
                    $('#win1').html('Drew').css({"color":"Red"});
                      $('.game').fadeTo("slow", 0.2);
                }
            }

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
        function gamer(z){

            if(z =='x'){
                $('#0').hide();
                $('#x').hide(2000);
                $('.youPlay').animate();
               humen = 'X';
               computer = '0';
            }else if(z=='0'){
                $('#x').hide();
                $('#0').hide(2000);
                humen = '0';
                computer = 'X';
                getVal();
                logik();
            }
        }

        function newGame(){
                $('#win1').html('Games').css("color","black");
            resetVal();
            humen = '';
            computer = '';

            $('#0').show();
            $('#x').show();
            $('.game').hide();

        }

        function chek(a,b,c){
            if(a==b && b==c && a!="")
            {
                if (a==humen){
                    $('#win1').html('you win').css({"color":"Red"});


                }else if(a==computer){
                    $('#win1').html('you lose').css({"color":"Red"});
                }
                $('.game').fadeTo("slow", 0.2);





            }
        }
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
            else if(a2==""&&((a3=="X"&&a4=="X"&&a9=="X"&&a1=="X"))){
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

            }else if(a1==""&&((a2=="X"&&a3=="X")||(a4=="X"&&a7=="X")||(a5=="X"&&a9=="X"))){
                $('#a1').val(computer);

            }else if(a4==""&&((a5=="X"&&a6=="X")||(a1=="X"&&a7=="X"))){
                $('#a4').val(computer);

            }else if(a5==""&&((a1=="X"&&a9=="X")||(a2=="X"&&a8=="X")||(a3=="X"&&a7=="X")||(a4=="X"&&a6=="X"))){
                $('#a5').val(humen);
            }
            else if(a1==""&&(a6=="X"&&a8=="X"&&a7=="X")||(a6=="X"&&a8=="X"&&a3=="X")||(a6=="X"&&a8=="X"&&a2=="X")||(a6=="X"&&a8=="X"&&a4=="X")){
                $('#a1').val(computer);

            }else if(a6==""&&((a5=="X"&&a4=="X")||(a3=="X"&&a9=="X"))){
                $('#a6').val(computer);

            }else if(a7==""&&((a1=="X"&&a4=="X")||(a8=="X"&&a9=="X")||(a5=="X"&&a3=="X"))){
                $('#a7').val(computer);

            }else if(a8==""&&((a1=="X"&&a3=="X"&&a4=="X")||(a2=="X"&&a5=="X")||(a7=="X"&&a9=="X"))){
                $('#a8').val(computer);

            }else if(a9==""&&((a3=="X"&&a6=="X")||(a1=="X"&&a5=="X")||(a7=="X"&&a8=="X"))) {
                $('#a9').val(computer);
            }
            else if(a1==""&&((a5=="0"&&a6=="X"&&a8=="X"))){
                $('#a9').val(computer);
//                rezerv qayl
            }else if(a7=="X"&&((a8==""&&a6==""))){
                $('#a8').val(computer);
            }
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



<!---->
<!--else if(a1==""){-->
<!--$('#a1').val(computer);-->
<!--}-->
