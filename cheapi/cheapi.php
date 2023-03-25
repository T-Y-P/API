<?php
header("Access-Control-Allow-Origin:*");
header("content-type:application/json; charset=utf-8");
$msg=$_REQUEST['msg'];//车牌关键字
if(!$msg){
    $json['code']=-2;
    $json['msg']="参数为空!";
    echo ret_json($json);die;
}
$data="西藏,拉萨,藏A|西藏,昌都,藏B|西藏,山南,藏C|西藏,日喀则,藏D|西藏,那曲,藏E|西藏,阿里,藏F|西藏,林芝,藏G|四川,成都,川A|四川,绵阳,川B|四川,自贡,川C|四川,攀枝花,川D|四川,泸州,川E|四川,德阳,川F|四川,广元,川H|四川,遂宁,川J|四川,内江,川K|四川,乐山,川L|四川,资阳,川M|四川,宜宾,川Q|四川,南充,川R|四川,达州,川S|四川,雅安,川T|四川,阿坝,川U|四川,甘孜,川V|四川,凉山,川W|四川,广安,川X|四川,巴中,川Y|四川,眉山,川Z|湖北,武汉,鄂A|湖北,黄石,鄂B|湖北,十堰,鄂C|湖北,荆州,鄂D|湖北,宜昌,鄂E|湖北,襄阳,鄂F|湖北,鄂州,鄂G|湖北,荆门,鄂H|湖北,黄冈,鄂J|湖北,孝感,鄂K|湖北,咸宁,鄂L|湖北,仙桃,鄂M|湖北,潜江,鄂N|湖北,神农架林区,鄂P|湖北,恩施,鄂Q|湖北,天门,鄂R|湖北,随州,鄂S|甘肃,兰州,甘A|甘肃,嘉峪关,甘B|甘肃,金昌,甘C|甘肃,白银,甘D|甘肃,天水,甘E|甘肃,酒泉,甘F|甘肃,张掖,甘G|甘肃,武威,甘H|甘肃,定西,甘J|甘肃,陇南,甘K|甘肃,平凉,甘L|甘肃,庆阳,甘M|甘肃,临夏,甘N|甘肃,甘南州,甘P|江西,南昌,赣A,M|江西,赣州,赣B|江西,宜春,赣C|江西,吉安,赣D|江西,上饶,赣E|江西,抚州,赣F|江西,九江,赣G|江西,景德镇,赣H|江西,萍乡,赣J|江西,新余,赣K|江西,鹰潭,赣L|贵州,贵阳,贵A|贵州,六盘水,贵B|贵州,遵义,贵C|贵州,铜仁,贵D|贵州,黔西南,贵E|贵州,毕节,贵F|贵州,安顺,贵G|贵州,黔东南,贵H|贵州,黔南,贵J|广西,南宁,桂A|广西,柳州,桂B|广西,梧州,桂D|广西,北海,桂E|广西,崇左,桂F|广西,来宾,桂G|广西,桂林,桂H|广西,贺州,桂J|广西,玉林,桂K|广西,百色,桂L|广西,河池,桂M|广西,钦州,桂N|广西,防城港,桂P|广西,贵港,桂R|黑龙江,哈尔滨,黑A|黑龙江,齐齐哈尔,黑B|黑龙江,牡丹江,黑C|黑龙江,佳木斯,黑D|黑龙江,大庆,黑E|黑龙江,伊春,黑F|黑龙江,鸡西,黑G|黑龙江,鹤岗,黑H|黑龙江,双鸭山,黑J|黑龙江,七台河,黑K|黑龙江,绥化,黑M|黑龙江,黑河,黑N|黑龙江,大兴安岭,黑P|吉林,长春,吉A|吉林,吉林市,吉B|吉林,四平,吉C|吉林,辽源,吉D|吉林,通化,吉E|吉林,白山,吉F|吉林,白城,吉G|吉林,延边,吉H|吉林,松原,吉J|河北,石家庄,冀A|河北,唐山,冀B|河北,秦皇岛,冀C|河北,邯郸,冀D|河北,邢台,冀E|河北,保定,冀F|河北,张家口,冀G|河北,承德,冀H|河北,沧州,冀J|河北,廊坊,冀R|河北,衡水,冀T|山西,太原,晋A|山西,大同,晋B|山西,阳泉,晋C|山西,长治,晋D|山西,晋城,晋E|山西,朔州,晋F|山西,忻州,晋H|山西,吕梁,晋J|山西,晋中,晋K|山西,临汾,晋L|山西,运城,晋M|辽宁,沈阳,辽A|辽宁,大连,辽B|辽宁,鞍山,辽C|辽宁,抚顺,辽D|辽宁,本溪,辽E|辽宁,丹东,辽F|辽宁,锦州,辽G|辽宁,营口,辽H|辽宁,阜新,辽J|辽宁,辽阳,辽K|辽宁,盘锦,辽L|辽宁,铁岭,辽M|辽宁,朝阳,辽N|辽宁,葫芦岛,辽P|山东,济南,鲁A|山东,青岛,鲁B,U|山东,淄博,鲁C|山东,枣庄,鲁D|山东,东营,鲁E|山东,烟台,鲁F,Y|山东,潍坊,鲁G,V|山东,济宁,鲁H|山东,泰安,鲁J|山东,威海,鲁K|山东,日照,鲁L|山东,滨州,鲁M|山东,德州,鲁N|山东,聊城,鲁P|山东,临沂,鲁Q|山东,菏泽,鲁R|山东,莱芜,鲁S|内蒙古,呼和浩特,蒙A|内蒙古,包头,蒙B|内蒙古,乌海,蒙C|内蒙古,赤峰,蒙D|内蒙古,呼伦贝尔,蒙E|内蒙古,兴安盟,蒙F|内蒙古,通辽,蒙G|内蒙古,锡林郭勒,蒙H|内蒙古,乌兰察布,蒙J|内蒙古,鄂尔多斯,蒙K|内蒙古,巴彦淖尔,蒙L|内蒙古,阿拉善盟,蒙M|福建,福州,闽A|福建,莆田,闽B|福建,泉州,闽C|福建,厦门,闽D|福建,漳州,闽E|福建,龙岩,闽F|福建,三明,闽G|福建,南平,闽H|福建,宁德,闽J|宁夏,银川,宁A|宁夏,石嘴山,宁B|宁夏,吴忠,宁C|宁夏,固原,宁D|宁夏,中卫,宁E|青海,西宁,青A|青海,海东,青B|青海,海北,青C|青海,黄南,青D|青海,海南州,青E|青海,果洛,青F|青海,玉树,青G|青海,海西,青H|海南,海口,琼A|海南,三亚,琼B|海南,儋州,琼C|海南,定安县,琼C|海南,临高县,琼C|海南,琼海,琼C|海南,屯昌县,琼C|海南,万宁,琼C|海南,文昌,琼C|海南,东方,琼D|海南,陵水县,琼D|海南,乐东县,琼D|海南,白沙县,琼D|海南,保亭县,琼D|海南,澄迈县,琼D|海南,五指山,琼D|海南,昌江县,琼D|海南,琼中,琼D|陕西,西安,陕A|陕西,铜川,陕B|陕西,宝鸡,陕C|陕西,咸阳,陕D|陕西,渭南,陕E|陕西,汉中,陕F|陕西,安康,陕G|陕西,商洛,陕H|陕西,延安,陕J|陕西,榆林,陕K|江苏,南京,苏A|江苏,无锡,苏B|江苏,徐州,苏C|江苏,常州,苏D|江苏,苏州,苏E|江苏,南通,苏F|江苏,连云港,苏G|江苏,淮安,苏H|江苏,盐城,苏J|江苏,扬州,苏K|江苏,镇江,苏L|江苏,泰州,苏M|江苏,宿迁,苏N|安徽,合肥,皖A|安徽,芜湖,皖B|安徽,蚌埠,皖C|安徽,淮南,皖D|安徽,马鞍山,皖E|安徽,淮北,皖F|安徽,铜陵,皖G|安徽,安庆,皖H|安徽,黄山,皖J|安徽,阜阳,皖K|安徽,宿州,皖L|安徽,滁州,皖M|安徽,六安,皖N|安徽,宣城,皖P|安徽,池州,皖R|安徽,亳州,皖S|湖南,长沙,湘A|湖南,株洲,湘B|湖南,湘潭,湘C|湖南,衡阳,湘D|湖南,邵阳,湘E|湖南,岳阳,湘F|湖南,张家界,湘G|湖南,益阳,湘H|湖南,常德,湘J|湖南,娄底,湘K|湖南,郴州,湘L|湖南,永州,湘M|湖南,怀化,湘N|湖南,湘西,湘U|新疆,乌鲁木齐,新A|新疆,五家渠,新B|新疆,昌吉,新B|新疆,石河子,新C|新疆,博尔塔拉,新E|新疆,伊犁,新F|新疆,北屯,新H|新疆,克拉玛依,新J|新疆,吐鲁番,新K|新疆,哈密,新L|新疆,巴音郭楞,新M|新疆,阿拉尔,新N|新疆,阿克苏,新N|新疆,克孜勒苏,新P|新疆,喀什,新Q|新疆,图木舒克,新Q|新疆,和田,新R|河南,郑州,豫A|河南,开封,豫B|河南,洛阳,豫C|河南,平顶山,豫D|河南,安阳,豫E|河南,鹤壁,豫F|河南,新乡,豫G|河南,焦作,豫H|河南,濮阳,豫J|河南,许昌,豫K|河南,漯河,豫L|河南,三门峡,豫M|河南,商丘,豫N|河南,周口,豫P|河南,驻马店,豫Q|河南,南阳,豫R|河南,信阳,豫S|河南,济源,豫U|广东,广州,粤A|广东,深圳,粤B|广东,珠海,粤C|广东,汕头,粤D|广东,佛山,粤E|广东,韶关,粤F|广东,湛江,粤G|广东,肇庆,粤H|广东,江门,粤J|广东,茂名,粤K|广东,惠州,粤L|广东,梅州,粤M|广东,汕尾,粤N|广东,河源,粤P|广东,阳江,粤Q|广东,清远,粤R|广东,东莞,粤S|广东,中山,粤T|广东,潮州,粤U|广东,揭阳,粤V|广东,云浮,粤W|云南,昆明,云A|云南,昭通,云C|云南,曲靖,云D|云南,楚雄,云E|云南,玉溪,云F|云南,红河,云G|云南,文山,云H|云南,普洱,云J|云南,西双版纳,云K|云南,大理,云L|云南,保山,云M|云南,德宏,云N|云南,丽江,云P|云南,怒江,云Q|云南,迪庆,云R|云南,临沧,云S|浙江,杭州,浙A|浙江,宁波,浙B|浙江,温州,浙C|浙江,绍兴,浙D|浙江,湖州,浙E|浙江,嘉兴,浙F|浙江,金华,浙G|浙江,衢州,浙H|浙江,台州,浙J|浙江,丽水,浙K|浙江,舟山,浙L";



$json1=explode("|",$data);
for($i=0;$i<356;$i++){
    $b=explode(",",$json1[$i]);
    if($b[2]==$msg){
        $json['code']=1;
        $json['msg']="获取成功!";
        $json['data']['province']=$b[0];
        $json['data']['city']=$b[1];
        $json['data']['abbreviation']=$b[2];
        echo ret_json($json);
        die;
    }
}

$json['code']=-1;
$json['msg']="请联系站长进行收录!";
echo ret_json($json);

function ret_json($json){
    return stripslashes(json_encode($json,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}