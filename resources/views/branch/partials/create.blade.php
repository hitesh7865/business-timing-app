<div id="layoutSidenav_content">
    @include('new-layouts.messages')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Add Branch</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{route('branch.index')}}">Branches </a> / Add Branch</li>
            </ol>
            <form role="form" action="{{route('branch.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-xl-3">Business<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <select class="form-control col-xs-9" name="business_id" required>
                            <option value="">Select any</option>
                            @foreach ($businesses as $business)
                            <option value="{{$business->id}}">{{$business->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Branch Name<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="name" type="text" class="form-control" id="" placeholder="Enter Branch Name" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Images</label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="images[]" type="file" accept=".jpg,.png,.jpeg" multiple>
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
        </div>
    </main>
