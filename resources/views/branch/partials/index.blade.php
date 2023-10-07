<div id="layoutSidenav_content">
    @include('new-layouts.messages')
    <main>
        <div class="container-fluid">
                <h1 class="mt-4">Branches</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Branches</li>
                </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                        Branches
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Business Name</th>
                                    <th>Branch Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($branches) > 0)
                                    @foreach ($branches as $key => $branch)
                                    <tr class="text-center">
                                        <td>{{++$key}}</td>
                                        <td>{{$branch->business->name}}</td>
                                        <td>{{$branch->name}}</td>
                                        <td><a class="btn btn-lg btn-success" href="{{route('branch.edit',$branch->id)}}">Edit</a></td>
                                        <td>
                                            <form action="{{route('branch.destroy')}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{$branch->id}}" name="id">
                                                <button class="btn btn-lg btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="5">No Branches</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
