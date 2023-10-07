<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Add Child</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard/Add Child</li>
            </ol>
            <form role="form" action="/cStore" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-xl-3">First Name<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="FirstName" type="text" class="form-control" id="" placeholder="" value=""
                                required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Middle Name<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="MiddleName" type="text" class="form-control" id="" placeholder="" value=""
                                required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Last Name<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="LastName" type="text" class="form-control" id="" placeholder="" value=""
                                required>
                        </div>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-xl-3">DOB<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="DOB" type="date" class="form-control" id="" placeholder="" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">BloodGroup<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <select class="form-control" name="BloodGroup">
                                <option value="N/A">N/A</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Gender<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <select class="form-control" name="Gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Area<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="Area" type="text" class="form-control" id="" placeholder="" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">City<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="City" type="text" class="form-control" id="" placeholder="" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Disctrict<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="Disc" type="text" class="form-control" id="" placeholder="" value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Qualification<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="Qualification" type="text" class="form-control" id="" placeholder="" value=""
                                >
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Occupation<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="Occupation" type="text" class="form-control" id="" placeholder="" value=""
                                >
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Married Status<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <select class="form-control" name="MarriedStatus">
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Photo<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="Photo" type="file">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Mobile<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="Mobile" type="text" class="form-control" id="" placeholder="" value=""
                                >
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Potion<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="Potion" type="text" class="form-control" id="" placeholder="" value=""
                                >
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Parent Name<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <select class="form-control" name="Parent_id">
                                <option value="N/A" disabled>N/A</option>
                                @foreach($parents as $p)
                                <option value="{{ $p->id }}">{{ $p->FirstName }} {{ $p->MiddleName }} {{ $p->LastName }}
                                    {{ $p->Area}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="col-xl-8">
                        <input type="submit" id="" class="btn btn-lg btn-success" value="Save">
                        <input type="reset" class="btn btn-lg btn-danger" name="Reset" />
                    </div>
                </div>
            </form>
            <div class="text-right">
                <a href="/viewChild"><input type="button" style="background-color:purple" class="btn btn-lg btn-success"
                        name="View" value="View Child" /></a>
            </div>
        </div>
    </main>