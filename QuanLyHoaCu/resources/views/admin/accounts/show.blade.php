@extends('admin.admin')

@section('content')
<h1>Account Details</h1>

<table class="table">
    <tr>
        <th>ID</th>
        <td>{{ $account->account_id }}</td>
    </tr>
    <tr>
        <th>Username</th>
        <td>{{ $account->username }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $account->email }}</td>
    </tr>
    <tr>
        <th>Role</th>
        <td>{{ $account->role_id }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $account->is_active ? 'Active' : 'Inactive' }}</td>
    </tr>
</table>

<a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary">Back to Accounts</a>
@endsection