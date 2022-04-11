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
                    <div class="col-auto">
                        <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#createViolation">Create</button>
                    </div>
                </div><!--//col-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->

    <!--Table-->
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
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($violationtypes as $violationtype)
                                    <tr>
                                        <td class="cell">{{ $violationtype->id }}</td>
                                        <td class="cell"><span class="truncate">{{ $violationtype->description }}</span></td>
                                        <td class="cell">
                                            <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#editViolationType{{ $violationtype->id }}">
                                                Update
                                            </button>
                                            <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteViolationType{{ $violationtype->id }}">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Edit ViolationType Modal -->
                                    <div class="modal fade" id="editViolationType{{ $violationtype->id }}" tabindex="-1" aria-labelledby="editviolationTypeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Violation Type</h5>
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>

                                            <form class="table-search-form row gx-1 align-items-center" method="POST" action="{{ route('violationtype.update', $violationtype) }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Description</label>
                                                <input type="text" class="form-control" name="description" value="{{ $violationtype->description }}">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn app-btn-primary">Update</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteViolationType{{ $violationtype->id }}" tabindex="-1" aria-labelledby="deleteViolationTypeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteViolationTypeLabel">Delete</h5>
                                                <button type="button" class="btn" data-bs-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="table-search-form row gx-1 align-items-center" id="deleteViolationType" action="{{ route('violationtype.destroy', $violationtype->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Do you really want to delete this record? This process cannot be undone.</p>
                                                </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger text-white">Yes</button>
                                                <button type="button" class="btn" data-bs-dismiss="modal">No</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>


                                @empty
                                    <tr>
                                        <td class="cell" colspan="3"><span class="truncate">No Data</span></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->

                    @include('ViolationType.modal')

                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                {{--  {!! $conveyances->links() !!}  --}}
            </nav><!--//app-pagination-->

        </div><!--//tab-pane-->
    </div><!--//tab-content-->

</div>
@endsection
