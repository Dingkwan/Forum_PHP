<?php
    $result=$_GET["vote"];
    
    $arr_vote=array("banana"=>0,"apple"=>0,"orange"=>0,"pear"=>0);      //存储投票数的数组

    if ($result=="banana"){
        $arr_vote["banana"]+=1;
    }
    if ($result=="apple"){
        $arr_vote["apple"]+=1;
    }
    if ($result=="orange"){
        $arr_vote["orange"]+=1;
    }
    if ($result=="pear"){
        $arr_vote["pear"]+=1;
    }

    if (!file_exists("vote.txt")){          //文件不存在时存入文件
        $file=fopen("vote.txt","w+");

        foreach($arr_vote as $key=>$value){
            fputs($file,"$key:$value");
            fputs($file,PHP_EOL);
        }
        fclose($file);
    }
    else{
        $file=fopen("vote.txt","r");        //文件存在时将文件内数据读取到一个暂存数组中
        $i=0;
        $target=0;
        while (!feof($file)){
            $file_arr[$i]=fgets($file);
            $file_arr[$i]=str_replace(PHP_EOL,'',$file_arr[$i]);        //剔除换行符、冒号和无关文字等，只留下数值
            $file_arr[$i]=str_replace(':','',$file_arr[$i]);
            $file_arr[$i]=str_replace('banana','',$file_arr[$i]);
            $file_arr[$i]=str_replace('apple','',$file_arr[$i]);
            $file_arr[$i]=str_replace('orange','',$file_arr[$i]);
            $file_arr[$i]=str_replace('pear','',$file_arr[$i]);
            $i++;
        }
        fclose($file);
        for ($i=0;$i<count($file_arr);$i++){
            $file_arr[$i]=intval($file_arr[$i]);        //将string类型数组转换为可加减的int类型数组
        }

        $i=0;
        foreach ($arr_vote as $k=>$v){                  //逐项对应相加
            $arr_vote[$k]+=$file_arr[$i];
            $i++;
        }


        $file_read=fopen("vote.txt","w+");              //清空文件并存入投票数组
        foreach($arr_vote as $key=>$value){
            fputs($file_read,"$key:$value");
            fputs($file_read,PHP_EOL);
        }
        fclose($file_read);
    }


    function getPer($type){
        global $arr_vote;
        $per=$arr_vote[$type]/array_sum($arr_vote)*100;         //小数*100得到百分比号前面的数字
        $per=round($per,2);                                     //四舍五入保存两位小数
        return $per."%";                                        //加入百分号
    }

    function disTable(){
        global $arr_vote;
        echo "<table border=\"1\">";
        echo "<tr><td>投票结果为</td><td>所占比例</td><td>票数</td></tr>";
        echo "<tr><td>香蕉</td><td>  <img src=\"bar.gif\" width=",$arr_vote["banana"]*5," height=\"11\"> ",getPer("banana")," </td><td>",$arr_vote["banana"],"</td></tr>";

        echo "<tr><td>苹果</td><td>  <img src=\"bar.gif\" width=",$arr_vote["apple"]*5," height=\"11\"> ",getPer("apple")," </td><td>",$arr_vote["apple"],"</td></tr>";

        echo "<tr><td>橙子</td><td>  <img src=\"bar.gif\" width=",$arr_vote["orange"]*5," height=\"11\"> ",getPer("orange")," </td><td>",$arr_vote["orange"],"</td></tr>";

        echo "<tr><td>梨子</td><td>  <img src=\"bar.gif\" width=",$arr_vote["pear"]*5," height=\"11\"> ",getPer("pear")," </td><td>",$arr_vote["pear"],"</td></tr>";
        echo "</table>";
    }

    echo "<h3>投票结果统计</h3>";
    echo "香蕉：",$arr_vote["banana"],"<br>";
    echo "苹果：",$arr_vote["apple"],"<br>";
    echo "橙子：",$arr_vote["orange"],"<br>";
    echo "梨子：",$arr_vote["pear"],"<br>";
    disTable();
    echo "<button onclick=\"window.location.href='vote.html'\">返回投票界面</button>";
?>