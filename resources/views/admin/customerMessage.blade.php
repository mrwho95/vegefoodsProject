@extends('layouts.vegeAdmin')
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