@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Student List
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="students" width="100%" cellspacing="0" class="table table-hover display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Number</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Area of interest</th>
                                        <th>Memo</th>
                                        <th>Priorities</th>
                                        <th>Priorities List</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td></td>
                                        <td>{{ $student->stu_num }}</td>
                                        <td>{{ $student->firstname }}</td>
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->area_of_interest }}</td>
                                        <td>{{ $student->memo }}</td>
                                        <td>{{ json_encode($student->priorities) }}</td>
                                        <td> </td>
                                        <td> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> </th>
                                        <th>Student Number</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Area of interest</th>
                                        <th>Memo</th>
                                        <th> </th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-danger">
                            Delete all
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function format ( d ) {
            // `d` is the original data object for the row
            var priorities = JSON.parse(d.priorities);
            var teachers = {
                @foreach($teachers as $teacher)
                    "{{ $teacher->id }}" : "{{ $teacher->name }}" @if (!$loop->last) , @endif
                @endforeach
            };
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                '<td>Priority 1:</td>'+
                '<td>'+(teachers[priorities[0]] || '')+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Priority 2:</td>'+
                '<td>'+(teachers[priorities[1]] || '')+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Priority 3:</td>'+
                '<td>'+(teachers[priorities[2]] || '')+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Priority 4:</td>'+
                '<td>'+(teachers[priorities[3]] || '')+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Priority 5:</td>'+
                '<td>'+(teachers[priorities[4]] || '')+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Priority 6:</td>'+
                '<td>'+(teachers[priorities[5]] || '')+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Priority 7:</td>'+
                '<td>'+(teachers[priorities[6]] || '')+'</td>'+
                '</tr>'+
                '</table>';
        }

        $(document).ready(function() {

            var col = 0;
            $('#students tfoot th').each( function () {
                if(col != 0 && col != 6 && col != 7 && col != 8){
                    var title = $(this).text();
                    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                }
                col++;
            });

            var table = $('#students').DataTable({
                "columns": [
                    {
                        "data": "row_number",
                        "searchable": false,
                        "orderable": false
                    },
                    { "data": "stu_num" },
                    { "data": "firstname" },
                    { "data": "lastname" },
                    { "data": "area_of_interest" },
                    { "data": "memo" },
                    {
                        "data": "priorities",
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           "priorities_list",
                        "defaultContent": ''
                    },
                    {
                        "data": "options",
                        "searchable": false,
                        "orderable": false
                    }
                ],
                "order": [[1, 'asc']]
            });

            $('#students tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );

            table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            }).draw();

            table.columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        });
    </script>
@endsection
