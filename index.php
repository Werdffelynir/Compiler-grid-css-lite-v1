<?php
include_once './core/calc_v0.3.php';

if (isset($_POST['val_w']) AND isset($_POST['val_m']) AND isset($_POST['val_c']) AND
    !empty($_POST['val_w']) AND !empty($_POST['val_m']) AND !empty($_POST['val_c']))
{

    $w = (int)$_POST['val_w'];
    $m = (int)$_POST['val_m'];
    $c = (int)$_POST['val_c'];
    $css = $_POST['val_my_css'];
    $test = new Calcgrid($w, $m, $c, $css);
    //echo nl2br($test->css());
    //echo $test->css();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Title</title>
  
  <script type="text/javascript" src=""></script>
  <link rel="stylesheet" href="lite.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  
</head>
<body>

<div class="page">

    <div class="full">
      <div class="header">Compiler grid LITE fw v 1.3 (css framework)</div>
    </div>
    <div class="full">
      <div class="compil">
        <div class="hed"><h2>Lite Calculation</h2></div>
        <div class="form_calc">
          <form method="POST">
            <input id="id" name="val_w" type="text" value="960" autocomplete="off" /> Ширина страницы <br />
            <input id="id" name="val_m" type="text" value="10" autocomplete="off"  /> Отступы между блоками <br />
            <input id="id" name="val_c" type="text" value="12" autocomplete="off"  /> Количество колонок <br />
            Дополнительные css свойства.<br />
            <textarea name="val_my_css"></textarea> <br />
            <input id="id" name="enter" type="submit" value="Скомпилировать">
          </form>
        </div>
      </div>
    </div>
    
    <div class="full">
      <div class="info">
        <div class="hed"><h2>Lite Documentation</h2></div>
        
        <div class="">
        <p><b>Использование компилятора:</b></p>
            <p>С левой стороны настроить по необходимости поля ширины, отступа и количества колонок в сетке. Добавить если нужно дополнительные свойства. Скомпилировать. Также дополнительные свойства по умолчанию прописаны в файле calc_add.css.</p><br />
        
        <p><b>Использование фреймворка:</b></p>
            <p>Строение блоков - сетка. Логика похожа на Bootstrap. Блок оболочка должен иметь класс full/lite (width:100%) clear (очистка). Сума блоков внутри (lite_2, lite_8, lite_2) должна соответствовать колонкам в сетке (12). Первый внутренний блок должен иметь класс first (margin-left: 0;).</p><br />
            <p><b>Пример кода:</b></p>
            <div class="code">
              <code>
                  &lt;div class="full clear"&gt;<br />
                  &nbsp;&nbsp;&nbsp; &lt;div class="first lite_3"&gt;...content...&lt;/div&gt;<br />
                  &nbsp;&nbsp;&nbsp; &lt;div class="lite_6"&gt;...content...&lt;/div&gt;<br />
                  &nbsp;&nbsp;&nbsp; &lt;div class="lite_3"&gt;...content...&lt;/div&gt;<br />
                  &lt;/div&gt;
              </code>
            </div>
        </div>
        
      </div>
    </div>
    
    <div class="full">
      <div class="log">
        <div class="hed"><h2>Lite Compilation</h2></div>
        
        
<?php 
    if(isset($_POST['val_w'])){
    echo "<div class='tablo full clear'>";
    
        echo "<div class='code'>";
            
                $css = $test->css();
                echo (isset($css)) ? $css : '';
            
        echo "</div>";
    
    echo "</div>";
    
    }
?>


<?php
if(isset($_POST['val_w']))
{
    echo "<div class='footer full clear'>";
    echo "<h2>Резутьтат компиляции</h2>";

$numcol = $test->defcolum;

echo "<div class='full clear'>";
    for($ir = 1; $ir <= $numcol; $ir++)
    {
        echo "<div class='colordiv first lite_".$ir."'>"."блок_".$ir."</div> <br /><br />\n";
    }
echo "</div><h3 class='litelink'>Скомпилированый файл \"<a href='compilation/framework_lite.css'>framework_lite.css</a>\"</h3>";

}

    echo "</div>";
?>
        
        
      </div>
    </div>
    
    <div class="full">
      <div class="footer">
        <p class="copy">Copyright © 2013 Werdfolio. All rights reserved.</p>
      </div>
    </div>
    
</div>
</body>
</html>