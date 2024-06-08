<div class="report-options">
  <div>
    <h5 onclick="report_data(1,this)" id="resp-select" class="active">Responded</h5>
    <h5 onclick="report_data(2,this)" id="resp-select">Not Responded</h5>
  </div>
  <select onchange="report_data(1,document.getElementById('resp-select'))" id="theselector-box">
    <option value="1">All</option>
    <option value="2">Ignored</option>
    <option value="3">Suspented</option>
  </select>
</div>
<div class="block-container" id="report-blogs">
</div>
<script>
option_select(3)
report_data(1,document.getElementById('resp-select'))
</script>