<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 21/08/2020
 * Time: 1:46 PM
 */

?>

<nav id="menu-admin">
   <div class="container">
       <ul>
           <li>
               <a href="" >
                   <img src="<?php echo Helpers::getPathPublic('admin') ?>images/logo.png" alt="">
               </a>
           </li>
           <li>
               <a href="<?php echo Helpers::getUrlPage()?>admin/product" class="<?php echo isset($active) && $active == 'product' ? 'active' : '' ?>">

                   Sản phẩm
               </a>
           </li>
           <li>
               <a href="<?php echo Helpers::getUrlPage()?>admin/post" class="<?php echo isset($active) && $active == 'post' ? 'active' : '' ?>">

                   Tin tức
               </a>
           </li>

           </li>
           <li>
               <a href="<?php echo Helpers::getUrlPage()?>admin/category" class="<?php echo isset($active) && $active == 'list' ? 'active' : '' ?>">

                   Category
               </a>
           </li>
           <li>
               <a href="<?php echo Helpers::getUrlPage()?>admin/order" class="<?php echo isset($active) && $active == 'list' ? 'active' : '' ?>">

                   Danh sách đơn
               </a>
           </li>
           <li>
               <a href="<?php echo Helpers::getUrlPage()?>admin/loginadmin/logout">

                   Đăng xuất
               </a>
           </li>
       </ul>
   </div>
</nav>
