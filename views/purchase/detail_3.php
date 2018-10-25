<h1>Star Half</h1>

<p>Changes the name of the half star.<br>

<div id="starHalf"></div>
<div class="highlight"><pre><span class="nx">$</span><span class="p">(</span><span class="s1">'div'</span><span class="p">).</span><span class="nx">raty</span><span class="p">({</span>
  <span class="nx">half</span>     <span class="o">:</span> <span class="kc">true</span><span class="p">,</span>
  <span class="nx">starHalf</span> <span class="o">:</span> <span class="s1">'fa fa-fw fa-star-half'</span>
<span class="p">});</span>
    </pre></div>
<h1>Click</h1>



<SCRIPT>
    $(function () {
         

    $('#starHalf').raty({
        score:3.8,
        halfShow : true,
        readOnly: true
    });
    });

</SCRIPT>
<script src="<?= URLJS ?>jquery.raty-fa.js"></script>
