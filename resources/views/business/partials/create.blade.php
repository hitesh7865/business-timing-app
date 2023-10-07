<div id="layoutSidenav_content">
    @include('new-layouts.messages')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Add Business</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="/">Businesses </a> / Add Business</li>
            </ol>
            <form role="form" action="{{route('business.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-xl-3">Business Name<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="name" type="text" class="form-control" id="" placeholder="Enter Business Name" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Email<i class="text-danger">*</i></label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="email" type="email" class="form-control" id="" placeholder="Enter Email" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Phone Number</label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="phone_number" type="text" class="form-control" id="" placeholder="Enter Phone Number" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3">Logo</label>
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input name="logo" type="file" accept=".jpg,.png,.jpeg">
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
