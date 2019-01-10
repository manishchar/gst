<style type="text/css"> 
<?php
$color=array('#eda612','#00ffff','#00ff00','#8080ff','#ea20ea','#000000','#0000ff','#ff0000','#c5c58b','#ff0080');
for ($i=1; $i<=10;$i++) { ?>
.topTab ul.topUL li.topBarCount<?php echo $i; ?> a:after{
      border-left: 23px solid <?php echo $color[$i-1]; ?> !important;
    }
  .accordComman .tableTopComman<?php echo $i; ?>{
    background-color: <?php echo $color[$i-1]; ?> !important;  
  }
<?php } ?>


</style>
<div class="topTab" style="margin-top: 50px;">
<ul class="topUL">


    <li class="topBarCount topBarCount1 " stage="1">
      <a class="" id="Acord_1" style="background-color: #eda612 " onclick="getDaTaRecords(this.id)">
          <span id="countStage1">46</span>
          New arrival      </a>
    </li>

  
    <li class="topBarCount topBarCount2 " stage="2">
      <a class="" id="Acord_2" style="background-color: #00ffff " onclick="getDaTaRecords(this.id)">
          <span id="countStage2">12</span>
          Working      </a>
    </li>

  
    <li class="topBarCount topBarCount3 " stage="3">
      <a class="" id="Acord_3" style="background-color: #00ff00 " onclick="getDaTaRecords(this.id)">
          <span id="countStage3">11</span>
          App awaiting      </a>
    </li>

  
    <li class="topBarCount topBarCount4 " stage="4">
      <a class="" id="Acord_4" style="background-color: #8080ff " onclick="getDaTaRecords(this.id)">
          <span id="countStage4">4</span>
          Stips received      </a>
    </li>

  
    <li class="topBarCount topBarCount5 " stage="5">
      <a class="" id="Acord_5" style="background-color: #ea20ea " onclick="getDaTaRecords(this.id)">
          <span id="countStage5">9</span>
          Verified complete      </a>
    </li>

  
    <li class="topBarCount topBarCount6 " stage="6">
      <a class="" id="Acord_6" style="background-color: #000000 " onclick="getDaTaRecords(this.id)">
          <span id="countStage6">5</span>
          Sold      </a>
    </li>

  
    <li class="topBarCount topBarCount7 " stage="7">
      <a class="" id="Acord_7" style="background-color: #0000ff " onclick="getDaTaRecords(this.id)">
          <span id="countStage7">172</span>
          Funded      </a>
    </li>

  
    <li class="topBarCount topBarCount8 " stage="8">
      <a class="" id="Acord_8" style="background-color: #ff0000 " onclick="getDaTaRecords(this.id)">
          <span id="countStage8">272</span>
          Lost      </a>
    </li>

  
    <li class="topBarCount topBarCount9 " stage="9">
      <a class="" id="Acord_9" style="background-color: #c5c58b " onclick="getDaTaRecords(this.id)">
          <span id="countStage9">2693</span>
          Credit solution      </a>
    </li>

  
    <li class="topBarCount topBarCount10 " stage="10">
      <a class="" id="Acord_10" style="background-color: #ff0080 " onclick="getDaTaRecords(this.id)">
          <span id="countStage10">15</span>
          Approved LIMBO      </a>
    </li>

  
        </ul>
      </div>

