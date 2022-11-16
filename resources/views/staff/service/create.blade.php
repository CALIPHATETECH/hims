
<div class="modal fade" id="addDepartment" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW STAFF SERVICE</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('staff.service.register',[$staff->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <select name="service" id="" class="input-group form-control">
                        <option value="">Service</option>
                        @foreach($staff->department->services as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary">ADD SERVICE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>