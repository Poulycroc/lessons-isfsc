<form class="d-flex" role="search" action="<?php echo esc_url(home_url('/')); ?>">
  <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search" name="s" value="<?php echo get_search_query(); ?>">
  <button class="btn btn-outline-success" type="submit">Rechercher</button>
</form>
