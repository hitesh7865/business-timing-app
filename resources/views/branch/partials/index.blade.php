<div id="layoutSidenav_content">
    @include('new-layouts.messages')
    <main>
        <div class="container-fluid">
                <h1 class="mt-4">Businesses</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Businesses</li>
                </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                        Businesses
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Business Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Logo</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($businesses as $key => $business)
                                <tr class="text-center">
                                    <td>{{++$key}}</td>
                                    <td>{{$business->name}}</td>
                                    <td>{{$business->email}}</td>
                                    <td>{{$business->phone_number}}</td>
                                    <td><img src="{{ asset('storage/'.$business->logo)}}" alt="No Image" height="80px" width="80px"></td>
                                    <td><a class="btn btn-lg btn-success" href="{{route('business.edit',$business->id)}}">Edit</a></td>
                                    <td>
                                        <form action="{{route('business.destroy')}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$business->id}}" name="id">
                                            <button class="btn btn-lg btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
