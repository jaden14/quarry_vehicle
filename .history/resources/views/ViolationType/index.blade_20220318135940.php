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
                        <form class="table-search-form row gx-1 align-items-center" action="{{ route('violationtype.store') }}" method="POST">
                            @csrf

                            <div class="col-auto">
                                <input type="text" name="description" class="form-control search-orders">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Add</button>
                            </div>
                        </form>

                    </div><!--//col-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
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

                                                <a class="btn-sm app-btn-secondary m-2" href="{{ route('violationtype.edit', $violationtype) }}">Edit</a>

                                                <button class="btn-sm app-btn-secondary" type="submit">Delete</button>
                                            </form>
                                @empty
                                        </td>
                                    </tr>
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
