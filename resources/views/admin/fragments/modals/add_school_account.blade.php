<div class="modal fade bd-example-modal-md" id="addaccount">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New School Account</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.accounts.store') }}">@csrf
                    <input type="hidden" name="school_id" value="{{ $school->id}}" required>
                    <div class="form-group">
                        <label for="">Account Name</label>
                        <input name="name" type="text" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="">Code</label>
                        <input name="code" type="text" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="">Class</label>
                        <select name="klass_id"  class="form-control" placeholder="" required>
                            <option value="" disabled selected> Select one</option>
                            @foreach ($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Term</label>
                        <select name="term"  class="form-control" placeholder="" required>
                            <option value="" disabled selected> Select one</option>
                            @foreach (getTerms() as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Amount</label>
                        <input name="amount" type="text" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="">Downloads</label>
                        <input name="downloads" type="number" class="form-control" placeholder="Available downloads" required>
                    </div>


                    <button type="submit" class="btn btn-sm btn-primary">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>
