<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P4_Post</title>
</head>
<body>
    <?php
        $string=$_POST["string"];

        function countType(){
            global $string;
            $countNum=0;
            $countUpper=0;
            $countLower=0;
            for ($i=0;$i<strlen($string);$i++){
                if (ord($string[$i])>=48 && ord($string[$i])<=57){              //查询每个字符的ASCII码值，48-57是数字
                    $countNum+=1;
                }
                elseif (ord($string[$i])>=65 && ord($string[$i])<=90){          //65-90是大写字母
                    $countUpper+=1;
                }
                elseif (ord($string[$i])>=97 && ord($string[$i])<=122){         //97-122是小写字母
                    $countLower+=1;
                }
                else continue;                                                  //如是其他字符就跳过
            }
            return array("num"=>$countNum,"upper"=>$countUpper,"lower"=>$countLower);       //返回一个数组（函数想返回多个值可以考虑返回数组）
        }

        $countArr=countType();
        echo "输入的字符串：",$string,"<br>";
        echo "<hr>";
        echo "数字个数：",$countArr["num"],"<br>";
        echo "大写字母个数：",$countArr["upper"],"<br>";
        echo "小写字母个数：",$countArr["lower"],"<br>";
    ?>
</body>
</html>