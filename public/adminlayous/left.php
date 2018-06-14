<?php

$nav_data = json_decode(file_get_contents('cache/nav.cache'),true);

?>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <?php foreach($nav_data as $key=>$v){ ?>

  <h2><span class="icon-user"></span><?php echo $v['nev_name']; ?></h2>
  <ul style="display:none">
  <?php foreach($v['son'] as $m=>$n){ ?>
    <li><a href="<?= $n['nev_path']; ?>" target="right"><span class="icon-caret-right"></span><?= $n['nev_name']; ?></a></li>
  <?php } ?>
 </ul>
   <?php } ?>
<!--     <li><a href="book" target="right"><span class="icon-caret-right"></span>留言管理</a></li>
    <li><a href="column" target="right"><span class="icon-caret-right"></span>栏目管理</a></li> -->
  
<!--   <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
    <li><a href="/article_list" target="right"><span class="icon-caret-right"></span>文章管理</a></li>
    <li><a href="/adv" target="right"><span class="icon-caret-right"></span>首页轮播</a></li>
    <li><a href="/list" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
    <li><a href="/add" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
    <li><a href="/cate" target="right"><span class="icon-caret-right"></span>分类管理</a></li> 
  </ul>  
  <h2><span class="icon-user"></span>用户管理</h2>
  <ul>
    <li><a href="/user" target="right"><span class="icon-caret-right"></span>用户管理</a></li>
    <li><a href="/pledge_list" target="right"><span class="icon-caret-right"></span>用户抵押物管理</a></li>
    <li><a href="/add" target="right"><span class="icon-caret-right"></span>用户借款管理</a></li>
    <li><a href="/cate" target="right"><span class="icon-caret-right"></span>用户收益统计</a></li>
  </ul>
  <h2><span class="icon-user"></span>管理员权限</h2>
  <ul>
    <li><a href="node_add" target="right"><span class="icon-caret-right"></span>权限添加</a></li>
    <li><a href="role_add" target="right"><span class="icon-caret-right"></span>角色添加</a></li>
    <li><a href="/cate" target="right"><span class="icon-caret-right"></span>用户收益统计</a></li> 
  </ul> -->
</div>