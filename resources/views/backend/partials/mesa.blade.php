<!--cardview de la mesa-->


<ul>
  @foreach($mesas as $mesa)
  <li>
      
      <div class="card card-table blue-grey lighten-3" style="border-style: solid">
              <div id="card-table-nombre" class="left card-table-section noblur">
                <p class="black-text noblur" style="margin: 50px 20px 20px 50px;font-size: 30px;">{{$mesa->nombre}}</p>
              </div>
              <p class="transparent-text" type="input" name="id_mesa" id="id_mesa">{{$mesa->id}}</p>

              <div style="z-index: 1;" id="card-table-consumo" class=" comer left card-table-section" style="min-width: 350px; border: inset;">
               dropable - <span id="count">0</span> Item(s)  
              </div >

              <div id="card-table-total" class="left card-table-section">    
                <p class="black-text" style="margin: 20px 20px 20px 20px;font-size: 20px;">Total a pagar:</p>   
                <p class="black-text" style="margin: 30px 20px 20px 30px;font-size: 20px;">................</p>
              </div>
              <div id="card-table-pago" class="left card-table-section">
                <div style="margin-left: 10px;margin-right: 10px;margin-top: 30px; min-width: 50px;min-height: 50px;">
                   
                   <form action="#">
                    <p>
                      <input name="group1" type="checkbox" id="test5" />
                      <label class="black-text" for="test5">Pago</label>
                    </p>
                     <input type="text" name="" class="black-text" placeholder="comentario">
                   </form>
                </div>
              </div>
            </div>

  </li>
  @endforeach
</ul>



<script type="text/javascript">

 /*dropable*/
 $(".comer").droppable({
          activeClass: "active",
          hoverClass: "hover",
          drop: function (event, ui) {
              var count = parseInt($("#count").text(), 10);
              $("#count").text(++count);
          },
          tolerance: "touch"
 });
</script>


            