<section id="featured">

  <header class="phrase">
  <div>
      
    <h1>Request the Science Bus!</h1>

  </div>
  </header>
  
  <svg class="intro" viewBox='0 0 800 600'>
    <use class="body" xlink:href="#busje"/>
    <use class="wiel" xlink:href="#wiel"/>
    <use class="wiel" xlink:href="#ook-een-wiel"/>
  </svg>

</section>
<script>
!function featured(document, undefined) {
  
  var delay = 500
  var duration = 2500
  var parentSelector = 'aside'
  var $featured = document.getElementById('featured')

  if ($featured) {

    var $featuredAddClass = addClass($featured)
    setTimeout(function(){ $featuredAddClass('start') }, delay)
    setTimeout(function(){ $featuredAddClass('finish') }, delay + duration)
    
    var $body = document.body
    var initialScrollTop = $body.scrollTop
    var viewHeight = $body.clientHeight

    var $parent = $featured.closest(parentSelector)
    var parentBottom = $parent.clientHeight + 280

    if (initialScrollTop + viewHeight < parentBottom) {
      document.addEventListener('scroll', delegateScroll)
    }
    else $featuredAddClass('done')

  }

  function addClass($element) {
    return function(className) { 
      return $element.classList.add(className) 
    }
  }

  function delegateScroll(event) {
    requestAnimationFrame(scrollHandler)
  }

  function scrollHandler() {
    if ($body.scrollTop + viewHeight >= parentBottom) {
      $featuredAddClass('done')
      document.removeEventListener('scroll', delegateScroll)
    }
  }

}(document)
</script>

<svg hidden width="800px" height="600px" viewBox="0 0 800 600" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Artboard-1" sketch:type="MSArtboardGroup">
            <g id="busje" sketch:type="MSLayerGroup" transform="translate(400.000000, 282.229318) rotate(-1.000000) translate(-400.000000, -282.229318) translate(28.000000, 61.229318)">
                <path d="M26.1929672,11.0724785 C26.7659867,8.90105501 27.346946,7.45288227 27.9082409,7.05117134 C30.5750843,5.14254859 79.7690547,1.24401947 96.1157016,0.542637106 C112.462349,-0.158745257 198.31237,0.264130251 213.059585,0.264130271 C227.8068,0.264130291 311.529372,0.541500337 324.804485,0.541500344 C338.079597,0.54150035 445.162069,2.05036283 463.839644,2.82241449 C482.517219,3.59446614 565.866382,4.99344119 575.913068,4.29395366 C585.959755,3.59446614 595.703519,5.24087698 599.538973,6.61181259 C603.374427,7.9827482 606.388554,9.96639946 608.663198,10.7121153 C610.937843,11.4578311 618.579717,12.5718598 623.499655,17.5497423 C628.419593,22.5276248 630.398677,28.7445794 630.398668,32.6936935 C630.398658,36.6428077 629.999126,43.0558549 626.10682,45.8113655 C622.214515,48.5668761 618.423431,51.0615045 617.62714,53.3748154 C616.830848,55.6881263 616.57168,86.5989719 616.571656,103.715778 C616.571632,120.832585 615.970837,150.616907 618.510963,158.407139 C621.051089,166.197372 624.640386,173.589174 628.393409,177.386525 C632.146433,181.183876 637.369291,186.642605 648.963137,191.236267 C660.556984,195.82993 671.304524,197.162786 675.576454,198.193257 C679.848384,199.223728 680.251387,202.041191 681.496715,203.229681 C682.742042,204.418172 688.020043,206.495021 690.041786,210.128117 C692.063529,213.761214 698.717556,222.80473 698.717531,230.815499 C698.717506,238.826268 696.32519,243.885432 692.282875,248.78658 C688.240559,253.687728 684.468236,254.244184 684.468238,256.02094 C684.46824,257.797695 689.154494,259.363033 695.107173,261.366562 C701.059852,263.370091 710.309699,266.364332 712.915138,267.759709 C715.520577,269.155086 720.602508,281.853311 721.809726,300.512687 C723.016944,319.172063 723.972446,332.419331 723.972417,343.306683 C723.972389,354.194035 723.713231,360.072223 724.938665,362.258221 C726.1641,364.444218 737.347568,369.515305 741.379094,385.318018 C745.410621,401.120732 743.229191,413.51144 739.836508,421.264725 C736.443824,429.01801 732.233858,435.238386 726.01859,438.877725 C719.803321,442.517064 719.292904,440.709054 712.580919,439.793387 C705.868934,438.877721 692.77797,438.76405 677.650478,437.633538 C662.522987,436.503026 661.688057,436.711611 660.2546,433.925419 C658.821144,431.139226 657.791746,416.85922 652.755348,406.521489 C647.71895,396.183757 636.841285,373.413853 620.368995,365.995335 C603.896705,358.576817 594.442889,360.864548 583.733426,363.884928 C573.023964,366.905308 561.228355,376.260852 553.575683,388.747631 C545.923011,401.23441 543.838169,406.245828 540.330694,419.584022 C536.823219,432.922215 537.26654,434.956468 534.150684,434.956462 C531.034828,434.956456 475.081102,433.925404 457.299293,433.925419 C439.517485,433.925435 371.630596,429.98538 355.77729,429.985387 C339.923984,429.985393 268.068088,425.280339 256.309423,425.280339 C244.550758,425.280339 243.040001,425.531006 243.039993,423.39786 C243.039985,421.264714 237.566478,401.420838 226.547273,386.06203 C215.528068,370.703221 209.50834,367.960792 201.408905,363.651892 C193.309471,359.342992 187.654648,357.276927 171.176136,357.97831 C154.697624,358.679692 142.770706,360.160893 130.348167,370.144505 C117.925628,380.128117 108.704212,399.999306 105.461595,406.741446 C102.218978,413.483586 100.895226,424.743228 97.5093761,427.555577 C94.1235265,430.367926 65.8346194,429.020865 56.1476972,429.020856 C46.460775,429.020848 43.8831658,427.794304 38.6324592,424.933058 C33.3817525,422.071812 30.7916392,419.473755 30.1971123,415.07619 C29.6025855,410.678624 28.5726786,395.484648 28.5726786,384.111345 C28.5726786,372.738042 29.5133496,365.17175 31.8965724,363.714982 C34.2797952,362.258214 28.7693385,352.177412 27.8150263,338.712457 C26.8607141,325.247502 24.685519,304.007665 24.6855189,296.128194 C24.6855188,288.248723 21.9743401,235.968436 21.1717857,217.613707 C20.3692314,199.258977 19.6235151,195.862893 19.6235151,170.405661 C19.623515,144.94843 19.7627685,116.748759 19.7627685,100.970497 C19.7627685,86.640798 20.7360151,67.4073577 21.3596459,53.1433238 C21.3596459,53.1433238 21.7248876,50.8551136 20.9193374,50.8551122 C20.1137871,50.8551108 12.2308792,48.0712884 8.35340994,45.6493874 C4.47594065,43.2274863 0.627346217,38.7840001 0.627346451,32.733021 C0.627346684,26.6820418 2.1016184,21.3598329 4.82244208,18.4126019 C7.54326575,15.4653708 11.1582334,12.2517015 17.2974781,11.4674794 C23.4367229,10.6832573 26.1929672,11.0724785 26.1929672,11.0724785 Z" id="Path-1" fill="#000000" sketch:type="MSShapeGroup"></path>
                <path d="M32.03125,10.6206055 C33.1606445,9.84423828 67.6767578,7.09814453 80.3891602,7.09814453 C93.1015625,7.09814453 147.438965,6.06103516 155.988281,6.06103516 C164.537598,6.06103516 226.410645,6.48632812 257.275879,6.48632813 C288.141113,6.48632813 368.20752,6.96923828 380.616211,6.96923828 C393.024902,6.96923828 469.326172,9.48242188 485.665039,9.48242188 C502.003906,9.48242188 539.628418,10.519043 561.796387,11.2573242 C583.964355,11.9956055 590.280762,12.3974609 595.849609,15.2578125 C601.418457,18.1181641 607.492676,22.8461914 609.180664,26.8950195 C610.868652,30.9438477 611.318848,29.277832 611.318848,60.2612305 C611.318848,91.2446289 610.644531,131.550781 611.257812,142.592285 C611.871094,153.633789 613.246582,159.599121 615.525391,165.23877 C617.804199,170.878418 621.609375,179.085449 630.429687,185.805664 C639.25,192.525879 648.375977,196.199707 658.097656,198.620605 C667.819336,201.041504 673.334473,200.926758 675.022461,202.865234 C676.710449,204.803711 676.488281,213.693359 676.488281,233.54834 C676.488281,253.40332 676.894531,253.48291 678.876465,256.246582 C680.858398,259.010254 683.408203,261.6875 692.500488,264.635254 C701.592773,267.583008 706.945801,268.766602 706.131348,269.66748 C705.316895,270.568359 698.010742,269.705566 691.431641,270.308105 C684.852539,270.910645 681.99707,271.094238 681.99707,274.769531 C681.99707,278.444824 681.649902,293.55484 681.649902,308.510254 C681.649902,323.465668 681.719463,366.081555 682.991567,368.847708 C684.263672,371.613861 687.474209,374.733979 693.315229,375.960831 C699.15625,377.187683 708.148368,377.916806 718.119716,377.916808 C717.527039,385.219757 716.204862,402.605206 715.783705,411.679602 C715.362549,420.753998 713.809028,424.806907 711.60376,426.794647 C709.398492,428.782387 708.226615,429.366485 701.46133,429.366485 C694.696045,429.366486 678.386769,429.55631 673.57339,428.895617 C668.76001,428.234924 668.35313,427.537606 667.13439,424.005268 C665.915649,420.472931 661.727966,403.081377 656.461243,392.95852 C651.194519,382.835663 643.71438,374.47736 636.387433,367.413515 C629.060486,360.34967 618.337222,354.192147 611.770723,352.720066 C605.204224,351.247986 603.212028,351.120486 603.212002,348.250078 C603.211975,345.379669 601.534252,305.158298 601.06336,296.396333 C600.592468,287.634369 599.544885,254.185216 598.942444,244.622025 C598.340003,235.058833 597.534284,198.837422 597.534293,193.050143 C597.534302,187.262863 596.646285,132.204694 596.646324,123.655745 C596.646362,115.106796 596.646257,72.1571857 596.646301,63.6941872 C596.646345,55.2311886 596.810072,47.3294866 595.849609,46.5457916 C594.889147,45.7620966 584.117794,44.8794189 559.117798,44.8794212 C534.117801,44.8794236 525.492676,45.4240154 516.405258,47.6655275 C507.317841,49.9070396 504.166353,50.3905334 504.166352,57.4731083 C504.166351,64.5556831 505.108084,75.8862513 505.108089,89.6599607 C505.108093,103.43367 505.216862,141.875816 505.216845,148.676929 C505.216827,155.478043 505.180188,165.34916 504.347205,180.429165 C503.514221,195.509171 502.970849,210.703218 502.970852,228.403543 C502.970856,246.103867 502.599779,254.546501 502.599779,254.546501 C502.599779,254.546501 490.932675,254.132497 475.962538,253.603465 C460.992401,253.074432 443.463113,251.600555 425.992589,251.600547 C408.522064,251.60054 318.626881,250.2821 307.102457,250.28211 C295.578033,250.28212 241.619254,249.845867 229.322414,249.845869 C217.025574,249.845871 116.112156,248.248594 103.340216,248.248587 C90.5682755,248.248581 60.5740652,248.217015 45.5922618,247.676325 C30.6104584,247.135635 30.1887916,246.498772 29.6325606,245.85558 C29.0763295,245.212387 28.2660295,228.675085 27.4450424,215.265788 C26.6240552,201.856491 25.9434615,179.745705 25.9434615,158.678875 C25.9434615,137.612045 26.2121041,111.065502 26.8285732,96.9595776 C27.4450423,82.853653 26.7644487,65.9782357 28.8747261,41.892704 C30.9850035,17.8071723 30.9018555,11.3969727 32.03125,10.6206055 Z" id="Path-2" fill="#FFED00" sketch:type="MSShapeGroup"></path>
                <path d="M502.226713,262.736477 C502.226713,262.736477 501.349666,278.234003 501.349666,291.292429 C501.349666,304.350855 501.546775,318.695741 501.546775,318.695741 C501.546775,318.695741 457.786971,318.668613 440.578393,318.668616 C423.369815,318.668619 375.991147,317.128627 365.88792,317.128629 C355.784694,317.128631 354.138011,316.824828 330.538013,315.966586 C306.938014,315.108343 306.649043,314.722082 279.473941,314.722082 C252.298839,314.722082 235.207442,314.324606 219.676282,314.324607 C204.145122,314.324609 189.732241,314.429852 172.299789,313.730023 C154.867337,313.030195 137.323124,312.83706 128.031843,312.837062 C118.740562,312.837064 84.9711449,312.08479 68.9936891,312.08479 C53.0162332,312.084791 33.611232,312.052965 33.0683659,311.63849 C32.5254998,311.224016 32.3645577,293.207467 31.9786567,287.836318 C31.5927557,282.46517 30.9464528,270.391929 30.9464528,266.68048 C30.9464529,262.969031 29.5214763,255.313941 30.2213061,254.83943 C30.921136,254.36492 43.4616524,255.061857 48.8819892,255.061857 C54.302326,255.061857 92.186447,255.487542 99.7449701,255.487542 C107.303493,255.487542 154.411636,256.202923 164.567664,256.202923 C174.723692,256.202923 205.337542,256.460432 214.999176,256.460432 C224.66081,256.460432 249.605845,256.065489 278.835957,256.740002 C308.066068,257.414515 319.487913,257.643813 331.445066,257.643813 C343.40222,257.643813 379.388308,258.507118 397.488403,258.507118 C415.588499,258.507118 444.386399,258.704228 461.171836,259.230456 C477.957273,259.756685 502.226713,262.736477 502.226713,262.736477 Z" id="Path-3" fill="#FFED00" sketch:type="MSShapeGroup"></path>
                <path d="M34.4218051,320.967967 C33.8718631,322.116027 34.4551688,331.774149 35.9721056,338.206275 C37.4890425,344.6384 38.4924605,351.152725 39.5473717,353.941741 C40.6022829,356.730758 41.0357337,359.089648 43.7237923,359.949899 C46.4118508,360.810149 64.1685153,360.976096 69.2326936,361.513526 C74.2968719,362.050956 79.8534409,364.550099 80.8209985,367.90677 C81.788556,371.263442 82.4623067,374.454777 82.4623073,379.498703 C82.4623078,384.542628 80.9062398,388.971441 80.9062377,398.988263 C80.9062356,409.005084 82.2567643,413.861903 84.5751523,417.252433 C86.8935403,420.642963 88.6877961,421.691223 90.3544938,421.691221 C92.0211915,421.691218 94.8773089,420.409913 97.5318193,409.699087 C100.18633,398.988261 107.156899,388.498699 111.676093,381.522681 C116.195287,374.546664 122.72062,367.259013 131.08404,361.327933 C139.447461,355.396854 151.253697,351.365823 160.628808,349.077664 C170.003919,346.789504 182.12361,346.823055 190.157858,348.805624 C198.192105,350.788192 209.982034,355.95091 221.997737,368.474125 C234.01344,380.99734 237.854354,391.765598 241.435911,399.806499 C245.017468,407.8474 247.86362,415.223314 249.04306,416.026438 C250.222501,416.829562 285.43204,418.365383 291.130994,418.365382 C296.829948,418.365381 334.542871,418.745331 343.921893,419.255857 C353.300916,419.766383 394.170126,422.150065 407.208101,423.090716 C420.246076,424.031367 471.001806,427.267434 477.742364,427.267439 C484.482922,427.267444 502.053077,426.606077 502.05308,426.1288 C502.053082,425.651523 501.811271,390.959452 501.811266,380.243791 C501.811261,369.528129 501.811271,337.381449 501.811266,332.035256 C501.811261,326.689063 501.491768,325.509618 501.49177,325.509618 C501.491773,325.509618 475.746494,325.129971 470.588616,325.129971 C465.430737,325.129971 432.080726,324.319896 418.814844,323.869216 C405.548962,323.418536 374.457192,323.342063 365.219922,323.342063 C355.982652,323.342063 328.309195,322.763524 318.964327,322.168663 C309.619458,321.573802 282.948021,321.520301 274.342188,321.520301 C265.736356,321.520301 227.096969,320.967967 212.950284,320.967967 C198.803599,320.967967 172.857007,320.512241 159.520093,320.512241 C146.183179,320.512241 116.29322,319.862972 107.318312,319.862972 C98.3434037,319.862972 34.9717471,319.819907 34.4218051,320.967967 Z" id="Path-4" fill="#FFED00" sketch:type="MSShapeGroup"></path>
                <path d="M510.547652,415.007921 C511.718169,414.168684 517.204879,414.827558 523.302244,415.347297 C529.399609,415.867036 531.183361,415.870717 531.183362,416.443093 C531.183363,417.015469 530.864228,421.185529 529.620094,423.247923 C528.37596,425.310316 528.171671,426.194093 524.247492,426.194093 C520.323314,426.194093 515.05304,426.730028 513.060216,425.662575 C511.067391,424.595122 510.122143,423.435214 510.122143,421.951519 C510.122143,420.467824 509.377135,415.847158 510.547652,415.007921 Z" id="Path-5" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M508.37741,377.414431 C507.73841,378.661509 507.530441,386.092088 507.530441,391.833514 C507.530441,397.57494 507.670314,398.02511 508.287228,398.789995 C508.904142,399.554881 515.046047,399.984439 521.519598,400.569697 C527.993148,401.154955 532.400258,402.583135 534.552832,402.583135 C536.705406,402.583134 539.185209,392.857164 541.47692,389.125495 C543.768632,385.393827 548.298315,379.444064 547.316257,377.414431 C546.334199,375.384798 533.30612,376.727212 523.673276,376.727212 C514.040432,376.727212 509.016409,376.167353 508.37741,377.414431 Z" id="Path-6" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M507.489951,335.763147 C506.118827,337.035993 507.050455,346.256947 507.050455,352.480567 C507.050455,358.704187 506.682736,359.60011 507.345293,360.35285 C508.00785,361.105589 525.295803,358.621734 533.336303,358.621735 C541.376804,358.621736 558.722176,359.504409 566.730285,357.581152 C574.738394,355.657895 577.514136,353.984571 583.9472,352.719824 C590.380264,351.455076 595.113859,352.032237 595.113864,351.168336 C595.113868,350.304435 595.302322,334.881946 594.651546,334.431407 C594.00077,333.980869 563.483386,334.431407 545.440853,334.431407 C527.398319,334.431407 508.861075,334.490301 507.489951,335.763147 Z" id="Path-7" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M589.996735,51.3158458 C590.41388,51.8071826 590.905218,85.1036273 590.905218,96.9494254 C590.905218,108.795224 590.071324,144.717396 590.071324,155.694172 C590.071324,166.670948 590.233919,184.109319 590.233919,189.387364 C590.233919,194.665409 590.417826,196.17455 589.584326,196.174549 C588.750827,196.174549 583.007889,193.717848 582.165312,192.568238 C581.322735,191.418629 580.133657,191.567016 581.778951,187.663141 C583.424244,183.759266 587.249975,173.505883 587.249975,167.021399 C587.249975,160.536915 586.860851,152.539342 583.842178,151.280018 C580.823504,150.020695 571.856281,150.218019 568.043573,154.574946 C564.230865,158.931874 559.656089,165.636573 553.70596,178.504118 C547.755832,191.371662 545.014202,202.365013 543.482568,209.450156 C541.950934,216.535298 540.933133,219.737481 543.798287,223.901427 C546.663442,228.065373 547.993805,227.648229 551.59064,227.648228 C555.187474,227.648228 559.101211,226.840778 564.70405,218.145466 C570.306888,209.450154 570.192833,208.624944 571.842468,208.624944 C573.492103,208.624943 584.156713,213.951132 586.254275,214.999715 C588.351837,216.048298 591.146743,216.921267 591.146743,219.062236 C591.146743,221.203205 591.844484,242.680812 592.335822,252.953148 C592.827159,263.225483 594.13937,280.28222 594.13937,288.451072 C594.13937,296.619923 594.499286,307.582905 594.907356,311.391255 C595.315425,315.199604 594.525338,314.791548 589.576828,314.791551 C584.628318,314.791554 562.438368,315.533098 550.623749,314.892581 C538.80913,314.252064 536.383614,315.040958 534.711485,313.422512 C533.039356,311.804066 533.460446,303.616653 533.460446,298.282183 C533.460446,292.947712 532.477769,277.237108 532.969108,277.237109 C533.460446,277.23711 554.467273,272.595642 559.191587,270.529253 C563.915901,268.462864 565.548602,268.194115 565.5486,262.263716 C565.548597,256.333317 563.258449,243.013514 561.683403,240.688628 C560.108358,238.363743 558.086569,238.46912 552.952969,238.46912 C547.81937,238.46912 529.415685,239.58795 521.526643,240.473939 C513.637602,241.359928 507.415954,242.211968 507.415954,241.698142 C507.415954,241.184315 508.16934,215.291361 508.16934,210.359428 C508.16934,205.427494 509.567977,173.168459 509.567977,165.767598 C509.567977,158.366736 510.410159,133.361354 510.410159,127.359924 C510.410159,121.358494 509.71676,94.0294148 509.71676,79.7004843 C509.71676,65.3715537 508.843796,57.0761484 511.081458,55.9967823 C513.31912,54.9174162 519.719149,54.3822716 533.302587,53.3336882 C546.886024,52.2851047 557.084554,52.7724967 569.194765,51.692736 C581.304977,50.6129753 589.57959,50.824509 589.996735,51.3158458 Z" id="Path-8" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M507.659488,314.946186 C507.04806,314.402786 506.722182,308.601757 506.722182,299.671899 C506.722182,290.742041 506.46311,279.910686 507.455407,279.276039 C508.447704,278.641393 510.281987,279.486638 517.867601,278.810442 C525.453216,278.134246 527.200734,278.134246 527.200734,278.134246 C527.200734,278.134246 527.200735,284.516556 527.200734,297.189934 C527.200732,309.863313 527.061013,312.172154 526.051201,313.336758 C525.041389,314.501363 508.270915,315.489586 507.659488,314.946186 Z" id="Path-9" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M577.453006,154.534021 C579.549498,154.534021 583.591547,156.600777 582.319726,164.681114 C581.047905,172.761452 571.101804,192.61865 567.9932,198.912639 C564.884597,205.206629 557.575483,219.298668 555.553893,220.684155 C553.532304,222.069643 550.322828,222.717786 549.125908,221.128295 C547.928988,219.538805 546.607107,216.120804 549.87944,207.053575 C553.151773,197.986345 554.708899,191.99196 559.302736,181.655919 C563.896573,171.319878 567.951798,162.541715 570.382146,159.876122 C572.812495,157.210529 575.356513,154.534021 577.453006,154.534021 Z" id="Path-10" fill="#E7AD62" sketch:type="MSShapeGroup"></path>
                <path d="M724.154364,368.880868 C725.334631,368.022381 733.553434,369.784047 737.631755,390.302411 C741.710076,410.820775 731.073858,425.571472 728.621502,428.782775 C726.169147,431.994079 721.606937,435.422336 719.022944,434.69955 C716.438952,433.976764 716.383696,433.217817 717.70332,428.561348 C719.022944,423.904879 720.643221,413.351138 721.257529,403.756643 C721.871837,394.162148 722.974097,369.739354 724.154364,368.880868 Z" id="Path-11" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M700.91265,274.16494 C706.198448,274.16494 710.460014,274.344926 711.399352,275.315954 C712.338691,276.286983 714.385165,282.167598 713.743636,284.159222 C713.102107,286.150847 712.034788,286.078935 710.820393,286.078934 C709.605998,286.078933 694.312092,286.606702 690.04891,286.055776 C685.785729,285.504849 684.434414,284.985206 685.080413,280.925169 C685.726411,276.865131 686.040878,275.934731 688.96534,275.315954 C691.889802,274.697177 695.626851,274.16494 700.91265,274.16494 Z" id="Path-12" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M685.431852,290.595233 C684.903272,291.331832 684.934555,301.046996 687.491326,303.2828 C690.048098,305.518604 707.707819,304.475256 710.377132,304.475256 C713.046445,304.475255 716.180959,304.574796 716.180959,303.2828 C716.180959,301.990804 715.778734,294.019836 715.024663,293.084967 C714.270591,292.150098 713.529521,291.580482 711.14908,291.580482 C708.768638,291.580482 701.00569,291.453314 694.862206,291.024274 C688.718723,290.595233 685.960431,289.858634 685.431852,290.595233 Z" id="Path-13" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M686.110759,308.870481 C686.973716,308.441442 698.703255,309.692808 706.720133,309.692808 C714.737011,309.692808 715.929059,310.230734 717.004505,311.617801 C718.07995,313.004869 717.758983,323.203921 717.758982,323.203921 C717.758981,323.203921 717.18571,323.723971 712.768544,323.72397 C708.351379,323.723969 698.298998,324.844512 693.07657,324.284241 C687.854142,323.72397 686.336656,323.589082 686.336656,322.175606 C686.336656,320.76213 685.247802,309.29952 686.110759,308.870481 Z" id="Path-14" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M686.619026,328.60471 C687.305652,328.071659 694.550177,329.010998 702.820173,329.010998 C711.090168,329.010998 715.610935,329.427037 717.087793,329.886955 C718.564651,330.346873 718.207931,333.896613 718.20793,337.022594 C718.207929,340.148575 717.638721,342.592399 715.371227,342.592398 C713.103733,342.592397 707.995471,343.242459 698.912493,343.242459 C689.829515,343.24246 687.291433,342.502202 686.432946,341.391004 C685.574459,340.279806 685.932399,329.13776 686.619026,328.60471 Z" id="Path-15" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M687.317841,347.699847 C687.959371,347.266337 697.227209,348.273526 704.851207,348.273526 C712.475205,348.273526 718.368821,347.691315 718.368821,349.308342 C718.368822,350.925369 719.66488,358.08376 717.754513,359.276215 C715.844146,360.468671 708.721914,360.070103 702.258682,360.070103 C695.79545,360.070102 692.096603,359.59312 690.068006,358.951185 C688.039409,358.30925 687.316623,358.453482 687.316623,354.993938 C687.316623,351.534394 686.676312,348.133357 687.317841,347.699847 Z" id="Path-16" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M688.231177,364.99594 C688.75529,364.354411 694.925183,365.039819 704.663096,365.636657 C714.401009,366.233494 717.50424,365.714258 717.504239,366.992034 C717.504239,368.26981 718.262779,372.596779 714.685818,372.596779 C711.108857,372.596779 702.057163,373.237902 696.854237,372.276218 C691.651311,371.314534 691.118261,370.993482 689.930274,369.882774 C688.742288,368.772066 687.707065,365.637469 688.231177,364.99594 Z" id="Path-17" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path id="Path-18" sketch:type="MSShapeGroup" d=""></path>
                <path d="M607.662215,16.2833842 C608.916839,15.2157114 614.378763,14.7819028 617.446984,16.1376223 C620.515205,17.4933418 624.410392,20.5139569 626.592809,25.3307856 C628.775226,30.1476142 628.664767,35.15487 627.805708,37.6132983 C626.946648,40.0717266 624.139996,44.7636542 621.000365,46.7529705 C617.860734,48.7422868 617.446984,48.7099255 616.079764,48.3114195 C614.712545,47.9129136 614.682322,46.738795 614.682322,41.6336525 C614.682322,36.52851 614.557154,31.5340911 613.870067,29.2746477 C613.18298,27.0152042 609.953753,22.6530454 608.217715,20.8750178 C606.481677,19.0969902 606.407592,17.3510569 607.662215,16.2833842 Z" id="Path-19" fill="#D0011B" sketch:type="MSShapeGroup"></path>
                <path d="M34.6357132,393.742504 C34.6357132,393.742504 34.247658,374.952585 35.4970894,370.64958 C36.7465209,366.346575 37.3225482,365.20421 40.6294964,365.204209 C43.9364447,365.204209 51.9601301,366.394536 60.3132504,366.394536 C68.6663707,366.394536 72.9160844,366.087871 73.9552596,369.55663 C74.9944347,373.025389 75.6353801,379.008997 74.7255558,390.347867 C73.8157314,401.686737 75.4532218,410.322784 76.3145971,413.695135 C77.1759723,417.067487 78.4796644,421.710101 77.9244694,421.7101 C77.3692745,421.710099 69.3451043,423.299143 59.0207016,423.299141 C48.6962989,423.299138 42.745633,422.502684 39.9124902,419.938417 C37.0793475,417.37415 36.3584656,414.517758 35.4970894,410.440511 C34.6357132,406.363263 34.6357132,393.742504 34.6357132,393.742504 Z" id="Path-20" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M25.1967923,15.7987472 C25.809734,16.8457977 25.4973564,21.0146439 24.5671182,25.6986479 C23.63688,30.3826519 23.2398471,32.9249747 22.6738291,38.6337175 C22.107811,44.3424602 22.6072194,47.8662096 21.5604963,47.8662091 C20.5137732,47.8662086 15.9685666,47.5348023 11.5834859,44.1311467 C7.19840522,40.727491 5.27230312,36.4995831 4.60128491,32.0387056 C3.93026669,27.577828 5.15844317,22.0803984 11.0794838,17.9076154 C17.0005244,13.7348323 18.7763421,14.2050374 20.7250859,14.2050374 C22.6738297,14.2050374 24.5838506,14.7516967 25.1967923,15.7987472 Z" id="Path-21" fill="#D0011B" sketch:type="MSShapeGroup"></path>
                <path d="M630.852779,133.611779 C631.82405,112.931654 631.134127,103.042579 631.778021,101.116585 C632.421915,99.1905903 633.378189,99.0468138 635.067312,99.0468138 C636.756435,99.0468137 640.492572,98.6635804 646.380197,105.936223 C652.267822,113.208866 653.428382,116.703996 654.940628,118.751528 C656.452874,120.79906 656.821109,122.386297 659.442716,122.386298 C662.064323,122.386298 663.846537,121.777572 664.67455,124.106452 C665.502563,126.435332 667.986078,133.435936 667.986079,136.50077 C667.986081,139.565603 668.141752,148.525299 662.518409,159.608037 C656.895066,170.690776 644.453169,190.086213 644.453169,190.086213 L636.639552,187.004831 C636.639552,187.004831 642.659058,183.469361 650.04186,170.739908 C657.424663,158.010455 660.678787,151.271547 660.678786,147.4599 C660.678785,143.648253 660.408298,144.154059 657.98736,144.154059 C655.566421,144.154059 654.814997,145.263418 652.11732,151.266375 C649.419643,157.269332 644.302669,162.588055 640.145025,164.773155 C635.987382,166.958255 636.639552,166.757594 633.15942,166.757594 C629.679287,166.757594 627.736227,165.497727 627.736227,164.739538 C627.736227,163.981349 629.881507,154.291903 630.852779,133.611779 Z" id="Path-22" fill="#000000" sketch:type="MSShapeGroup"></path>
                <path d="M635.924803,133.289573 C636.638518,122.354232 635.838433,106.192229 637.276722,105.507995 C638.715011,104.82376 646.591208,114.436661 647.753321,117.363406 C648.915433,120.290151 650.686789,123.027606 648.915433,123.027606 C647.144078,123.027606 643.950467,121.655 643.372771,127.472286 C642.795075,133.289573 642.723188,137.331365 642.723188,140.817187 C642.723188,144.30301 643.787036,145.469775 646.351235,146.148321 C648.915433,146.826867 647.611095,148.759066 646.190907,151.150526 C644.77072,153.541986 637.658404,161.625572 635.542604,161.625572 C633.426804,161.625573 633.886581,161.361291 634.714592,154.554114 C635.542604,147.746938 635.211089,144.224914 635.924803,133.289573 Z" id="Path-23" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M680.345657,209.443696 C681.339118,208.503369 684.516974,208.247914 687.788324,212.564328 C691.059675,216.880743 694.615346,223.071684 694.921636,227.660668 C695.227926,232.249653 695.659644,237.372792 692.913508,242.217233 C690.167372,247.061674 683.505374,251.849145 682.218905,251.849146 C680.932436,251.849146 680.654246,244.863998 680.182677,232.717135 C679.711108,220.570272 679.352195,210.384023 680.345657,209.443696 Z" id="Path-24" fill="#D0011B" sketch:type="MSShapeGroup"></path>
            </g>
            <g id="wiel" sketch:type="MSLayerGroup" transform="translate(153.199676, 436.770682)">
                <path d="M49.687811,0.979634961 C68.8935412,0.979634961 85.4692877,13.6574164 92.5465926,22.3857641 C99.6238974,31.1141119 101.514479,44.6797735 101.51448,51.5571333 C101.51448,58.4344931 98.8379699,74.2658809 90.7747912,82.7190568 C82.7116126,91.1722326 71.1226467,100.140123 54.0222908,100.140118 C36.921935,100.140113 23.9392867,96.2144368 12.6155955,83.4366857 C1.29190432,70.6589346 0.302073023,63.2648791 0.302072624,49.5992436 C0.302072225,35.9336081 3.59029735,26.9330567 11.0734357,19.1658372 C18.556574,11.3986178 30.4820808,0.979634961 49.687811,0.979634961 Z" id="Path-25" fill="#000000" sketch:type="MSShapeGroup"></path>
                <path d="M51.6826774,8.35191138 C60.1675254,8.35191138 71.7205029,10.6364464 81.8435269,20.8148989 C91.9665509,30.9933514 94.4441002,38.2329915 94.4441014,49.7784047 C94.4441026,61.3238178 87.3816434,78.0698137 75.8045565,85.1570155 C64.2274695,92.2442173 50.377725,96.2748222 36.1706521,90.7159178 C21.9635793,85.1570134 13.1956386,75.3309431 10.0588568,61.3446023 C6.92207501,47.3582615 10.970493,35.1021488 13.7875578,30.3697573 C16.6046227,25.6373658 21.5349812,16.3418436 30.1613758,12.919001 C38.7877704,9.4961583 43.1978294,8.35191138 51.6826774,8.35191138 Z" id="Path-26" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M52.527643,31.6020994 C60.4314592,31.6020994 66.7693605,41.9013122 66.7693603,48.6579123 C66.7693601,55.4145123 60.3839479,60.4735498 52.3653103,61.7732 C44.3466728,63.0728502 33.9910387,58.5255577 33.9910398,49.2181579 C33.9910409,39.910758 44.6238267,31.6020994 52.527643,31.6020994 Z" id="Path-27" fill="#000000" sketch:type="MSShapeGroup"></path>
            </g>
            <g id="ook-een-wiel" sketch:type="MSLayerGroup" transform="translate(581.199676, 434.770682)">
                <path d="M47.7849731,0.737377603 C66.4955368,0.737377603 76.3896827,8.45192084 83.5185661,18.6604742 C90.6474494,28.8690275 98.4285254,40.2050392 98.4285279,53.9093051 C98.4285304,67.6135709 94.8436144,76.9688533 88.1541681,85.3487567 C81.4647218,93.7286601 68.9230137,103.823158 50.0662155,103.823154 C31.2094174,103.82315 25.4712197,100.468559 13.8639427,89.9499888 C2.25666583,79.4314189 0.110690379,66.7588338 0.110691026,53.9743797 C0.110691672,41.1899256 5.9388233,25.4208453 10.8317931,19.5766271 C15.7247629,13.732409 29.0744094,0.737377603 47.7849731,0.737377603 Z" id="Path-28" fill="#000000" sketch:type="MSShapeGroup"></path>
                <path d="M53.2709201,9.66931391 C66.7309725,11.1016702 78.1211093,21.2704998 83.2178424,28.6264225 C88.3145755,35.9823452 92.8957869,51.9271129 91.0101064,61.4929705 C89.124426,71.0588281 83.3291966,78.8457643 76.3794549,85.7070322 C69.4297132,92.5683002 63.918906,95.2984784 53.2709206,96.1203089 C42.6229352,96.9421395 38.7206966,97.3559782 29.5920766,92.4871403 C20.4634565,87.6183024 13.2453761,79.6602761 10.5305523,71.727115 C7.81572844,63.7939539 6.22251629,50.2768687 9.89663046,39.5638089 C13.5707446,28.8507491 20.6265073,19.8135253 26.5518841,15.9924464 C32.4772608,12.1713674 39.8108676,8.23695767 53.2709201,9.66931391 Z" id="Path-29" fill="#D8D8D8" sketch:type="MSShapeGroup"></path>
                <path d="M55.6172356,34.7103222 C59.3571533,35.8728779 66.1043636,43.6861279 66.1043642,50.1152802 C66.1043648,56.5444324 62.8375099,61.112763 58.6186762,63.6323649 C54.3998425,66.1519668 45.2880395,68.3703276 38.5576466,63.2989528 C31.8272537,58.2275779 31.4346176,53.6767949 31.4346175,48.6200436 C31.4346174,43.5632923 35.7258366,38.3047392 40.5793234,36.5075307 C45.4328102,34.7103222 51.8773178,33.5477665 55.6172356,34.7103222 Z" id="Path-30" fill="#000000" sketch:type="MSShapeGroup"></path>
            </g>
        </g>
    </g>
</svg>