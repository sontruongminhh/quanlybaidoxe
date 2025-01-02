@extends('admin/index')
@section('admin_content')

<div class="table-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="table-title">Quản lý phương tiện</h5>
        <div class="search-box">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm theo tên, biển số, loại xe...">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="table-responsive" id="vehicle-table">
        @include('admin.vehicles.vehicle_table')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function loadVehicles(searchQuery = '') {
        $.ajax({
            url: "{{ route('all-vehicle') }}",
            type: "GET",
            data: { 
                search: searchQuery
            },
            success: function(response) {
                $('#vehicle-table').html(response);
            },
            error: function(xhr) {
                console.log('Error:', xhr);
            }
        });
    }

    var searchTimer;
    $('#searchInput').on('keyup', function() {
        clearTimeout(searchTimer);
        var searchQuery = $(this).val();
        
        searchTimer = setTimeout(function() {
            loadVehicles(searchQuery);
        }, 500);
    });
});
</script>

<style>
.search-box {
    width: 400px;
}
.search-box .input-group {
    width: 100%;
}
.search-box input {
    padding: 10px 15px;
    border-radius: 6px 0 0 6px;
    border: 1px solid #ddd;
    border-right: none;
}
.search-box .input-group-text {
    background: #fff;
    border-radius: 0 6px 6px 0;
    border: 1px solid #ddd;
    border-left: none;
    color: #666;
}
.search-box input:focus {
    border-color: #4CAF50;
    box-shadow: none;
    outline: none;
}
.search-box input:focus + .input-group-append .input-group-text {
    border-color: #4CAF50;
}

.badge {
    padding: 10px 15px;
    border-radius: 6px;
    font-weight: 400;
    font-size: 12px !important;
}

.bg-success {
    background-color: #28a745;
}

.bg-secondary {
    background-color: #6c757d;
}
</style>
@endsection 
