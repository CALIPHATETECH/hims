
<div class="modal fade" id="addPatient" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>NEW PATIENT</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('patient.register')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="NAME" value="{{old('name')}}" name="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <select name="gender" id="" class="input-group form-control">
                            <option value="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="ADDRESS" value="{{old('address')}}" name="address">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="PATIENT CONTACT" value="{{old('contact')}}" name="contact">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="input-group form-control" placeholder="PATIENT NEXT OF KIN CONTACT" value="{{old('next_of_kin_contact')}}" name="next_of_kin_contact">
                    </div>
                    <br>
                    <button class="btn btn-primary">REGISTER</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>