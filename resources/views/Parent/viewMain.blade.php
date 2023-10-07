<div id="layoutSidenav_content">
<main>
<div class="container-fluid">
        <h1 class="mt-4">View Child</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/View Child</li>
        </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
                DataTable Child
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
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
                            <th>Photo</th>
                            <th>Mobile</th>								
                            <th>Potion</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr class="text-center">
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
                            <th>Photo</th>
                            <th>Mobile</th>								
                            <th>Potion</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                
                    <tbody>
                    @foreach($parents as $c)
                    <tr class="text-bottom" >
                        <td>{{ $c->FirstName }}</td>
                        <td>{{ $c->MiddleName }}</td>
                        <td>{{ $c->LastName }}</td>
                        <td>{{ $c->DOB }}</td>
                        <td>{{ $c->BloodGroup }}</td>
                        <td>{{ $c->Gender }}</td>
                        <td>{{ $c->Area }}</td>
                        <td>{{ $c->City }}</td>
                        <td>{{ $c->Disc }}</td>
                        <td>{{ $c->Qualification }}</td>
                        <td>{{ $c->Occupation }}</td>
                        <td>{{ $c->MarriedStatus }}</td>
                        <td>{{ $c->Photo }}</td>
                        <td>{{ $c->Mobile }}</td>
                        <td>{{ $c->Potion }}</td>
                        <td>Delete</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
</main>