
<div class="search-header">
  <input type="text" id="search-engine" onkeyup="post_search(this)"  placeholder="Try Searching with Title/Auther/Category"  />
  <input type="button" value="Search" id="Thesearch"  onclick="post_search(this)" />
</div>
<div id="Searched-posts">

</div>
<script>
option_select(2)
post_search(document.getElementById('Thesearch'))
</script>