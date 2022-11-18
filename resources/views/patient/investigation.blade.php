
<div class="modal fade" id="send_{{$consultancy->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Investigation</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('patient.send.investigation',[$consultancy->id])}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <select name="test" id="" class="input-group form-control">
                            <option value="">Test</option>
                            @foreach(App\Models\Test::all() as $test)
                            <option value="{{$test->id}}">{{$test->name}}</option>
                            @endforeach
                        </select>
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