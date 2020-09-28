<div class="modal fade bd-example-modal-lg" id="edit_account_{{ $account->id }}">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit School Account</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.accounts.update' , $account) }}">@csrf @method('put')
                    <input type="hidden" name="school_id" value="{{ $school->id}}" required>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Account Name</label>
                                <input name="name" type="text" class="form-control" placeholder="" required value="{{ $account->name }}">
                            </div>

                            <div class="form-group">
                                <label for="">Code</label>
                                <input name="code" type="text" class="form-control" placeholder="" required value="{{ $account->code }}">
                            </div>

                            <div class="form-group">
                                <label for="">Class</label>
                                <select name="klass_id"  class="form-control" placeholder="" required>
                                    <option value="" disabled selected> Select one</option>
                                    @foreach ($classes as $class)
                                        <option value="{{$class->id}}" {{ $account->klass_id == $class->id ? 'selected' : ''}}>{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Term</label>
                                <select name="term"  class="form-control" placeholder="" required>
                                    <option value="" disabled selected> Select one</option>
                                    @foreach (getTerms() as $key => $value)
                                        <option value="{{$key}}" {{ $account->term == $key ? 'selected' : ''}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input name="amount" type="text" class="form-control" placeholder="" readonly required value="{{ $account->amount }}">
                            </div>

                            <div class="form-group">
                                <label for="">Downloads</label>
                                <input name="downloads" type="number" class="form-control" placeholder="Available downloads" readonly required value="{{ $account->download }}">
                            </div>


                            <div class="form-group">
                                <label for="">Set New Password</label>
                                <select name="password"  class="form-control" placeholder="">
                                    <option value="" disabled selected> Select one</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-sm btn-primary">Proceed</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
