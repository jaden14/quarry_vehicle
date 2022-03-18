@extends('layouts.app')

@section('content')
<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Conveyance - Edit</h1>
        </div>
    </div><!--//row-->


    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form class="settings-form" method="POST" action="{{ route('conveyance.update', $conveyance) }}">
                                @csrf
                                @method('PATCH')

                                <div class="mb-3">
                                    <label for="setting-input-3" class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description" value="{{ $conveyance->description }}">
                                </div>
                                <button type="submit" class="btn app-btn-primary">Save Changes</button>
                            </form>
                        </div><!--//app-card-body-->
                    </div>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//tab-pane-->
    </div><!--//tab-content-->
</div>
@endsection
