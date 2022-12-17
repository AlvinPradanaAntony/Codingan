<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>Excel File</h4>
                                        <span>Form for Import</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <form action="" method="post" class="j-pro" id="j-pro"></form>
                    <div class="j-wrapper">
                        <form method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}" enctype="multipart/form-data" novalidate="">
                            {{ csrf_field() }}
                            <div class="j-content">
                                <!-- start file -->
                                <div class="j-unit">
                                    <div class="j-input j-append-big-btn">
                                        <label class="j-icon-left" for="file_input">
                                        <i class="icofont icofont-download"></i>
                                    </label>
                                        <div class="j-file-button">
                                            Browse
                                            <input type="file"  name="select_file" onchange="document.getElementById('file_input').value = this.value;">
                                        </div>
                                        <input type="text" id="file_input" readonly="" placeholder="no file selected">
                                        <span class="j-hint">.xls, .xslx</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.content -->
                            <div class="j-footer">
                                <button type="submit"  name="upload" class="btn btn-primary">Upload</button>
                            </div>
                            <!-- end /.footer -->
                        </form>
                    </div>
                    <!-- Page-body end -->
                    @if(count($errors) > 0)
                    <div class="text-danger text-center"id="alert-error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- upload -->
                    @if($message = Session::get('success'))
                        <div class="text-success alert-block text-center">
                            <strong>{{ $message }}</strong>

                        </div>
                    @endif

                    <!-- delete -->
                    @if($message = Session::get('importDelete'))
                        <div class="text-success alert-block text-center">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <!-- insert -->
                    @if($message = Session::get('importInsert'))
                        <div class="text-success alert-block text-center">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <!-- update -->
                    @if($message = Session::get('importUpdate'))
                    <div class="text-success alert-block text-center">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <!-- code exit -->
                    @if($message = Session::get('codesExists'))
                        <div class="text-danger alert-block text-center">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="card" style="border-top: 3px solid #404E67;">
                        <div class="card-header">
                            <h5>Import Data</h5>
                            <button type="button" class="btn btn-success float-right"  data-toggle="modal" data-target="#ImportAdd"><i class="icofont icofont-check-circled"></i>Add</button>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">
                                <table id="dom-jqry" class="table table-sm table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Sex</th>
                                            <th>Age</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $row)
                                        <tr role="row" class="odd">
                                            <td class="idUpdate">{{ $row->id }}</td>
                                            <td class="No">{{ $row->No }}</td>
                                            <td class="Name">{{ $row->Name }}</td>
                                            <td class="Sex">{{ $row->Sex }}</td>
                                            <td class="Age">{{ $row->Age }}</td>
                                            <td class="text-center">
                                                <a class="m-r-15 text-muted importEdit" data-toggle="modal" data-idUpdate="'.$row->id.'" data-target="#ImportUpdate">Edit</a>
                                                <a href="import_excel/{{ $row->id }}" onclick="return confirm('Are you sure to want to delete it?')" class="text-muted">Delect</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Add New-->
                    <div class="modal fade" id="ImportAdd" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="ti-close"></i></span>
                                    </button>
                                </div>
                                <form action="{{ route('importInsert') }}" method = "post"><!-- form add -->
                                {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">No</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="No"name="No" class="form-control" placeholder="Enter No">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="Name"name="Name" class="form-control" placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sex</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="Sex"name="Sex" class="form-control" placeholder="Enter Sex">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Age</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="Age"name="Age" class="form-control" placeholder="Enter Age">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                                        <button type="submit" id=""name="" class="btn btn-success  waves-light"><i class="icofont icofont-check-circled"></i>Save</button>
                                    </div>
                                </form><!-- form add end -->
                            </div>
                        </div>
                    </div> <!-- End Modal Add New-->

                    <!-- Modal Update-->
                    <div class="modal fade" id="ImportUpdate" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-write">
                                    <h4 class="modal-title">Update</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="ti-close"></i></span>
                                    </button>
                                </div>
                                <form action="{{ route('importUpdate') }}" method = "post"><!-- form delete -->
                                {{ csrf_field() }}
                                <input type = "text"hidden  class="col-sm-9 form-control"id ="idUpdate" name ="idUpdate" value="" />
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">No</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="e_No"name="No" class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="e_Name"name="Name" class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sex</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="e_Sex"name="Sex" class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Age</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="e_Age"name="Age" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Close</button>
                                        <button type="submit" id=""name="" class="btn btn-success  waves-light"><i class="icofont icofont-check-circled"></i>Update</button>
                                    </div>
                                </form><!-- form delete end -->
                            </div>
                        </div>
                    </div> <!-- End Modal Delete-->
                </div><!-- Main-body end -->
            </div>
        </div>
    </div>
</div>
<script>
    // select import
    $(document).on('click', '.importEdit', function()
    {
        var _this = $(this).parents('tr');
        $('#idUpdate').val(_this.find('.idUpdate').text());
        $('#e_No').val(_this.find('.No').text());
        $('#e_Name').val(_this.find('.Name').text());
        $('#e_Sex').val(_this.find('.Sex').text());
        $('#e_Age').val(_this.find('.Age').text());
    });
</script>



