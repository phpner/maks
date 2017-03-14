@extends('admin.admin')
@section('content')
   @if(isset($items))
       <div class="status">
           <h2 class="title">Всего товаров: {{ $count or 0 }} </h2>
       <ul class="allItems">
       @foreach($items as $item)
               <li id="item_{{$item->id}}">
                   <a href="admin/del_item/{{$item->id}}">
                        <span class="glyphicon glyphicon-remove delete"></span>
                   </a>
                   <a  href="admin/edit_item/{{$item->id}}">
                       <span class="glyphicon glyphicon-pencil edit"> </span>
                   </a>

                   <a class="text" href="admin/edit_item/{{$item->id}}">{{$item->title}}</a>
                  </li>
           @endforeach
       </ul>
       </div>
   @endif
@endsection
@section('script')
    <script>
        $(function(){

           $(".allItems").sortable({
                axis: 'y',
                cursor: "move",
                 start: function (event, ui) {
                        ui.item.toggleClass("highlight");
                },
                stop: function (event, ui) {
                        ui.item.toggleClass("highlight");
                },
                 revert: true,
                cursor: "move",
                 update: function( event, ui ){
                 var date = $(this).sortable('serialize'); 
                     $.ajax({
                      url: 'admin/settings/saveorder',
                      dataType: "json",
                      method: "post",
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {ser : date}
                    })
                 
                 }
               });
            //Confirm delete
        $('.delete').on('click',function(e){

           var res = confirm('Удалисть ?');

           (!res) ? e.preventDefault() : '' ;
        });

        //Selected
        $('.delete').on({
            mouseenter:function(){
           $(this).closest('li').find('.text').css('color','red');
        },
            mouseleave: function(){
                $(this).closest('li').find('.text').css('color','');
            },
        });
        });
    </script>
    @endsection
