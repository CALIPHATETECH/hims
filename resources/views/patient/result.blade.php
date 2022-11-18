
<div class="modal fade" id="result_{{$investigation->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Investigation Result</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('patient.investigation.send.result',[$investigation->consultancy->patient->id, $investigation->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Please type the detail of result conducted for {{$investigation->test->name}} of {{$investigation->consultancy->patient->name}}"></textarea>
                    </div>
                    <br>
                    <button class="btn btn-primary">SEND</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>