<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Employee Show</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">

                <h1>Employee List</h1>
                <ul>
                    @foreach ($employees as $employee)
                        <li>{{ $employee->name }}, {{ $employee->role}}</li>
                    @endforeach
                </ul>





            </div>
        </div>
    </div>
</div>





