<div class="col-sm-3 offset-1">
    <div class="card p-3">
        <div class="card-header">
        <h5>TU PEDIDO</h5>

        </div>
     <div class="card-body table-responsive p-2" style="overflow: scroll;height:250px;width:302px">
                <table class="table table-hover text-nowrap" id="products-table">
                    
                    
                    <tbody>
                    @foreach(Cart::getContent() as $item)
                        <tr>
            
           
                        <td>{{$item->quantity}}{{' '}}{{ $item->name }}
                       
                        </td>
                        <td style="text-align: center;color:red">{{ $item->price * $item->quantity}}{{'$'}}</td>
                   <td>
                       <form action="{{route('cart.remover')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit" class="btn btn-danger ">x</button>
                      </form>
                   </td>
   
                        
                        </tr>
                    @endforeach
                   
                    </tbody>
                  

                    
            
                                
     
                </table>
                <hr>
                 <p>Subtotal <span style="float:right">{{number_format(Cart::getSubTotal(),2)}}{{'$'}}</span></p>
                  <p>Domicilio <span style="float:right">0.0</span></p>
                 <p>Total <span style="float:right"> {{number_format(Cart::getSubTotal(),2)}}{{'$'}}</span></p>
               
              
             </div>
               {{-- <div class="row" style="bottom:11%;margin-left:7px;font-size:1em;border-top-style:groove;position:absolute;width:auto">
                    <div class="col-5">
                  <p>Subtotal</p>
                  <p>Domicilio</p>
                  <p>Total</p>


                </div>
                <div class="col-6" style="text-align:end;padding-right:0px ">
                  <p>{{number_format(Cart::getSubTotal(),2)}}{{'$'}}</p>
                  <p>{{'0$'}}</p>
                  <p>{{number_format(Cart::getSubTotal(),2)}}{{'$'}}</p>

                </div>
                </div> --}}
        <div class="card-footer text-center">
        </div>
    </div>
</div>