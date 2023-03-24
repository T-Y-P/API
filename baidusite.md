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