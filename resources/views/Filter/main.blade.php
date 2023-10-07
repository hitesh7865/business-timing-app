<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
        <h1 class="mt-4">View Filter Data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/View Filter Data</li>
        </ol>
        <div>
            <form class="d-flex justify-content-end form-inline">
                <form method="get">
                    <div class="form-group">
                        <div class="col-xs-7">
                                <select class="form-control" name="Parent_id" onchange="this.form.submit();">
                                    <option value="">Select One</option>
                                    @foreach($parents as $key => $p)
                                        <option value="{{ $p->id }}" @if($_REQUEST['Parent_id'] == $p->id) selected @endif>{{++$key}} - {{ $p->FirstName }} {{ $p->MiddleName }} {{ $p->LastName }} {{ $p->Area }}</option>
                                    @endforeach
                                </select>
                            {{-- <select class="form-control" name="city" onchange="this.form.submit()">
                                <option value="N/A">N/A</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city }}" @if(request('city') === $city) selected @endif>{{ $city }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </form>
        </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
                Listing Details By Parent
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="filterTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>DOB</th>
                            <th>BloodGroup</th>
                            <th>Gender</th>
                            <th>Area</th>
                            <th>City</th>
                            <th>District</th>
                            <th>Qualification</th>
                            <th>Occupation</th>
                            <th>MarriedStatus</th>
                            <!-- <th>Photo</th> -->
                            <th>Mobile</th>								
                            <th>Potion</th>
                        </tr>
                    </thead>

                    <tbody>
                    @if(isset($data) && $data)
                        <tr class="text-center">
                            <td>0</td>
                            <td>{{ $data->FirstName }}</td>
                            <td>{{ $data->MiddleName }}</td>
                            <td>{{ $data->LastName }}</td>
                            <td>{{ $data->DOB }}</td>
                            <td>{{ $data->BloodGroup }}</td>
                            <td>{{ $data->Gender }}</td>
                            <td>{{ $data->Area }}</td>
                            <td>{{ $data->City }}</td>
                            <td>{{ $data->Disc }}</td>
                            <td>{{ $data->Qualification }}</td>
                            <td>{{ $data->Occupation }}</td>
                            <td>{{ $data->MarriedStatus }}</td>
                            {{-- <td>{{ $data->Photo }}</td> --}}
                            <td>{{ $data->Mobile }}</td>
                            <td>{{ $data->Potion }}</td>
                        </tr>
                    @endif
                    
                    @if(isset($data->childList) && $data->childList)
                        @foreach($data->childList as $key => $children)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $children->FirstName }}</td>
                            <td>{{ $children->MiddleName }}</td>
                            <td>{{ $children->LastName }}</td>
                            <td>{{ $children->DOB }}</td>
                            <td>{{ $children->BloodGroup }}</td>
                            <td>{{ $children->Gender }}</td>
                            <td>{{ $children->Area }}</td>
                            <td>{{ $children->City }}</td>
                            <td>{{ $children->Disc }}</td>
                            <td>{{ $children->Qualification }}</td>
                            <td>{{ $children->Occupation }}</td>
                            <td>{{ $children->MarriedStatus }}</td>
                            {{-- <td>{{ $children->Photo }}</td> --}}
                            <td>{{ $children->Mobile }}</td>
                            <td>{{ $children->Potion }}</td>
                        </tr>
                        @endforeach  
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
</main>