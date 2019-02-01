<div class="col-md-6">
<a href="{{ url('/create-list') }}"><button class="btn btn-info">Crea lista</button></a>
</div>
<div class="col-md-6">
<form name="list-insert" method="POST" action="{{ action('ListsController@updateMovie') }}">
    {{ csrf_field() }}
     <div class="form-group">
         <label for="sel1">Seleziona una lista</label>
         <select class="form-control" id="sel1" name="list_select">
             <option>Scegli una lista</option>
             @foreach($lists as $list)
             <option value="{{ $list->id }}">{{ $list->name }}</option>
                 @endforeach
         </select>
     </div>
     <div class="form-group">
         <input type="hidden" name="film_id" value="{{ $id }}">
     </div>
     <div class="form-group">
         <input type="submit" class="btn btn-primary" value="Aggiungi film">
     </div>
 </form>
</div>