<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reply</title>
</head>
<body>
    <?php
        $name=$_GET["name"];
        switch($_GET["sex"]){
            case "male":
                $sex="男";
                break;
            
            case "female":
                $sex="女";
                break;
        }
        $edu=$_GET["edu"];      
        $activity=$_GET["activity"];        //数组形式(需要复选的返回的是数组)
        $think=$_GET["think"];
    ?>

    <h4> <i><?php echo $name;?></i> ，你好！感谢你填写个人资料表，你输入的信息如下：</h4>
    <p>性别：<?php echo $sex?></p>
    <p>最高学历：
        <?php
            if ($edu=="gaozhong"){
                echo "高中学历或以下";
            }
            if ($edu=="dazhuan"){
                echo "大专";
            }
            if ($edu=="shuoshi"){
                echo "硕士";
            }
            if ($edu=="boshi"){
                echo "博士";
            }
        ?>
    </p>
    <p>喜欢的活动：
        <?php
            foreach ($activity as $v){
                if ($v=="read"){
                    echo "阅读"," ";
                    continue;
                }
                if ($v=="sport"){
                    echo "运动"," ";
                    continue;
                }
                if ($v=="movie"){
                    echo "看电影"," ";
                    continue;
                }
                if ($v=="travel"){
                    echo "旅行"," ";
                    continue;
                }
            }
        ?>
    </p>
    <p>对于国片风潮的看法：<?php echo $think;?></p>
</body>
</html>