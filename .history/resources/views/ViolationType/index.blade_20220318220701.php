@extends('layouts.app')

@section('content')
<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Violation Type</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="col-auto">

                        <button type="button" class="btn app-btn-secondary" data-toggle="modal" data-target="#addViolationType">
                            Add
                        </button>

                    </div><!--//col-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->

    <!-- Create Violatin Type Modal -->
    <div class="modal fade" id="addViolationType" tabindex="-1" role="dialog" aria-labelledby="addViolationType" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                <form class="table-search-form row gx-1 align-items-center" action="{{ route('violationtype.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Create Violation Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-auto">
                            <input type="text" placeholder="Description" name="description" class="form-control search-orders my-3">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn app-btn-secondary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Description</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($violationtypes as $violationtype)
                                    <tr>
                                        <td class="cell">{{ $violationtype->id }}</td>
                                        <td class="cell"><span class="truncate">{{ $violationtype->description }}</span></td>
                                        <td class="cell">
                                            <form id="conveyance-delete" action="{{ route('violationtype.destroy', $violationtype) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                {{-- <a class="btn-sm app-btn-secondary m-2" href="{{ route('violationtype.edit', $violationtype) }}">Edit</a> --}}

                                                <button type="button" class="btn-sm app-btn-secondary" data-toggle="modal" data-target="#editViolationType {{ "+".$violationtype }}">
                                                    Update
                                                </button>
                                                
                                                <button class="btn-sm app-btn-secondary" type="submit">Delete</button>

                                            </form>

                                            <!-- Edit Violatin Type Modal -->
                                            <div class="modal fade" id="editViolationType" tabindex="-1" role="dialog" aria-labelledby="editViolationType" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        
                                                        <form class="settings-form" method="POST" action="{{ route('violationtype.update', $violationtype) }}">
                                                            @csrf
                                                            @method('PATCH')

                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Violation Type</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="setting-input-3" class="form-label">Description</label>
                                                                    <input type="text" class="form-control" name="description" value="{{ $violationtype->description }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn app-btn-secondary">Update</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cell" colspan="2"><span class="truncate">No Data</span></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->

                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                {{--  {!! $conveyances->links() !!}  --}}
            </nav><!--//app-pagination-->

        </div><!--//tab-pane-->
    </div><!--//tab-content-->

    
</div>
@endsection
