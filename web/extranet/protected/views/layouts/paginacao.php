<div class="pagination pagination-centered ">
  <div class="pull-left">
    <?
    if ( $pagination->itemCount > 0 ) {
      ?>
    <div class="muted">&nbsp;
      <?
      if ( $pagination->itemCount == 1 ) {
        ?>
      <?=$pagination->itemCount?>
      registro encontrado
      <?
      } else {
        ?>
      <?=$pagination->itemCount?>
      registros encontrados
      <?
      }
      ?>
    </div>
    <?
    }
    ?>
  </div>
  <?
  $this->widget( 'CLinkPager', array(
    'pages' => $pagination,
    'hiddenPageCssClass' => 'active',
    'firstPageLabel' => '&laquo;',
    'prevPageLabel' => '&lsaquo;',
    'nextPageLabel' => '&rsaquo;',
    'lastPageLabel' => '&raquo;',
    'selectedPageCssClass' => 'active',
    'header' => '',
    'htmlOptions' => array( 'class' => '' ),
  ) );
  ?>
  <div class="pull-right" style="margin-right:10px;">
    <div class="input-prepend input-append"> <span class="add-on">Registros por p&aacute;gina:</span>
      <select name="menu_paginacao" onChange="location.href=this.options[this.selectedIndex].value" style="width:32%;">
        <?
        $array_num_paginas = array( 5, 10, 25, 50, 100 );
        foreach ( $array_num_paginas as $num_paginas ) {
          ?>
        <option value="<?=$this->createUrlRel("index", array_merge($_GET,array('pageSize'=> $num_paginas)));?>" <? if (Yii::app()->user->pageSize == $num_paginas) echo ' selected="selected"'; ?>>
        <?=$num_paginas;?>
        </option>
        <?
        }
        ?>
      </select>
    </div>
  </div>
</div>
