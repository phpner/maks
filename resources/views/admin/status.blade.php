@extends('admin.admin')
@section('content')
   @if(isset($items))
       <div class="status">
           <h2 class="title">Всего товаров: {{ $count or 0 }} </h2>
       <ul class="allItems">
       @foreach($items as $item)
               <li>
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
           {{ $items->links() }}
       </div>
   @endif
@endsection
@section('script')
    <script>
        $(function(){
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
        })
    </script>
    @endsection
