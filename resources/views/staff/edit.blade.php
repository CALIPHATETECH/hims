
<div class="modal fade" id="edit_{{$staff->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>EDIT staff</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('staff.update',[$staff->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{$staff->name}}" name="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <select name="gender" id="" class="input-group form-control">
                            <option value="{{$staff->staff->gender ?? ''}}">{{$staff->staff->gender ?? 'Gender'}}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="E-MAIL" value="{{$staff->email}}" name="email">
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <select name="department" id="" class="input-group form-control">
                            <option value="{{$staff->staff->department->id ?? ''}}">{{$staff->staff->department->name ?? ''}}</option>
                            @foreach(App\Models\Department::all() as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <select name="role" id="" class="input-group form-control">
                            <option value="{{$staff->role ?? ''}}">{{$staff->role ?? 'Role'}}</option>
                            <option value="admin">Admin</option>
                            <option value="doctor">Doctor</option>
                            <option value="lab">Lab Scientist</option>
                            <option value="nurse">Nurse</option>
                            <option value="midwife">Midwifery</option>
                            <option value="cleaner">Cleaner</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="ADDRESS" value="{{$staff->staff->address ?? ''}}" name="address">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="CONTACT" value="{{$staff->staff->contact ?? ''}}" name="contact">
                    </div>
                    <br>
                    
                    <button class="btn btn-primary">SAVE</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>