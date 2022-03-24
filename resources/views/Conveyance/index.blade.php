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
                        {{--  <form class="table-search-form row gx-1 align-items-center" action="{{ route('conveyance.store') }}" method="POST">
                            @csrf

                            <div class="col-auto">
                                <input type="text" name="description" class="form-control search-orders">
                            </div>  --}}
                            <div class="col-auto">
                                <button type="button" class="btn app-btn-secondary" data-toggle="modal" data-target="#createConveyance">Create</button>
                            </div>
                            {{--  <div class="col-auto">
                                <button type="button" class="btn app-btn-secondary" data-toggle="modal" data-target="#editConveyance">Edit</button>
                            </div>  --}}
                        {{--  </form>  --}}

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
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($conveyances as $key => $conveyance)
                                    <tr>
                                        <td class="cell">{{ $key+1 }}</td>
                                        <td class="cell"><span class="truncate">{{ $conveyance->description }}</span></td>
                                        <td class="cell">
                                            <form id="conveyance-delete" action="{{ route('conveyance.destroy', $conveyance) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn-sm app-btn-secondary" data-toggle="modal" data-target="#editConveyance=?{{ $conveyance->id }}">Update</button>

                                                {{--  <button type="button" class="btn-sm app-btn-secondary" data-toggle="modal" data-target="#deleteConveyance">Delete Modal</button>  --}}

                                                <button class="btn-sm app-btn-secondary" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Conveyance Edit Modal -->
                                    <div class="modal fade" id="editConveyance=?{{ $conveyance->id }}" tabindex="-1" role="dialog" aria-labelledby="editConveyanceLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editConveyanceLabel">Update</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- Modal -->
                                                <form class="table-search-form row gx-1 align-items-center" action="{{ route('conveyance.update', $conveyance) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="modal-body">
                                                        <input type="text" name="description" value="{{ $conveyance->description }}" class="form-control search-orders">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary text-white">Save</button>
                                                    </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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

    @include('Conveyance.modal')

</div>
@endsection
