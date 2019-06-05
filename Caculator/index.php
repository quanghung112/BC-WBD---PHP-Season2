<html>
<meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
<head>
    <title>Calculator</title>
    <style type="text/css">
        .login {
            height: 250px;
            width: 500px;
            margin: 0;
            padding: 10px;
            border: 3px red solid;
        }
        .login input {
            padding: 5px;
            margin: 5px;
        }
        span{
            width: 200px;
            display: inline-block;
        }
        select{
            width: 150px;
            height: 30px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<form method="post" >
    <fieldset class="login" >
        <legend>Caculator</legend>
        <span>First operand:</span>
        <input type="number" name="Firstoperand" size="25" placeholder="0"><br/>
        <span>Operrator:</span>
        <select name="Operrator">
            <option value="+">Addition</option>
            <option value="-">Subtraction</option>
            <option value="*">Multiplication</option>
            <option value="/">Division</option>
        </select>
        <br/>
        <span>Second operand:</span>
        <input type="number" name="DiscountPercent" size="25" placeholder="0"><br/>
        <input type="submit" id="submit" value="Caculate"><br>
        <?php
        class Caculator{
            public function caculate($firstnum,$operrator,$secondnum){
                if ($secondnum==0){
                    return 'Exception';
                }else {
                    $result=$firstnum.$operrator.$secondnum;
                    return eval('return '.$result.';');
                }
            }
            public function check($operrator,$secondnum){
                if ($operrator=='/'&&$secondnum==0){
                    throw new Exception("Error number two =0");
                }
            }
        }
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $firstnum=$_POST['Firstoperand'];
            $operrator=$_POST['Operrator'];
            $secondnum=$_POST['DiscountPercent'];
            $caculator = new Caculator();
            try{
                $caculator->check($operrator,$secondnum);
                $result = $caculator->caculate($firstnum,$operrator,$secondnum);
                echo $result;
            }catch (Exception $messenger){
                echo $messenger->getMessage();
            }
        }
        ?>
    </fieldset>
</form>
</body>
</html>
