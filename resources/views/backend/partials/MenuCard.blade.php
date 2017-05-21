 
@foreach($publicaciones as $publicacion)
 <div class="container" style="margin-top: 20px; ">
          <div class="col s12 m6" >
            <div class="card small" style=" border-radius: 40px; min-height: 80px; max-height: 120px; " >
              <div class="card-image" >
                <!--<img src="images/logo.jpg">--> 
              </div>
              <div class="card-content">
                <p>{{$publicacion->texto}}</p>
              </div>
               <div class="card-action" style="border-radius: 40px">
               <a class=" waves-effect waves-circle waves-light btn-floating secondary-content transparent" >
                <img src="/images/megusta.png">
                </a>
               <a class=" waves-effect waves-circle waves-light btn-floating secondary-content transparent" style=" margin-right: 20px;">
                <img src="/images/msg.png">
               </a>
              </div>
            </div>
          </div>
        </div>
@endforeach