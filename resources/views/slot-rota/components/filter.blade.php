<p class="clearfix">
  <button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#filterSection">
    Filters
  </button>
</p>
<div class="collapse" id="filterSection">
  <div class="card card-body">
    <div class="form-group" style="width:30%">
        <label for="staffFilter">Select Staff</label>
        <select class="form-control" id="staffFilter">
            <option value="All">All</option>
        
            @foreach($rota as $staffid => $dayData)
                <option value="{{$staffid}}">{{$staffid}}</option>
            @endforeach
        </select>
    </div>
  </div>
</div>


@section('js')
<script type="text/javascript">
    $( document ).ready(function() {

        $("#staffFilter").change(function () {
            filterTable(this.value);
        });

        function filterTable($staffName) {
            $('.staffRow').each(function() {

                if($staffName == "All") {
                    $(this).show()
                } else {
                    var staffID = $(this).data('staffid');
                    if($staffName != staffID) {
                        $(this).hide();
                    }
                }

            });
        }
        
    });
</script>
@endsection 