@extends('layouts.app')

@section('content')
<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Conveyance</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="col-auto">
                        <div class="col-auto">
                            <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#createConveyance">Create</button>
                        </div>
                    </div><!--//col-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->

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
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($conveyances as $key => $conveyance)
                                    <tr>
                                        <td class="cell">{{ $conveyance->id }}</td>
                                        <td class="cell"><span class="truncate">{{ $conveyance->description }}</span></td>
                                        <td class="cell">
                                            <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#editConveyance{{ $conveyance->id }}">Update</button>
                                            <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConveyance{{ $conveyance->id }}">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Edit Conveyance Modal -->
                                    <div class="modal fade" id="editConveyance{{ $conveyance->id }}" tabindex="-1" aria-labelledby="deleteConveyanceModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Conveyance</h5>
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>

                                            <form class="table-search-form row gx-1 align-items-center" method="POST" action="{{ route('conveyance.update', $conveyance) }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Description</label>
                                                <input type="text" class="form-control" name="description" value="{{ $conveyance->description }}">
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
                                    <div class="modal fade" id="deleteConveyance{{ $conveyance->id }}" tabindex="-1" aria-labelledby="deleteConveyanceModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteConveyanceLabel">Delete</h5>
                                                <button type="button" class="btn" data-bs-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="table-search-form row gx-1 align-items-center" id="conveyance-delete" action="{{ route('conveyance.destroy', $conveyance->id) }}" method="POST">
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
                                
                    @include('Conveyance.modal')

                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                {!! $conveyances->links() !!}
            </nav><!--//app-pagination-->

        </div><!--//tab-pane-->
    </div><!--//tab-content-->

</div>
@endsection
