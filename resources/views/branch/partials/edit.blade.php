<div id="layoutSidenav_content">
    @include('new-layouts.messages')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit Branch</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{route('branch.index')}}">branches </a> / Edit branch</li>
            </ol>
            <form role="form" action="{{route('branch.update',$branch->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-xl-3">branch Name<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="name" type="text" class="form-control" id="" placeholder="Enter branch Name" value="{{$business->name}}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Email<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="email" type="email" class="form-control" id="" placeholder="Enter Email" value="{{$business->email}}" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Phone Number</label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="phone_number" type="text" class="form-control" id="" placeholder="Enter Phone Number" value="{{$business->phone_number}}">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Logo</label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="logo" type="file" value="{{$business->logo}}" accept=".jpg,.png,.jpeg">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="col-xl-8">
                        <input type="submit" id="" class="btn btn-lg btn-success" value="Update">
                        <input type="reset" class="btn btn-lg btn-danger" name="Reset" />
                    </div>
                </div>
            </form>
        </div>
    </main>
