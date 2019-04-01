
 <form action="{{ url('/search') }}" method="get" onsubmit="return emptyField()">
     <input class="form-control searchfilm-field" name="q" type="text" placeholder="Cerca un film, celebrità o serie TV" aria-label="Search" value="@if(isset($_GET['q'])) {{ htmlentities($_GET['q']) }} @endif" id="film-field">
        <select id="selection-media" class="form-control" name="opt-search">
           <option <?php if(isset($_GET['opt-search']) and $_GET['opt-search'] == 'movie'): echo "selected"; endif; ?> value="movie">Film</option>
            <option <?php if(isset($_GET['opt-search']) and $_GET['opt-search'] == 'person'): echo "selected"; endif; ?> value="person">Celebrità</option>
             <option <?php if(isset($_GET['opt-search']) and $_GET['opt-search'] == 'tv'): echo "selected"; endif; ?> value="tv">Serie tv</option>
         </select>
      <input type="submit" class="btn btn-default searchfilm-btn" value="Cerca">
 </form>
    <p id="alert-message"></p>
