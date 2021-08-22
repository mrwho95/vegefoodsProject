@extends('layouts.vegeAdmin')

@section('styles')
<!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="container">
	<h3>Customer's Message</h3><br>
	<div class="table-responsive">
        <table id="message_table" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table><br>    
    </div>
</div>
@endsection

@section('javascripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function (){
        $('#message_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.customerMessage') }}",
            },
            columns: [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'subject',
                name: 'subject'
            },
            {
                data: 'message',
                name: 'message'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
    });
</script>
@endsection()