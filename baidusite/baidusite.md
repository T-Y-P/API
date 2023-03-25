## 查询当前域名百度收录数量api
### 使用方法

```
<span id="shoulu">
<script type="text/javascript">
$(function () {
 $.getJSON('https://www.0735.pro/api/baidusite.php?site='+window.location.host, function(data) { 
$('#shoulu').append('该网站共有: '+data.data+'</font>条');
          });
   });
</script>
</span>
```
- getJSON中的域名替换替换自己搭建的，当前也可以用我的 这里只是提供一个参考 效果图如下

[![查询当前域名百度收录数量api](https://s1.ax1x.com/2023/03/24/ppBZ83Q.png)](https://imgse.com/i/ppBZ83Q)

### 小插曲

> 腾云先锋（TDP，Tencent Cloud Developer Pioneer）是腾讯云 GTS 官方组建并运营的技术开发者群体。这里有最专业的开发者&客户，能与产品人员亲密接触，专有的问题&需求反馈渠道，有一群志同道合的兄弟 姐妹，[来加入属于我们开发者的社群吧 ](https://cloud.tencent.com/developer/article/1855195?from=10680)

#### ps 进群时候时候记得跟管理员说tdp会员 网友-cvm推荐